<?php
    include "connect.php";                                          //connect to database

    if (isset($_POST['Next'])) {                                    //if next button is clicked
        $userAnswer = strtoupper($_POST['answer']);                 //convert user input to uppercase to amtch database values
        unset($_POST['answer']);                                    //clear user input

        //assign sessions to variables
        $currentIndex = $_SESSION['CurrentIndex'];		            
        $totalPoints = $_SESSION['TotalPoints'];
        $points = $_SESSION['Points'];;
    
        //assign points per difficulty level
        if ($_SESSION['DifficultyList'][$currentIndex] == 'easy') {
            $points = 5;
        } elseif ($_SESSION['DifficultyList'][$currentIndex] == 'average') {
            $points = 10;
        } elseif ($_SESSION['DifficultyList'][$currentIndex] == 'difficult') {
            $points = 15;
        }
    
        if ($_SESSION['AnswerList'][$currentIndex] == $userAnswer) {
            //if user answer = correct answer
            array_push($_SESSION['ResponseList'], "(correct)");	                //append ‘correct’ to list of response
            $_SESSION['TotalPoints'] = $totalPoints + $points;                  //add points to total points
            array_push($_SESSION['PointList'], $points);                        //append points to list of points
            array_push($_SESSION['TotalList'], $_SESSION['TotalPoints']);       //append total points to list of total points
        } else {
            array_push($_SESSION['ResponseList'], "(wrong)");	                //append ‘wrong’ to list of response
            $_SESSION['TotalPoints'] = $totalPoints - $points;                  //subtract points from total points
            array_push($_SESSION['PointList'], '-' . $points);                  //append negative points to list of points
            array_push($_SESSION['TotalList'], $_SESSION['TotalPoints']);       //append total points to list of total points
        }  

        if ($_SESSION['CurrentIndex'] == ($_SESSION['noQuestions'] - 1)) {		//decrement number of questions to match counter
            echo '<script language="javascript">';
            echo 'location.href="endQuiz.php"';		                            //if counter = 0, go to endQuiz.php
            echo '</script>';
        } else {
            $_SESSION['CurrentIndex'] = $currentIndex + 1;	                    //if counter > 0, continue taking quiz
            echo '<script language="javascript">';
            echo 'location.href="takeQuiz.php"';
            echo '</script>';
        }
           
        $connect->close();                                                      //close connection
   }
?>

<!DOCTYPE html>
<html>
    
<head>
    <title>TAKE QUIZ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="takeQuiz.php" method="post">          <!--send user input through post to takeQuiz page-->
        <div>Question:                                  <!--display question-->
            <?php echo $_SESSION['QuestionList'][$_SESSION['CurrentIndex']]; ?></div>
        <div>Answer:                                    <!--user input answer-->
            <input type="text" name="answer" placeholder="T or F" required ="required"></div>
        <div><button type="submit" id="Next" name="Next">Submit</button></div>      <!--submit user answer-->
    </form>
</body>
</html>

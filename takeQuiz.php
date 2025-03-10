<?php
    include "connect.php";

    if (isset($_POST['Next'])) {
        $userAnswer = strtoupper($_POST['answer']);
        unset($_POST['userAnswer']);
        $currentIndex = $_SESSION['CurrentIndex'];		//assign sessions to variables
        $totalPoints = $_SESSION['TotalPoints'];
        $points = $_SESSION['Points'];;
    
        if ($_SESSION['DifficultyList'][$currentIndex] == 'easy') {
            $points = 5;
        } elseif ($_SESSION['DifficultyList'][$currentIndex] == 'average') {
            $points = 10;
        } elseif ($_SESSION['DifficultyList'][$currentIndex] == 'difficult') {
            $points = 15;
        }
        array_push($_SESSION['PointList'], $points);
    
        if ($_SESSION['AnswerList'][$currentIndex] == $userAnswer) {
            //if user answer = correct answer
            array_push($_SESSION['ResponseList'], "(correct)");	//append ‘correct’ if correct
            //append point value and update total points value (add)
            $_SESSION['TotalPoints'] = $totalPoints + $points;
            array_push($_SESSION['TotalList'], $_SESSION['TotalPoints']);
        } else {
            array_push($_SESSION['ResponseList'], "(wrong)");	//append ‘wrong’ if wrong
            //append point value and update total points value (minus)
            $_SESSION['TotalPoints'] = $totalPoints - $points;
            
            array_push($_SESSION['TotalList'], $_SESSION['TotalPoints']);
        }  

        if ($_SESSION['CurrentIndex'] == ($_SESSION['noQuestions'] - 1)) {		//decrement
            echo '<script language="javascript">';
            echo 'location.href="endQuiz.php"';		//if counter = 0, go to endQuiz.php
            echo '</script>';
        } else {
            $_SESSION['CurrentIndex'] = $currentIndex + 1;	//if counter > 0, continue
            echo '<script language="javascript">';
            echo 'location.href="takeQuiz.php"';
            echo '</script>';
        }
           
        $stmt->close();
        $connect->close();
   }
?>

<!DOCTYPE html>
<html>
<head><title>TAKE QUIZ</title></head>
<body>
    <form action="takeQuiz.php" method="post">
        <div>Question:
            <?php echo $_SESSION['QuestionList'][$_SESSION['CurrentIndex']]; ?></div>
        <div>Answer:
            <input type="text" name="answer" placeholder="T or F" required ="required"></div>
        <div><button type="submit" id="Next" name="Next">Submit</button></div>
    </form>
</body>
</html>

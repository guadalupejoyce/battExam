<?php
    include "connect.php";                                   //connect to database

    if(isset($_POST['Start'])) {                            //if start button is clicked
        $noQuestions = $_POST['noQuestions'];               //local variable for number of questions

        //declare sessions for global access
        $_SESSION['username'] = $_POST['username'];         //examiner name       
        $_SESSION['noQuestions'] = $_POST['noQuestions'];   //number of questions      
        $_SESSION['CurrentIndex'] = 0;                      //counter
        $_SESSION['TotalPoints'] = 0;			            //total, accumulated points
        $_SESSION['Points'] = 0;			                //points per difficulty level
        $_SESSION['QuestionList'] = array();                //stores questions 
        $_SESSION['AnswerList'] = array();                  //stores answers
        $_SESSION['DifficultyList'] = array();              //stores difficulty level
        $_SESSION['ResponseList'] = array();		        //correct or wrong
        $_SESSION['PointList'] = array();		            //points value per item
        $_SESSION['TotalList'] = array();                   //records changes in value of total points   
           
        $sql = "SELECT * FROM question ORDER BY RAND() LIMIT $noQuestions";         //select random questions from table
        $query = mysqli_query($connect, $sql);
        if ($query->num_rows > 0) {                          //if there are rows in table
            while($row = mysqli_fetch_assoc($query)) {		//append to arrays values from table
                array_push($_SESSION['QuestionList'], $row['questions']);           //list of questions 
                array_push($_SESSION['AnswerList'], $row['answers']);               //list of answers 
                array_push($_SESSION['DifficultyList'], $row['difficulty']);        //list of difficulty level
            }
        }
        echo '<script language="javascript">';
        echo 'location.href="takeQuiz.php"';		        //go to takeQuiz.php
        echo '</script>';
        $connect->close();                                  //close connection
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Start Quiz</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form method="post">            <!--will send user input through post-->
        <div>Examiner name:         <!--input examiner name--> 
            <input type="text" name="username" placeholder="" required ="required"></div>
        <div>Number of question:        <!--input number of questions-->
            <input type="radio" id="noQuestions" name="noQuestions" value="5">5</input>
            <input type="radio" id="noQuestions" name="noQuestions" value="10">10</input>
            <input type="radio" id="noQuestions" name="noQuestions" value="15">15</input>
        <div><button><a href="index.php">Home</a></button>          <!--back to home-->
            <button type="submit" id="Start" name="Start">Take Quiz</button></div>          <!--start-->
    </form>
</body>
</html>

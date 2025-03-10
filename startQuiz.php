<?php
    include "connect.php";

    if(isset($_POST['Start'])) {		//if start button is clicked
        $username = $_POST['username'];		//declare variable and assign user input
        $noQuestions = $_POST['noQuestions'];

        $_SESSION['username'] = $_POST['username'];	//declare sessions for global access
        $_SESSION['noQuestions'] = $_POST['noQuestions'];      
        $_SESSION['CurrentIndex'] = 0;		//counter
        $_SESSION['TotalPoints'] = 0;			//add points
        $_SESSION['Points'] = 0;			//add points
        $_SESSION['QuestionList'] = array();
        $_SESSION['AnswerList'] = array();
        $_SESSION['DifficultyList'] = array();
        $_SESSION['ResponseList'] = array();		//correct or wrong
        $_SESSION['PointList'] = array();		//total points value per interaction
        $_SESSION['TotalList'] = array();
           
        $sql = "SELECT * FROM arithmetic ORDER BY RAND() LIMIT $noQuestions";
        $query = mysqli_query($connect, $sql);
        if ($query->num_rows > 0) {
            while($row = mysqli_fetch_assoc($query)) {		//append to arrays values from table
                array_push($_SESSION['QuestionList'], $row['questions']);  
                array_push($_SESSION['AnswerList'], $row['answers']);
                array_push($_SESSION['DifficultyList'], $row['difficulty']);
            }
        }
        echo '<script language="javascript">';
        echo 'location.href="takeQuiz.php"';		//go to takeQuiz.php
        echo '</script>';
        $stmt->close();
        $connect->close();
    }
?>

<!DOCTYPE html>
<html>
<head><title>START QUIZ</title></head>

<body>
    <form method="post">
        <div>Player Name:
            <input type="text" name="username" placeholder="" required ="required"></div>
        <div>Number of Question:
            <input type="radio" id="noQuestions" name="noQuestions" value="5">5</input>
            <input type="radio" id="noQuestions" name="noQuestions" value="10">10</input>
            <input type="radio" id="noQuestions" name="noQuestions" value="15">15</input>
        <div><button><a href="index.php">Home</a></button>
            <button type="submit" id="Start" name="Start">Take Quiz</button></div>
    </form>
</body>
</html>

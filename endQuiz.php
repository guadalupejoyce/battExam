<?php
    include "connect.php";
?>

<!DOCTYPE html>
<html>  

<head>
    <title>END QUIZ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form method="post">
        <div><p>Examiner name: <span><?php echo $_SESSION['username'] ?></span> </p>            <!--display examiner name-->
            <p>Number of questions: <span><?php echo $_SESSION['noQuestions'] ?></span> </p>    <!--display number of questions-->
        </div>

        <div>
            <table>                                                             <!--create table with headers-->
                <tr>
                    <th>QUESTIONS</th>
                    <th>DIFFICULTY</th>
                    <th>RESPONSE</th>
                    <th>POINTS</th>
                    <th>TOTAL POINTS</th>
                </tr>
            <?php
                for($i = 0; $i < count($_SESSION['QuestionList']); $i++) {      //while counter > 0
                    ?>
                    <tr>
                        <!--display questions, difficulty, response, points, total points-->
                        <td><?php echo $_SESSION['QuestionList'][$i];?></td>    
                        <td><?php echo $_SESSION['DifficultyList'][$i];?></td>
                        <td><?php echo $_SESSION['ResponseList'][$i];?></td>
                        <td><?php echo $_SESSION['PointList'][$i];?></td>
                        <td><?php echo $_SESSION['TotalList'][$i];?> pts</td>
                    </tr>
                    <?php
                }
            ?>
            </table>
        </div>
       
        <div>
            <h4>
                <?php if($_SESSION['TotalPoints'] > 0) {                        //if total points > 0
                        echo "Congratulations, ".$_SESSION['username'].". You earned ".$_SESSION['TotalPoints']." points.";
                        } else {                                                //if total points < 0
                            echo "Sorry, ".$_SESSION['username'].". You failed.";
                        }
                ?>
            </h4>
        </div>
    </form>

    <div>
        <button><a href="index.php">Home</a></button>                           <!--back to home-->
        <button><a href="startQuiz.php">Start Quiz Again</a></button>           <!--start quiz again-->
    </div>

</body>
</html>

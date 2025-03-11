<?php
    include "connect.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>END QUIZ</title>
    <link rel="stylesheet" type="text/css" href="/batteryExam/style.css">
</head>

<body>
    <form method="post">
        <div><p>Examiner name: <span><?php echo $_SESSION['username'] ?></span> </p>
            <p>Number of questions: <span><?php echo $_SESSION['noQuestions'] ?></span> </p>
        </div>

        <div>
            <table>
                <tr>
                    <th>QUESTIONS</th>
                    <th>DIFFICULTY</th>
                    <th>RESPONSE</th>
                    <th>POINTS</th>
                    <th>TOTAL POINTS</th>
                </tr>
            <?php
                for($i = 0; $i < count($_SESSION['QuestionList']); $i++) {	//while counter > 0
                    ?>
                    <tr>
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
                <?php if($_SESSION['TotalPoints'] > 0) {
                        echo "Congratulations, ".$_SESSION['username'].". You earned ".$_SESSION['TotalPoints']." points.";
                        } else {
                            echo "Sorry, ".$_SESSION['username'].". You failed.";
                        }
                ?>
            </h4>
        </div>
    </form>

    <div>
        <button><a href="index.php">Home</a></button>
        <button><a href="startQuiz.php">Start Quiz Again</a></button>
    </div>

</body>
</html>

<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
            <h1>All Player Stats</h1>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_player_stats($conn);

                mysqli_close($conn);
            ?>

            <a href="playerStatAdd.php"><h3>Add a New Player Statistic</h3></a>
        </div>
    </body>
</html>
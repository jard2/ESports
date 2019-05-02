<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
            <h2>All Player Stat Types</h2>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_player_stat_type($conn);

                mysqli_close($conn);
            ?>

            <a href="playerStatTypeAdd.php"><h3>Add a New Player Stat Type</h3></a>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
            <h2>All Players</h2>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_player($conn);

                mysqli_close($conn);
            ?>

            <a href="playerAdd.php"><h3>Add a New Player</h3></a>
        </div>
    </body>
</html>
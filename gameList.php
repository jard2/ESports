<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
            <h2>All Games</h2>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_game($conn);

                mysqli_close($conn);
            ?>

            <a href="gameAdd.php"><h3>Add a New Game</h3></a>
        </div>
    </body>
</html>
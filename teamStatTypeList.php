<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
            <h1>All Team Stat Types</h1>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_team_stat_type($conn);

                mysqli_close($conn);
            ?>

            <a href="teamStatTypeAdd.php"><h3>Add a New Team Stat Type</h3></a>
        </div>
    </body>
</html>
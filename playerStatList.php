<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>All Player Stats</h1>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_player_stats($conn);

                mysqli_close($conn);
            ?>

            <a href="playerStatAdd.php"><h3>Add a New Player Stat</h3></a>
        </div>
    </body>
</html>
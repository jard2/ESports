<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>All Player Stat Types</h1>

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
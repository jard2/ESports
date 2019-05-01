<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>All Team Stats</h1>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_team_stats($conn);

                mysqli_close($conn);
            ?>

            <a href="teamStatAdd.php"><h3>Add a New Team Statistic</h3></a>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
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
<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>All Players</h1>

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
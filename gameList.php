<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>All Games</h1>

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
<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>All Teams</h1>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_team($conn);

                mysqli_close($conn);
            ?>

            <a href="teamAdd.php"><h3>Add a New Team</h3></a>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>All Players</h1>

            <?php
                require("tableshow.php");
                require("dbconnect.php");

                show_player($conn);
            ?>
        </div>
    </body>
</html>
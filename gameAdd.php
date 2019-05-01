<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>Add a New Game</h1>

            <?php
                require("dbconnect.php");
                require("tableshow.php");
                require("beforeAfter.php");

                if(isset($_POST['game_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $game_name = addslashes($_POST['game_name']);
                        $game_publisher = addslashes($_POST['game_publisher']);
                        $game_release_date = addslashes($_POST['game_release_date']);
                    } else {
                        $game_name = $_POST['game_name'];
                        $game_publisher = $_POST['game_publisher'];
                        $game_release_date = $_POST['game_release_date'];
                    }

                    $sql = "INSERT INTO game ".
                        "(`game_ID`, `game_name`, `publisher`, `release_date`) VALUES ".
                        "(NULL, '$game_name', '$game_publisher', '$game_release_date')";

                    display_before_after($sql, 'show_game', $conn);

                    echo '<a href="gameAdd.php"><button>'.
                        "Add Another Game".
                        "</button></a>";
                } else {
                    show_game($conn);
            ?>

            <h3>Enter Game info to add</h3>
            <form method="post" action = "<?php $_PHP_SELF ?>">
                <table border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input id="game_name" name="game_name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Publisher</td>
                        <td>
                            <input id="game_publisher" name="game_publisher" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Release Date</td>
                        <td>
                            <input id="game_release_date" name="game_release_date" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button id="game_add" name="game_add" type="submit">Add Game</button>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                }
            ?>

            <a href="gameList.php"><h3>Back to Game List</h3></a>
            <?php
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
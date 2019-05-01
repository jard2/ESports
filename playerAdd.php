<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>Add a New Player</h1>

            <?php
                require("dbconnect.php");
                require("tableshow.php");
                require("beforeAfter.php");

                if(isset($_POST['player_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $player_name = addslashes($_POST['player_name']);
                        $player_birthdate = addslashes($_POST['player_birthdate']);
                        $player_bio = addslashes($_POST['player_bio']);
                    } else {
                        $player_name = $_POST['player_name'];
                        $player_birthdate = $_POST['player_birthdate'];
                        $player_bio = $_POST['player_bio'];
                    }

                    $sql = "INSERT INTO player ".
                        "(`player_ID`, `name`, `bio`, `birth_date`) VALUES ".
                        "(NULL, '$player_name', '$player_bio', '$player_birthdate')";

                    display_before_after($sql, 'show_player', $conn);

                    echo '<a href="playerAdd.php"><button>'.
                        "Add Another Player".
                        "</button></a>";
                } else {
                    show_player($conn);
            ?>

            <h3>Enter Player info to add</h3>
            <form method="post" action = "<?php $_PHP_SELF ?>">
                <table border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input id="player_name" name="player_name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Birthdate</td>
                        <td>
                            <input id="player_birthdate" name="player_birthdate" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>Bio</td>
                        <td>
                            <textarea id="player_bio" name="player_bio"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button id="player_add" name="player_add" type="submit">Add Player</button>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                }
            ?>

            <a href="playerList.php"><h3>Back to Player List</h3></a>
            <?php
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
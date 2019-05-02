<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
            <h2>Add a New Player Stat Type</h2>

            <?php
                require("dbconnect.php");
                require("tableshow.php");
                require("beforeAfter.php");

                if(isset($_POST['player_stat_type_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $player_stat_type_name = addslashes($_POST['player_stat_type_name']);
                        $player_stat_type_value_type = addslashes($_POST['player_stat_type_value_type']);
                    } else {
                        $player_stat_type_name = $_POST['player_stat_type_name'];
                        $player_stat_type_value_type = $_POST['player_stat_type_value_type'];
                    }

                    $sql = "INSERT INTO playerstattype ".
                        "(`playerStat_Name`, `value_type`) VALUES ".
                        "('$player_stat_type_name', '$player_stat_type_value_type')";

                    display_before_after($sql, 'show_player_stat_type', $conn);

                    echo '<a href="playerStatTypeAdd.php"><button>'.
                        "Add Another Player Stat Type".
                        "</button></a>";
                } else {
                    show_player_stat_type($conn);
            ?>

            <h3>Enter Player Stat Type info to add</h3>
            <form method="post" action = "<?php $_PHP_SELF ?>">
                <table border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input id="player_stat_type_name" name="player_stat_type_name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Value Type</td>
                        <td>
                            <input id="player_stat_type_name" name="player_stat_type_value_type" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button id="player_stat_type_add" name="player_stat_type_add" type="submit">Add Player Stat Type</button>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                }
            ?>

            <a href="playerStatTypeList.php"><h3>Back to Player Stat Type List</h3></a>
            <?php
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>Add a New Team Stat Type</h1>

            <?php
                require("dbconnect.php");
                require("tableshow.php");
                require("beforeAfter.php");

                if(isset($_POST['team_stat_type_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $team_stat_type_name = addslashes($_POST['team_stat_type_name']);
                        $team_stat_type_value_type = addslashes($_POST['team_stat_type_value_type']);
                    } else {
                        $team_stat_type_name = $_POST['team_stat_type_name'];
                        $team_stat_type_value_type = $_POST['team_stat_type_value_type'];
                    }

                    $sql = "INSERT INTO teamstattype ".
                        "(`teamStat_Name`, `value_type`) VALUES ".
                        "('$team_stat_type_name', '$team_stat_type_value_type')";

                    display_before_after($sql, 'show_team_stat_type', $conn);

                    echo '<a href="teamStatTypeAdd.php"><button>'.
                        "Add Another Team Stat Type".
                        "</button></a>";
                } else {
                    show_team_stat_type($conn);
            ?>

            <h3>Enter Team Stat Type info to add</h3>
            <form method="post" action = "<?php $_PHP_SELF ?>">
                <table border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input id="team_stat_type_name" name="team_stat_type_name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Value Type</td>
                        <td>
                            <input id="team_stat_type_name" name="team_stat_type_value_type" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button id="team_stat_type_add" name="team_stat_type_add" type="submit">Add Team Stat Type</button>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                }
            ?>

            <a href="teamStatTypeList.php"><h3>Back to Team Stat Type List</h3></a>
            <?php
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
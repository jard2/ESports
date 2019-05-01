<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>Add a New Team Statistic</h1>

            <?php
                require("dbconnect.php");
                require("tableshow.php");
                require("beforeAfter.php");

                if(isset($_POST['team_stat_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $team_stat_team = addslashes($_POST['team_stat_team']);
                        $team_stat_game = addslashes($_POST['team_stat_game']);
                        $team_stat_type = addslashes($_POST['team_stat_type']);
                        $team_stat_date = addslashes($_POST['team_stat_date']);
                        $team_stat_time = addslashes($_POST['team_stat_time']);
                        $team_stat_value = addslashes($_POST['team_stat_value']);
                    } else {
                        $team_stat_team = $_POST['team_stat_team'];
                        $team_stat_game = $_POST['team_stat_game'];
                        $team_stat_type = $_POST['team_stat_type'];
                        $team_stat_date = $_POST['team_stat_date'];
                        $team_stat_time = $_POST['team_stat_time'];
                        $team_stat_value = $_POST['team_stat_value'];
                    }

                    $team_stat_timestamp = ''.$team_stat_date.' '.$team_stat_time;
                    if ($team_stat_value == '') {
                        $team_stat_value = 'NULL';
                    } else {
                        $team_stat_value = "'".$team_stat_value."'";
                    }

                    $sql = "INSERT INTO teamstats ".
                        "(`value`, `time_stamp`, `teamStat_Name`, `team_ID`, `game_ID`) VALUES ".
                        "($team_stat_value, '$team_stat_timestamp', '$team_stat_type', '$team_stat_team', '$team_stat_game')";

                    display_before_after($sql, 'show_team_stats', $conn);

                    echo '<a href="teamStatAdd.php"><button>'.
                        "Add Another Team Stat".
                        "</button></a>";
                } else {
                    show_team_stats($conn);
            ?>

            <h3>Enter Team Stat Type info to add</h3>
            <form method="post" action = "<?php $_PHP_SELF ?>">
                <table border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Team</td>
                        <td>
                            <select id="team_stat_team" name="team_stat_team">
                                <?php
                                    $sql = "SELECT team_ID, name FROM team";
                                    $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        echo '<option ';
                                        echo 'value="'.$row['team_ID'].'">';
                                        echo $row['team_ID'].' '.$row['name'];
                                        echo '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Game</td>
                        <td>
                            <select id="team_stat_game" name="team_stat_game">
                                <?php
                                    $sql = "SELECT game_ID, game_name FROM game";
                                    $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        echo '<option ';
                                        echo 'value="'.$row['game_ID'].'">';
                                        echo $row['game_ID'].' '.$row['game_name'];
                                        echo '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Stat Type</td>
                        <td>
                            <select id="team_stat_type" name="team_stat_type">
                                <?php
                                    $sql = "SELECT teamStat_Name FROM teamstattype";
                                    $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        echo '<option ';
                                        echo 'value="'.$row['teamStat_Name'].'">';
                                        echo $row['teamStat_Name'];
                                        echo '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                            <input id="team_stat_date" name="team_stat_date" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>
                            <input id="team_stat_time" name="team_stat_time" type="time">
                        </td>
                    </tr>
                    <tr>
                        <td>Value (optional)</td>
                        <td>
                            <input id="team_stat_value" name="team_stat_value" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button id="team_stat_add" name="team_stat_add" type="submit">Add Team Statistic</button>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                }
            ?>

            <a href="teamStatList.php"><h3>Back to Team Stat List</h3></a>
            <?php
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
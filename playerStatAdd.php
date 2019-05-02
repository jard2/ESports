<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
            <h1>Add a New Player Statistic</h1>

            <?php
                require("dbconnect.php");
                require("tableshow.php");
                require("beforeAfter.php");

                if(isset($_POST['player_stat_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $player_stat_player = addslashes($_POST['player_stat_player']);
                        $player_stat_game = addslashes($_POST['player_stat_game']);
                        $player_stat_type = addslashes($_POST['player_stat_type']);
                        $player_stat_date = addslashes($_POST['player_stat_date']);
                        $player_stat_time = addslashes($_POST['player_stat_time']);
                        $player_stat_value = addslashes($_POST['player_stat_value']);
                    } else {
                        $player_stat_player = $_POST['player_stat_player'];
                        $player_stat_game = $_POST['player_stat_game'];
                        $player_stat_type = $_POST['player_stat_type'];
                        $player_stat_date = $_POST['player_stat_date'];
                        $player_stat_time = $_POST['player_stat_time'];
                        $player_stat_value = $_POST['player_stat_value'];
                    }

                    $player_stat_timestamp = ''.$player_stat_date.' '.$player_stat_time;
                    if ($player_stat_value == '') {
                        $player_stat_value = 'NULL';
                    } else {
                        $player_stat_value = "'".$player_stat_value."'";
                    }

                    $sql = "INSERT INTO playerstats ".
                        "(`value`, `time_stamp`, `playerStat_Name`, `player_ID`, `game_ID`) VALUES ".
                        "($player_stat_value, '$player_stat_timestamp', '$player_stat_type', '$player_stat_player', '$player_stat_game')";

                    display_before_after($sql, 'show_player_stats', $conn);

                    echo '<a href="playerStatAdd.php"><button>'.
                        "Add Another Player Stat".
                        "</button></a>";
                } else {
                    show_player_stats($conn);
            ?>

            <h3>Enter Player Stat Type info to add</h3>
            <form method="post" action = "<?php $_PHP_SELF ?>">
                <table border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Player</td>
                        <td>
                            <select id="player_stat_player" name="player_stat_player">
                                <?php
                                    $sql = "SELECT player_ID, name FROM player";
                                    $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        echo '<option ';
                                        echo 'value="'.$row['player_ID'].'">';
                                        echo $row['player_ID'].' '.$row['name'];
                                        echo '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Game</td>
                        <td>
                            <select id="player_stat_game" name="player_stat_game">
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
                            <select id="player_stat_type" name="player_stat_type">
                                <?php
                                    $sql = "SELECT playerStat_Name FROM playerstattype";
                                    $result = $conn->query($sql);

                                    while($row = $result->fetch_assoc()) {
                                        echo '<option ';
                                        echo 'value="'.$row['playerStat_Name'].'">';
                                        echo $row['playerStat_Name'];
                                        echo '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>
                            <input id="player_stat_date" name="player_stat_date" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>
                            <input id="player_stat_time" name="player_stat_time" type="time">
                        </td>
                    </tr>
                    <tr>
                        <td>Value (optional)</td>
                        <td>
                            <input id="player_stat_value" name="player_stat_value" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button id="player_stat_add" name="player_stat_add" type="submit">Add Player Statistic</button>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                }
            ?>

            <a href="playerStatList.php"><h3>Back to Player Stat List</h3></a>
            <?php
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
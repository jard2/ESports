<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>Add a Member to a Team</h1>

            <?php
                require("dbconnect.php");
                require("tableshow.php");
                require("beforeAfter.php");

                if(isset($_POST['member_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $player_ID = addslashes($_POST['player_ID']);
                        $team_ID = addslashes($_POST['team_ID']);
                    } else {
                        $player_ID = $_POST['player_ID'];
                        $team_ID = $_POST['team_ID'];
                    }

		    $sql = "INSERT INTO members
			    (player_ID, team_ID)
			    VALUES ('$player_ID', '$team_ID')";

                    display_before_after($sql, 'show_members', $conn);

                    echo '<a href="memberAdd.php"><button>'.
                        "Add Another Member".
                        "</button></a>";
                } else {
			show_members($conn);
            ?>

            <h3>Enter member info to add</h3>
            <form method="post" action = "<?php $_PHP_SELF ?>">
                <table border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Player ID</td>
                        <td>
                            <input id="player_ID" name="player_ID" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>Team ID</td>
                        <td>
                            <input id="team_ID" name="team_ID" type="text">
                        </td>
                    </tr>
		    <tr>
                        <td colspan="2" align="center">
                            <button id="member_add" name="member_add" type="submit">Assign Member</button>
                        </td>
                    </tr>

                </table>
            </form>

            <?php
                }
            ?>

            <a href="memberList.php"><h3>Back to Member List</h3></a>
            <?php
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>

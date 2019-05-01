<!DOCTYPE html>
<html> 
    <body style="height:900px; background-color: lightblue;" align="center">
        <div align="center">
            <h1>Add a New Team</h1>

            <?php
                require("dbconnect.php");
                require("tableshow.php");

                if(isset($_POST['team_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $team_name = addslashes($_POST['team_name']);
                    } else {
                        $team_name = $_POST['team_name'];
                    }

                    echo "<table><tr><th>Before</th><th>After</th></tr>";
                    echo "<tr><td style=\"vertical-align:top\">";
                    show_team($conn);

                    $sql = "INSERT INTO team ".
                        "(`team_ID`, `name`) VALUES ".
                        "(NULL, '$team_name')";

                    $return = mysqli_query($conn, $sql);

                    if (!$return) {
                        die('Could not add team: '. mysqli_error($conn));
                    }

                    echo "</td><td style=\"vertical-align:top\">";
                    show_team($conn);
                    echo "</td></tr></table>";

                    echo '<a href="teamAdd.php"><button>'.
                        "Add Another Team".
                        "</button></a>";
                } else {
                    show_team($conn);
            ?>

            <h3>Enter Team info to add</h3>
            <form method="post" action = "<?php $_PHP_SELF ?>">
                <table border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input id="team_name" name="team_name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button id="team_add" name="team_add" type="submit">Add Team</button>
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                }
            ?>

            <a href="teamList.php"><h3>Back to Team List</h3></a>
            <?php
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
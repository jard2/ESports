<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
            <h1>Add a New Team</h1>

            <?php
                require("dbconnect.php");
                require("tableshow.php");
                require("beforeAfter.php");

                if(isset($_POST['team_add'])) {
                    if (!get_magic_quotes_gpc()) {
                        $team_name = addslashes($_POST['team_name']);
                    } else {
                        $team_name = $_POST['team_name'];
                    }

                    $sql = "INSERT INTO team ".
                        "(`team_ID`, `name`) VALUES ".
                        "(NULL, '$team_name')";

                    display_before_after($sql, 'show_team', $conn);

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
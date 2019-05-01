<?php
function show_player($conn) {
	$sql = "SELECT player_ID, name, birth_date, bio FROM player";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "0 results";
		return;
	}
	
	echo '<table border>';
	echo '<thead><tr>';
	echo '<th>'."Player ID".'</th>'.'<th>'."Name".'</th>'.'<th>'."Birth Date".'</th>'.'<th>'."Bio".'</th>';
	echo '</tr></thead>';
	echo '<tbody>';

	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td>" . $row["player_ID"]. "</td>";
		echo "<td>" . $row["name"]. "</td>";
		echo "<td>" . $row["birth_date"]. "</td>";
		echo "<td>" . $row["bio"]. "</td>";
		echo '</tr>';
	}
	
	echo '</tbody>';
	echo '</table>';
}

function show_team($conn) {
	$sql = "SELECT team_ID, name FROM team";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "0 results";
		return;
	}
	
	echo '<table border>';
	echo '<thead><tr>';
	echo '<th>'."Team ID".'</th>'.'<th>'."Name".'</th>';
	echo '</tr></thead>';
	echo '<tbody>';

	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td>" . $row["team_ID"]. "</td>";
		echo "<td>" . $row["name"]. "</td>";
		echo '</tr>';
	}
	
	echo '</tbody>';
	echo '</table>';
}

function show_game($conn) {
	$sql = "SELECT game_ID, game_name, publisher, release_date FROM game";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "0 results";
		return;
	}
	
	echo '<table border>';
	echo '<thead><tr>';
	echo '<th>'."Game ID".'</th>'.'<th>'."Name".'</th>'.'<th>'."Publisher".'</th>'.'<th>'."Release Date".'</th>';
	echo '</tr></thead>';
	echo '<tbody>';

	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td>" . $row["game_ID"]. "</td>";
		echo "<td>" . $row["game_name"]. "</td>";
		echo "<td>" . $row["publisher"]. "</td>";
		echo "<td>" . $row["release_date"]. "</td>";
		echo '</tr>';
	}
	
	echo '</tbody>';
	echo '</table>';
}

function show_player_stat_type($conn) {
	$sql = "SELECT playerStat_Name, value_type FROM playerstattype";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "0 results";
		return;
	}
	
	echo '<table border>';
	echo '<thead><tr>';
	echo '<th>'."Stat Name".'</th>'.'<th>'."Value Type".'</th>';
	echo '</tr></thead>';
	echo '<tbody>';

	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td>" . $row["playerStat_Name"]. "</td>";
		echo "<td>" . $row["value_type"]. "</td>";
		echo '</tr>';
	}
	
	echo '</tbody>';
	echo '</table>';
}

function show_team_stat_type($conn) {
	$sql = "SELECT teamStat_Name, value_type FROM teamstattype";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "0 results";
		return;
	}
	
	echo '<table border>';
	echo '<thead><tr>';
	echo '<th>'."Stat Name".'</th>'.'<th>'."Value Type".'</th>';
	echo '</tr></thead>';
	echo '<tbody>';

	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td>" . $row["teamStat_Name"]. "</td>";
		echo "<td>" . $row["value_type"]. "</td>";
		echo '</tr>';
	}
	
	echo '</tbody>';
	echo '</table>';
}

function show_player_stats($conn) {
	$sql = "SELECT ". 
			"value, time_stamp, playerStat_Name, ".
			"player.player_ID, player.name, ".
			"game.game_ID, game.game_name ".
		"FROM playerstats ".
			"join player on player.player_ID = playerstats.player_ID ".
			"join game on game.game_ID = playerstats.game_ID; ";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "0 results";
		return;
	}
	
	echo '<table border>';
	echo '<thead><tr>';
	echo '<th>'."Player ID".'</th>'.
		'<th>'."Player Name".'</th>'.
		'<th>'."Game ID".'</th>'.
		'<th>'."Game Name".'</th>'.
		'<th>'."Player Stat Type".'</th>'.
		'<th>'."Time Stamp".'</th>'.
		'<th>'."Stat Value".'</th>';
	echo '</tr></thead>';
	echo '<tbody>';

	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td>" . $row["player_ID"]. "</td>";
		echo "<td>" . $row["name"]. "</td>";
		echo "<td>" . $row["game_ID"]. "</td>";
		echo "<td>" . $row["game_name"]. "</td>";
		echo "<td>" . $row["playerStat_Name"]. "</td>";
		echo "<td>" . $row["time_stamp"]. "</td>";
		echo "<td>" . $row["value"]. "</td>";
		echo '</tr>';
	}
	
	echo '</tbody>';
	echo '</table>';
}
?>
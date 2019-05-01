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
?>
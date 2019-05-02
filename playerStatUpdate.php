<!DOCTYPE html>
<html>

   <head>
      <title>Update Player Stat</title>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">
      <?php
	  
		require("tableshow.php");
		require("dbconnect.php");
		require("beforeAfter.php");
	  
         if(isset($_POST['update'])) {
            
	    if (!get_magic_quotes_gpc()) {
		$player_ID = addslashes($_POST['player_ID']);
		$game_ID = addslashes($_POST['game_ID']);
		$playerStat_Name = addslashes($_POST['playerStat_Name']);
		$value = addslashes($_POST['value']);
	    }
	    else {
		$player_ID = $_POST['player_ID'];
	    	$game_ID = $_POST['game_ID'];
		$playerStat_Name = $_POST['playerStat_Name'];
		$value = addslashes($_POST['value']);
	    }

            			
			echo " <br> Teams table before update <br>";
			show_team($conn);
   
	    //$sql = "UPDATE team SET name = '$name' WHERE team_ID = '$team_ID'";
	    $sql = "UPDATE playerstats SET value = '$value' WHERE game_ID = '$game_ID' 
			AND player_ID = '$player_ID'
			AND playerStat_Name = '$playerStat_Name'"; 

            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($conn));
            }
         
            echo "Player Stat Udpated Successfully\n";
			
			echo " <br> player stats table after update <br>";
			show_player_stats($conn);
			
            mysqli_close($conn);
         } 
		 else if(isset($_POST['show'])){
			 
			 show_player_stats($conn);
		 }	 
		 
		 else {
      ?>
	  <br><br><br><br>
     <?php
         show_player_stats($conn);
     ?>
     <p>Enter player stat information to update <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Player ID</td>
               <td>
                  <input name = "player_ID" type = "text" id = "player_ID" type = "text">
               </td>
            </tr>
            <tr>
               <td width = "250">Game ID</td>
               <td>
                  <input name = "game_ID" type = "text" id = "game_ID">
               </td>
            </tr>
	    <tr>
               <td width = "250">Stat Name</td>
               <td>
                  <input name = "playerStat_Name" type = "text" id = "playerStat_Name">
               </td>
            </tr>

            <tr>
               <td width = "250"> </td>
               <td>
                  <input name = "update" type = "submit" id = "update"  value = "update">
               </td>
            </tr>
			
         </table>
   
	  
   <?php
      }
   ?>
   <hr width="50">
<a href="playerStatList.php"><h3>Back to Player Stats List</h3></a>

<hr width="50">
   </div>
   
   </body>
</html>

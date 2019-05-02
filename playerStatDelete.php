<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">

<p>Player Stat Deletion <br> </p>

<?php
	  
		require("tableshow.php");
        require("dbconnect.php");
        require("beforeAfter.php");
	  
         if(isset($_POST['delete'])) {
            $game_ID = $_POST['game_ID'];
            $player_stat_name = $_POST['player_stat_name'];
            $player_ID = $_POST['player_ID'];
   
            $sql = "DELETE FROM PlayerStats WHERE game_ID='$game_ID' and playerStat_name='$player_stat_name' and player_ID='$player_ID' ";
              
            
            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not delete data: ' . mysqli_error($conn));
            }
         
            echo "Data deleted successfully\n";
			
			echo " <br> Player Stats after deletion <br>";
			show_player_stats($conn);
			
            mysqli_close($conn);
         } 
		 else if(isset($_POST['show'])){
			 
            show_player_stat($conn);
		 }	 
		 
		 else {
      ?>
	  <br><br><br><br>
     <?php
         show_player_stats($conn);
     ?>
     <p>Enter Game ID, Player ID, Stat Name, and Value fordeletion <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Game ID</td>
               <td>
                  <input name = "game_ID" type = "text" id = "game_ID">
               </td>
            </tr>
            <tr>
               <td width = "250">Player ID</td>
               <td>
                  <input name = "player_ID" type = "text" id = "player_ID">
               </td>
            </tr>
            <tr>
               <td width = "250">Stat Name</td>
               <td>
                  <input name = "player_stat_name" type = "text" id = "player_stat_name">
               </td>
            </tr>

            <tr>
               <td width = "250"> </td>
               <td>
                  <input name = "delete" type = "submit" id = "delete"  value = "delete">
               </td>
            </tr>
         </table>
   <?php
      }
   ?>
<br><br><br><br>

<hr width="50">
<a href="index.php" style="color:red;font-weight:bold;">Home</a>
<hr width="50">
</div>
</body> </html>

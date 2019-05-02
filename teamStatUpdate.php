<!DOCTYPE html>
<html>

   <head>
      <title>Update Team Stat</title>
   </head>

   <body>
   <div style="height:900px; background-color: lightblue;" align="center">
      <?php
	  
		require("tableshow.php");
		require("dbconnect.php");
		require("beforeAfter.php");
	  
         if(isset($_POST['update'])) {
            
	    if (!get_magic_quotes_gpc()) {
		$team_ID = addslashes($_POST['team_ID']);
		$game_ID = addslashes($_POST['game_ID']);
		$teamStat_Name = addslashes($_POST['teamStat_Name']);
		$value = addslashes($_POST['value']);
	    }
	    else {
		$team_ID = $_POST['team_ID'];
	    	$game_ID = $_POST['game_ID'];
		$teamStat_Name = addslashes($_POST['teamStat_Name']);
		$value = addslashes($_POST['value']);
	    }

            			
			echo " <br> Team table before update <br>";
			show_team($conn);
   
	    //$sql = "UPDATE team SET name = '$name' WHERE team_ID = '$team_ID'";
	    $sql = "UPDATE teamstats SET value = '$value' WHERE game_ID = '$game_ID' 
			AND team_ID = '$team_ID'
			AND teamStat_Name = '$teamStat_Name'"; 

            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($conn));
            }
         
            echo "Team Stat Udpated Successfully\n";
			
			echo " <br> team stats table after update <br>";
			show_team_stats($conn);
			
            mysqli_close($conn);
         } 
		 else if(isset($_POST['show'])){
			 
			 show_team_stats($conn);
		 }	 
		 
		 else {
      ?>
	  <br><br><br><br>
     <p>Enter team stat information to update <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Team ID</td>
               <td>
                  <input name = "team_ID" type = "text" id = "team_ID" type = "text">
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
                  <input name = "teamStat_Name" type = "text" id = "teamStat_Name">
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
<a href="teamStatList.php"><h3>Back to Team Stats List</h3></a>

<hr width="50">
   </div>
   
   </body>
</html>

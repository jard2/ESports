<!DOCTYPE html>
<html> 
<head>

	<link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'heading.php';?>
        <div align="center">

<p>Team Stat Deletion <br> </p>

<?php
	  
		require("tableshow.php");
        require("dbconnect.php");
        require("beforeAfter.php");
	  
         if(isset($_POST['delete'])) {
            $game_ID = $_POST['game_ID'];
            $team_stat_name = $_POST['team_stat_name'];
            $team_ID = $_POST['team_ID'];
            $value = $_POST['value'];

   
            $sql = "DELETE FROM TeamStats WHERE game_ID=$game_id and teamStat_name=$team_stat_name and team_ID=$team_ID and value=$value";
              
            
            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not delete data: ' . mysqli_error($conn));
            }
         
            echo "Data deleted successfully\n";
			
			echo " <br> Team Stats after deletion <br>";
			show_team_stat($conn);
			
            mysqli_close($conn);
         } 
		 else if(isset($_POST['show'])){
			 
            show_team_stat($conn);
		 }	 
		 
		 else {
      ?>
	  <br><br><br><br>
     <?php
         show_team_stats($conn);
     ?>
     <p>Enter Game ID, Team ID, Stat Name, and Value for deletion <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Game ID</td>
               <td>
                  <input name = "game_ID" type = "text" id = "game_ID">
               </td>
            </tr>
            <tr>
               <td width = "250">Team ID</td>
               <td>
                  <input name = "team_ID" type = "text" id = "team_ID">
               </td>
            </tr>
            <tr>
               <td width = "250">Stat Name</td>
               <td>
                  <input name = "team_stat_name" type = "text" id = "team_stat_name">
               </td>
            </tr>
            <tr>
               <td width = "250">Value</td>
               <td>
                  <input name = "value" type = "text" id = "value">
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

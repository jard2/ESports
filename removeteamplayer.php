<!DOCTYPE html>

<html>



   <head>

      <title>Delete Team Player</title>

   </head>



   <body>

   <div style="height:900px; background-color: lightblue;" align="center">

      <?php

	  

		require("tableshow.php");

		require("dbconnect.php");

		require("beforeAfter.php");

	  

         if(isset($_POST['sub'])) {

            

	    if (!get_magic_quotes_gpc()) {

		$player_ID = addslashes($_POST['player_ID']);

		$team_ID = addslashes($_POST['team_ID']);

	    }

	    else {

		$player_ID = $_POST['player_ID'];

	    	$game_ID = $_POST['game_ID'];

	    }



            	

			echo " <br> Team Members table before update <br>";

			show_members($conn);

   

	 $sql = "DELETE FROM members WHERE player_ID='$player_ID'
		AND team_ID = 'team_ID' ".
               "(player_ID, team_ID) "."VALUES ".
               "('$player_ID','$team_ID')";
            
			//mysqli_select_db($conn,'esports');
            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
         
            echo "Player removed successfully successfully\n";

			echo " <br> memebers table after update <br>";

			show_members($conn);
	

            mysqli_close($conn);

         } 

		 else if(isset($_POST['show'])){

			 

			 show_members($conn);

		 }	 

		 

		 else {

      ?>

	  <br><br><br><br>

     <p>Enter player id information to remove from team <br> </p>

      <form method = "post" action = "<?php $_PHP_SELF ?>">

         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">

            <tr>

               <td width = "250">Player ID</td>

               <td>

                  <input name = "player_ID" type = "text" id = "player_ID" type = "text">

               </td>

            </tr>

            <tr>

               <td width = "250">Team ID</td>

               <td>

                  <input name = "team_ID" type = "text" id = "team_ID">

               </td>

            </tr>

            <tr>

               <td width = "250"> </td>

               <td>

                  <input name = "sub" type = "submit" id = "sub"  value = "delete">

               </td>

            </tr>

			

         </table>

   

	  

   <?php

      }

   ?>

   <hr width="50">

<a href="removeteamplayer.php"><h3>Back to Members List</h3></a>



<hr width="50">

   </div>

   

   </body>

</html>
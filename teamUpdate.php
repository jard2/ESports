<!DOCTYPE html>
<html>

   <head>
      <title>Update Team</title>
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
		$name = addslashes($_POST['name']);
	    }
	    else {
		$team_ID = $_POST['team_ID'];
	    	$name = $_POST['name'];

	    }

            			
			echo " <br> Teams table before update <br>";
			show_team($conn);
   
	    $sql = "UPDATE team SET name = '$name' WHERE team_ID = '$team_ID'";

            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($conn));
            }
         
            echo "Team Udpated Successfully\n";
			
			echo " <br> team table after update <br>";
			show_team($conn);
			
            mysqli_close($conn);
         } 
		 else if(isset($_POST['show'])){
			 
			 show_team($conn);
		 }	 
		 
		 else {
      ?>
	  <br><br><br><br>
     <p>Enter team information to date <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">ID</td>
               <td>
                  <input name = "team_ID" type = "text" id = "team_ID" type = "text">
               </td>
            </tr>
            <tr>
               <td width = "250">Name</td>
               <td>
                  <input name = "name" type = "text" id = "name" type = "text">
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
<a href="teamList.php"><h3>Back to Team List</h3></a>

<hr width="50">
   </div>
   
   </body>
</html>

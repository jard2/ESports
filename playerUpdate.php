<!DOCTYPE html>
<html>

   <head>
      <title>Update Player</title>
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
		$name = addslashes($_POST['name']);
		$bio = addslashes($_POST['bio']);
		$birth_date = addslashes($_POST['birth_date']);
	    }
	    else {
		$player_ID = $_POST['player_ID'];
	    	$name = $_POST['name'];
	    	$bio = $_POST['bio'];
	    	$birth_date = $_POST['birth_date'];

	    }

            			
			echo " <br> Player table before update <br>";
			show_player($conn);
   
	    $sql = "UPDATE player SET name = '$name', bio = '$bio', birth_date = '$birth_date' WHERE player_ID = '$player_ID'";

			//mysqli_select_db($conn,'university');
            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($conn));
            }
         
            echo "Player Udpated Successfully\n";
			
			echo " <br> Player table after update <br>";
			show_player($conn);
			
            mysqli_close($conn);
         } 
		 else if(isset($_POST['show'])){
			 
			 show_player($conn);
		 }	 
		 
		 else {
      ?>
	  <br><br><br><br>
     <p>Enter Player information for update <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">ID</td>
               <td>
                  <input name = "player_ID" type = "text" id = "player_ID" type = "text">
               </td>
            </tr>
            <tr>
               <td width = "250">Name</td>
               <td>
                  <input name = "name" type = "text" id = "name" type = "text">
               </td>
            </tr>
	    <tr>
               <td width = "250">Birth Date</td>
               <td>
                  <input name = "birth_date" type = "date" id = "birth_date" type = "date">
               </td>
            </tr>
	    <tr>
                        <td>Bio</td>
                        <td>
                            <textarea id="bio" name="bio"></textarea>
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
<a href="playerList.php"><h3>Back to Player List</h3></a>

<hr width="50">
   </div>
   
   </body>
</html>

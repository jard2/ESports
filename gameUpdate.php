<!DOCTYPE html>
<html>

   <head>
      <title>Update Team</title>
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
		$game_ID = addslashes($_POST['game_ID']);
		$game_name = addslashes($_POST['game_name']);
		$publisher = addslashes($_POST['publisher']);
		$release_date = addslashes($_POST['release_date']);
	    }
	    else {
		$game_ID = $_POST['game_ID'];
	    	$name = $_POST['game_name'];
		$publisher = $_POST['publisher'];
		$release_date = $_POST['release_date'];
	    }

            			
			echo " <br> Game table before update <br>";
			show_game($conn);
   
	    $sql = "UPDATE game SET game_name = '$game_name',
		    	publisher = '$publisher',
			release_date = '$release_date'
		    WHERE game_ID = '$game_ID'";
		    

            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($conn));
            }
         
            echo "Game Udpated Successfully\n";
			
			echo " <br> game table after update <br>";
			show_game($conn);
			
            mysqli_close($conn);
         } 
		 else if(isset($_POST['show'])){
			 
			 show_game($conn);
		 }	 
		 
		 else {
      ?>
	  <br><br><br><br>
     <p>Enter game information to date <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Game ID</td>
               <td>
                  <input name = "game_ID" type = "text" id = "game_ID" type = "text">
               </td>
            </tr>
            <tr>
               <td width = "250">Name</td>
               <td>
                  <input name = "game_name" type = "text" id = "game_name" type = "text">
               </td>
            </tr>
	    <tr>
               <td width = "250">Publisher</td>
               <td>
                  <input name = "publisher" type = "text" id = "publisher" type = "text">
               </td>
            </tr>
	    <tr>
               <td width = "250">Release Date</td>
               <td>
                  <input name = "release_date" type = "date" id = "release_date" type = "date">
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
<a href="gameList.php"><h3>Back to Game List</h3></a>

<hr width="50">
   </div>
   
   </body>
</html>

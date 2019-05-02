<!DOCTYPE html>
<html>

   <head>
      <title>Add New Record in MySQL Database</title>
	<link rel="stylesheet" href="main.css">
	</head>
	<body>
	<?php include 'heading.php';?>
   <div align="center">
      <?php

		require("tableshow.php");
		require("dbconnect.php");

         if(isset($_POST['add'])) {

            // if(! get_magic_quotes_gpc() ) {
            //    $i_name = addslashes ($_POST['i_name']);
            //    $i_dept = addslashes ($_POST['i_dept']);
            // } else {
            //    $i_name = $_POST['i_name'];
            //    $i_dept = $_POST['i_dept'];
            // }
            $i_ID = $_POST['i_ID'];
            $i_teamID = $_POST['i_teamID'];

			echo " <br> Instructor table before insertion <br>";
			show_members($conn);

            $sql = "INSERT INTO members ".
               "(player_ID, team_ID) "."VALUES ".
               "('$i_ID','$i_teamID')";

			//mysqli_select_db($conn,'university');
            $retval = mysqli_query($conn, $sql);

            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }

            echo "Entered data successfully\n";

			echo " <br> Instructor table after insertion <br>";
			show_members($conn);

            mysqli_close($conn);
         }
		 else if(isset($_POST['show'])){

			 show_members($conn);
		 }

		 else {
      ?>
	  <br><br><br><br>
     <p>Enter information to add a player to a team <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Player ID</td>
               <td>
                  <input name = "i_ID" type = "text" id = "i_ID">
               </td>
            </tr>


            <tr>
              <td width = "250"> Team ID</td>
              <td> <input name="i_teamID" type= "text" id = "i_teamID"> </td>
            </tr>

            <tr>
               <td width = "250"></td>
               <td> </td>
            </tr>

            <tr>
               <td width = "250"> </td>
               <td>
                  <input name = "add" type = "submit" id = "add"  value = "insert">
               </td>
            </tr>

         </table>


   <?php
      }
   ?>
   <hr width="50">
<a href="index.php" style="color:red;font-weight:bold;">Home</a>
<hr width="50">
   </div>

   </body>
</html>

<!DOCTYPE html>
<html>

   <head>
      <title>Update Team Stat Type</title>

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
		$teamStat_Name = addslashes($_POST['teamStat_Name']);
		$value_type = addslashes($_POST['value_type']);
	    }
	    else {
		$teamStat_Name = $_POST['teamStat_Name'];
	    	$value_type = $_POST['value_type'];
	    }

            			
			echo " <br> Team stat type table before update <br>";
			show_team_stat_type($conn);
   
	    $sql = "UPDATE teamStatType SET teamStat_Name = '$teamStat_Name', value_type = '$value_type'
		    WHERE teamStat_Name = '$teamStat_Name'";

            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($conn));
            }
         
            echo "Team Stat Type Udpated Successfully\n";
			
			echo " <br> team stat type table after update <br>";
			show_team_stat_type($conn);
			
            mysqli_close($conn);
         } 
		 else if(isset($_POST['show'])){
			 
			 show_team_stat_type($conn);
		 }	 
		 
		 else {
      ?>
	  <br><br><br><br>
     <?php
         show_team_stat_type($conn);
     ?>
     <p>Enter team stat type information to update <br> </p>
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
	    <tr>
               <td width = "250">Stat Name</td>
               <td>
                  <input name = "teamStat_Name" type = "text" id = "teamStat_Name">
               </td>
            </tr>
	    <tr>
               <td width = "250">Value Type</td>
               <td>
                  <input name = "value_type" type = "text" id = "value_type">
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
<a href="teamStatTypeList.php"><h3>Back to Team Stat Type List</h3></a>

<hr width="50">
   </div>
   
   </body>
</html>

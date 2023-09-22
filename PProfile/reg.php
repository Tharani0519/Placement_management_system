<?php
$connect = mysql_connect("localhost", "root", "","revised"); // Establishing Connection with Server
mysql_select_db("revised"); // Selecting Database from Server
if(isset($_POST['update']))
{ 
$Username = $_POST['Fname'];
$Password = $_POST['Lname'];
$Email = $_POST['USN'];
$Question = $_SESSION["username"];
$Answer = $_POST['Num'];


if($USN !=''||$email !='')
{
	if($USN == $sun)
	{
		
	$sql = mysql_query("SELECT * FROM `revised`.`basicdetails` WHERE `USN`='$USN'");
	if(mysql_num_rows($sql) == 1)
	{
  
		if($query = mysql_query("UPDATE `revised`.`basicdetails` SET `FirstName`='$fname', `LastName`='$lname', `Mobile`='$phno', `Email`='$email', `DOB`='$date', `Sem`='$cursem', `Branch`= '$branch', `SSLC`='$per', `PU/Dip`='$puagg', `BE`='$beaggregate', `Backlogs`='$back', `HofBacklogs`='$hisofbk', `DetainYears`='$detyear' ,`Approve`='0'
           WHERE `basicdetails`.`USN` = '$USN'"))
               {
				echo "<center>Data Updated successfully...!!</center>";
               }
	  
            else echo "<center>FAILED</center>";
		
	}	
	else echo "<center>NO record found for update</center>";
	}
else
	echo "<center>enter your usn only</center>";
}
}
?>
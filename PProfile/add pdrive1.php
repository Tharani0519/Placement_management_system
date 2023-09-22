<?php
$connect = mysqli_connect("localhost", "root", "","revised"); // Establishing Connection with Server
mysql_select_db("revised"); // Selecting Database from Server
if(isset($_POST['submit']))
{ 
$cname = $_POST['compny'];
$date = $_POST['date'];
$campool = $_POST['campool'];
$poolven = $_POST['pcv'];
$per = $_POST['sslc'];
$puagg = $_POST['puagg'];
$beaggregate = $_POST['beagg'];
$back = $_POST['curback'];
$hisofbk = $_POST['hob'];
$breakstud = $_POST['break'];
$otherdet = $_POST['odetails'];
if ($cname != '' || $date != '') {
    $query = "INSERT INTO revised.addpdrive (CompanyName, Date, campusPool, poolcampusVenue, SSLCAgg, PUDIPLOMAgg, BEAgg, CurrentBacklogs, HistoryBacklogs, BreakStudies, otherDetails) 
              VALUES ('$cname', '$date', '$campool', '$poolven', '$per', '$puagg', '$beaggregate', '$back', '$hisofbk', '$breakstud', '$otherdet')";
    if (mysqli_query($connect, $query)) {
      echo "<center>Drive Inserted successfully</center>";
    } else {
      die("FAILED: " . mysqli_error($connect));
    }
  }
}

mysqli_close($connect);

?>
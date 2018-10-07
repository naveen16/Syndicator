<html>
<head>
<title>Add an Event</title>
</head>
<body>

<?php
$username="ec2-user";
$password="pass";
$database="pulsd";

$event_name=$_POST['event_name'];
$event_description=$_POST['event_description'];
$start_time=$_POST['start_time'];
$start_timeTZ=$_POST['start_timeTZ'];
$end_time=$_POST['end_time'];
$end_timeTZ=$_POST['end_timeTZ'];
$currency=$_POST['currency'];

$link = mysqli_connect("localhost",$username,$password);
mysqli_select_db($link,$database);
$result=mysqli_query($link,"select max(eid) maxx from event");
$row = mysqli_fetch_assoc($result);
$num=mysqli_num_rows($result);
if ($num == 0)
  $eid = 1;
else
  $eid = $row["maxx"] + 1;
$query="INSERT INTO event (eid,event_name,event_description,start_time,start_timeTZ,end_time,end_timeTZ,currency,published) VALUES ($eid,'"
       .$event_name."','"
       .$event_description."','"
       .$start_time."','"
       .$start_timeTZ."','"
       .$end_time."','"
       .$end_timeTZ."','"
       .$currency."','N')";
print($query);
$result=mysqli_query($link,$query);
mysqli_close($link);
?>
<P> Event ADDED!
<P>
<a href="./">Return to main page</a>

</body>
</html>

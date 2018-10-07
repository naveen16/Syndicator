<html>
<head>
<title>Display All Events</title>
</head>
<body>

<?php
$username="ec2-user";
$password="pass";
$database="pulsd";

$link = mysqli_connect("localhost",$username,$password);
mysqli_select_db($link, $database);

$query="SELECT * FROM event order by eid";
$result=mysqli_query($link,$query);
mysqli_close($link);
?>

<h4>All Events</h4>
<table border="2" cellspacing="2" cellpadding="2">
<tr>
<th><font face="Arial, Helvetica, sans-serif">EID</font></th>
<th><font face="Arial, Helvetica, sans-serif">EVENT NAME</font></th>
<th><font face="Arial, Helvetica, sans-serif">ORGANIZER NAME</font></th>
<th><font face="Arial, Helvetica, sans-serif">EVENT DESCRIPTION</font></th>
<th><font face="Arial, Helvetica, sans-serif">START TIME</font></th>
<th><font face="Arial, Helvetica, sans-serif">START TIME TZ</font></th>
<th><font face="Arial, Helvetica, sans-serif">END TIME</font></th>
<th><font face="Arial, Helvetica, sans-serif">END TIME TZ</font></th>
<th><font face="Arial, Helvetica, sans-serif">CURRENCY</font></th>
<th><font face="Arial, Helvetica, sans-serif">VENUE ID</font></th>
<th><font face="Arial, Helvetica, sans-serif">TEST EVENT</font></th>
<th><font face="Arial, Helvetica, sans-serif">PUBLISHED</font></th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
  $eid=$row["eid"];
  $event_name=$row["event_name"];
  $organizer_name=$row["organizer_name"];
  $event_description=$row["event_description"];
  $start_time=$row["start_time"];
  $start_timeTZ=$row["start_timeTZ"];
  $end_time=$row["end_time"];
  $end_timeTZ=$row["end_timeTZ"];
  $currency=$row["currency"];
  $venue_id=$row["venue_id"];
  $test_event=$row["test_event"];
  $published=$row["published"];
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif">
  <a href="processGetEvent.php?eid=<?php echo $eid; ?>"><?php echo $eid; ?></a></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $event_name; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $organizer_name; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $event_description; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $start_time; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $start_timeTZ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $end_time; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $end_timeTZ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $currency; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $venue_id; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $test_event; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $published; ?></font></td>
</tr>

<?php
}
?>

</table>

<P>
<a href="./">Return to main page</a>

</body>
</html>

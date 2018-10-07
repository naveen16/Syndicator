<html>
<head>
<title>Display an Event</title>
</head>
<body>

<?php
$username="ec2-user";
$password="pass";
$database="pulsd";

$eid=$_GET['eid'];
$link = mysqli_connect("localhost",$username,$password);
@mysqli_select_db($link,$database); 
$query="SELECT * FROM event where eid = $eid";
$result=mysqli_query($link,$query);
mysqli_close($link);

$row = mysqli_fetch_assoc($result);
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

<h4>Event <?php echo $eid; ?></h4>
<table border="2">
<tr>
<td> <font face="Arial, Helvetica, sans-serif">EID</font> </td>
<td> <?php echo $eid; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">EVENT NAME</font> </td>
<td> <?php echo $event_name; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">ORGANIZER NAME</font> </td>
<td> <?php echo $organizer_name; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">EVENT DESCRIPTION</font> </td>
<td> <?php echo $event_description; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">START TIME</font> </td>
<td> <?php echo $start_time; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">START TIME TZ</font> </td>
<td> <?php echo $start_timeTZ; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">END TIME</font> </td>
<td> <?php echo $end_time; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">END TIME TZ</font> </td>
<td> <?php echo $end_timeTZ; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">CURRENCY</font> </td>
<td> <?php echo $currency; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">VENUE ID</font> </td>
<td> <?php echo $venue_id; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">TEST EVENT</font> </td>
<td> <?php echo $test_event; ?> </td>
</tr>
<tr>
<td> <font face="Arial, Helvetica, sans-serif">PUBLISHED</font> </td>
<td> <?php echo $published; ?> </td>
</tr>

</table>

<P>
<a href="./processGetEvents.php">Return to previous page</a>
<P>
<a href="./">Return to main page</a>

</body>
</html>

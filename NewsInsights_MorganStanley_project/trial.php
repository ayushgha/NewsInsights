
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>

<html lang="en">
    
  <head>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet'>
	<script>
window.onload = function () {

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trial";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "SELECT x.f FROM (SELECT day, SUM(freq) as f FROM business WHERE keyword='HDFC' GROUP BY day) x ORDER BY x.day";
$sql1 = ("SELECT SUM(freq) as freq FROM business WHERE keyword='HDFC' GROUP BY keyword");
$sql2 = ("SELECT SUM(freq) as freq FROM business WHERE keyword='Tesla'");
$sql3 = ("SELECT SUM(freq) as freq FROM business WHERE keyword='Aviation'");
$sql4 = ("SELECT SUM(freq) as freq FROM business WHERE keyword='GST'");


// SELECT freq FROM (SELECT SUM(freq), day FROM business WHERE keyword='HDFC' GROUP BY day) x ORDER BY x.day
//$sql = ("SELECT f from (SUM(freq) as f FROM business WHERE keyword='HDFC' GROUP BY day) ORDER BY day ");

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

$business = array();


if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$business[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

?>
var jArrFreq;

jArrFreq = <?php echo json_encode($business);?>;

console.log(parseInt(jArrFreq[0]['freq']));


</script>
</head>
</html>
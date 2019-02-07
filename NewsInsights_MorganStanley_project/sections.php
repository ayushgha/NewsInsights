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
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
 <link href="css/sb-admin.css" rel="stylesheet">
 <link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet'>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>


 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>



window.onload = function () {


    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newsinsights";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1 = ("SELECT SUM(frequency) as freq FROM banking WHERE keywrd='HDFC' GROUP BY keywrd");
$sql2 = ("SELECT SUM(frequency) as freq FROM banking WHERE keywrd='Tesla' GROUP BY keywrd");
$sql3 = ("SELECT SUM(frequency) as freq FROM banking WHERE keywrd='Aviation' GROUP BY keywrd");
$sql4 = ("SELECT SUM(frequency) as freq FROM banking WHERE keywrd='GST' GROUP BY keywrd");


$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

$business1 = array();
$business2 = array();
$business3 = array();
$business4 = array();

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$business1[] = $row;
    }
} else {
    echo "0 results";
}

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
		$business2[] = $row;
    }
} else {
    echo "0 results";
}

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
		$business3[] = $row;
    }
} else {
    echo "0 results";
}

if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
		$business4[] = $row;
    }
} else {
    echo "0 results";
}


?>


var jArrFreq1;
jArrFreq1 = <?php echo json_encode($business1);?>;
var f_hdfc0 = parseInt(jArrFreq1[0]['freq']);

var jArrFreq2;
jArrFreq2 = <?php echo json_encode($business2);?>;
var f_tesla0 = parseInt(jArrFreq2[0]['freq']);

var jArrFreq3;
jArrFreq3 = <?php echo json_encode($business3);?>;
var f_avaition0 = parseInt(jArrFreq3[0]['freq']);

var jArrFreq4;
jArrFreq4 = <?php echo json_encode($business4);?>;
var f_gst0 = parseInt(jArrFreq4[0]['freq']);


<?php

$sql1 = ("SELECT SUM(frequency) as freq FROM business WHERE keywrd='HDFC' GROUP BY keywrd");
$sql2 = ("SELECT SUM(frequency) as freq FROM business WHERE keywrd='Tesla' GROUP BY keywrd");
$sql3 = ("SELECT SUM(frequency) as freq FROM business WHERE keywrd='Aviation' GROUP BY keywrd");
$sql4 = ("SELECT SUM(frequency) as freq FROM business WHERE keywrd='GST' GROUP BY keywrd");


// SELECT freq FROM (SELECT SUM(freq), day FROM business WHERE keyword='HDFC' GROUP BY day) x ORDER BY x.day
//$sql = ("SELECT f from (SUM(freq) as f FROM business WHERE keyword='HDFC' GROUP BY day) ORDER BY day ");

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

$business1 = array();
$business2 = array();
$business3 = array();
$business4 = array();

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$business1[] = $row;
    }
} else {
    echo "0 results";
}

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
		$business2[] = $row;
    }
} else {
    echo "0 results";
}

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
		$business3[] = $row;
    }
} else {
    echo "0 results";
}

if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
		$business4[] = $row;
    }
} else {
    echo "0 results";
}


?>


var jArrFreq1;
jArrFreq1 = <?php echo json_encode($business1);?>;
var f_hdfc1 = parseInt(jArrFreq1[0]['freq']);

var jArrFreq2;
jArrFreq2 = <?php echo json_encode($business2);?>;
var f_tesla1 = parseInt(jArrFreq2[0]['freq']);

var jArrFreq3;
jArrFreq3 = <?php echo json_encode($business3);?>;
var f_avaition1 = parseInt(jArrFreq3[0]['freq']);

var jArrFreq4;
jArrFreq4 = <?php echo json_encode($business4);?>;
var f_gst1 = parseInt(jArrFreq4[0]['freq']);






<?php


$sql1 = ("SELECT SUM(frequency) as freq FROM finance WHERE keywrd='HDFC' GROUP BY keywrd");
$sql2 = ("SELECT SUM(frequency) as freq FROM finance WHERE keywrd='Tesla' GROUP BY keywrd");
$sql3 = ("SELECT SUM(frequency) as freq FROM finance WHERE keywrd='Aviation' GROUP BY keywrd");
$sql4 = ("SELECT SUM(frequency) as freq FROM finance WHERE keywrd='GST' GROUP BY keywrd");


$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

$business1 = array();
$business2 = array();
$business3 = array();
$business4 = array();

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$business1[] = $row;
    }
} else {
    echo "0 results";
}

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
		$business2[] = $row;
    }
} else {
    echo "0 results";
}

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
		$business3[] = $row;
    }
} else {
    echo "0 results";
}

if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
		$business4[] = $row;
    }
} else {
    echo "0 results";
}

?>


var jArrFreq1;
jArrFreq1 = <?php echo json_encode($business1);?>;
var f_hdfc2 = parseInt(jArrFreq1[0]['freq']);

var jArrFreq2;
jArrFreq2 = <?php echo json_encode($business2);?>;
var f_tesla2 = parseInt(jArrFreq2[0]['freq']);

var jArrFreq3;
jArrFreq3 = <?php echo json_encode($business3);?>;
var f_avaition2 = parseInt(jArrFreq3[0]['freq']);

var jArrFreq4;
jArrFreq4 = <?php echo json_encode($business4);?>;
var f_gst2 = parseInt(jArrFreq4[0]['freq']);

<?php
$sql1 = ("SELECT SUM(frequency) as freq FROM technology WHERE keywrd='HDFC' GROUP BY keywrd");
$sql2 = ("SELECT SUM(frequency) as freq FROM technology WHERE keywrd='Tesla' GROUP BY keywrd");
$sql3 = ("SELECT SUM(frequency) as freq FROM technology WHERE keywrd='Aviation' GROUP BY keywrd");
$sql4 = ("SELECT SUM(frequency) as freq FROM technology WHERE keywrd='GST' GROUP BY keywrd");

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

$business1 = array();
$business2 = array();
$business3 = array();
$business4 = array();

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$business1[] = $row;
    }
} else {
    echo "0 results";
}

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
		$business2[] = $row;
    }
} else {
    echo "0 results";
}

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
		$business3[] = $row;
    }
} else {
    echo "0 results";
}

if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
		$business4[] = $row;
    }
} else {
    echo "0 results";
}


$conn->close();
?>


var jArrFreq1;

jArrFreq1 = <?php echo json_encode($business1);?>;
var f_hdfc3 = parseInt(jArrFreq1[0]['freq']);



var jArrFreq2;
jArrFreq2 = <?php echo json_encode($business2);?>;
var f_tesla3 = parseInt(jArrFreq2[0]['freq']);


var jArrFreq3;

jArrFreq3 = <?php echo json_encode($business3);?>;
var f_avaition3= parseInt(jArrFreq3[0]['freq']);


var jArrFreq4;
jArrFreq4 = <?php echo json_encode($business4);?>;
var f_gst3 = parseInt(jArrFreq4[0]['freq']);






 var chart = new CanvasJS.Chart("chartContainer", {
 animationEnabled: true,
 title:{
 text: "Frequency of keywords in every section"
 },
 axisY: {
 title: "Keywords"
 },
 legend: {
 cursor:"pointer",
 itemclick : toggleDataSeries
 },
 toolTip: {
 shared: true,
 content: toolTipFormatter
 },
 data: [{
 type: "bar",
 showInLegend: true,
 name: "HDFC",
 color: "black",
 dataPoints: [
 { y: f_hdfc0, label: "Banking" },
 { y: f_hdfc1, label: "Business" },
 { y: f_hdfc2, label: "Finance" },
 { y: f_hdfc3, label: "Technology" },
 
 ]
 },
 {
 type: "bar",
 showInLegend: true,
 name: "Tesla",
 color: "blue",
 dataPoints: [
 { y: f_tesla0, label: "Banking" },
 { y: f_tesla1, label: "Business" },
 { y: f_tesla2, label: "Finance" },
 { y: f_tesla3, label: "Technology" },
 
 ]
 },
 {
 type: "bar",
 showInLegend: true,
 name: "Aviation",
 color: "#F08080",
 dataPoints: [
 { y: f_avaition0, label: "Banking" },
 { y: f_avaition1, label: "Business" },
 { y: f_avaition2, label: "Finance" },
 { y: f_avaition3, label: "Technology" },
 
 ]
 },
 {
 type: "bar",
 showInLegend: true,
 name: "GST",
 color: "grey",
 dataPoints: [
 { y: f_gst0, label: "Banking" },
 { y: f_gst1, label: "Business" },
 { y: f_gst2, label: "Finance" },
 { y: f_gst3, label: "Technology" },
 
 ]
 }]
 });
 chart.render();
 
 function toolTipFormatter(e) {
 var str = "";
 var total = 0 ;
 var str3;
 var str2 ;
 for (var i = 0; i < e.entries.length; i++){
 var str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>"+ e.entries[i].dataPoint.y + "</strong> <br/>" ;
 total = e.entries[i].dataPoint.y + total;
 str = str.concat(str1);
 }
 str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
 str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
 return (str2.concat(str)).concat(str3);
 }
 
 function toggleDataSeries(e) {
 if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
 e.dataSeries.visible = false;
 }
 else {
 e.dataSeries.visible = true;
 }
 chart.render();
 }
 
 

 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newsinsights";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1 = ("SELECT day FROM whenwasitfirstused WHERE keyword='HDFC'");
$sql2 = ("SELECT day FROM whenwasitfirstused WHERE keyword='Tesla'");
$sql3 = ("SELECT day FROM whenwasitfirstused WHERE keyword='Aviation'");
$sql4 = ("SELECT day FROM whenwasitfirstused WHERE keyword='GST'");


$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

$key1 = array();
$key2 = array();
$key3 = array();
$key4 = array();

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$key1[] = $row;
    }
} else {
    echo "0 results";
}

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
		$key2[] = $row;
    }
} else {
    echo "0 results";
}

if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
		$key3[] = $row;
    }
} else {
    echo "0 results";
}

if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
		$key4[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

?>

var jArrFreq1;

jArrFreq1 = <?php echo json_encode($key1);?>;
var f_hdfc = (jArrFreq1[0]['day']);



var jArrFreq2;
jArrFreq2 = <?php echo json_encode($key2);?>;
var f_tesla = (jArrFreq2[0]['day']);


var jArrFreq3;

jArrFreq3 = <?php echo json_encode($key3);?>;
var f_aviation= (jArrFreq3[0]['day']);


var jArrFreq4;
jArrFreq4 = <?php echo json_encode($key4);?>;
var f_gst = (jArrFreq4[0]['day']);

console.log(jArrFreq1);
console.log(jArrFreq2);
console.log(jArrFreq3);
console.log(jArrFreq4);

console.log(f_gst);
console.log(f_tesla);
console.log(f_hdfc);
console.log(f_aviation);


       
} 


</script>


<style>


</style>
</head>
<body>
<body data-spy="scroll" data-target="#navbar" data-offset="150">
 
<div class="content">
   <!-- notification message -->
   <?php if (isset($_SESSION['success'])) : ?>
 <div class="error success" >
   <h3>
 <?php 
   echo $_SESSION['success']; 
   unset($_SESSION['success']);
 ?>
   </h3>
 
   <?php endif ?>

 <!-- logged in user information -->
 <?php if (isset($_SESSION['username'])) : ?>
     <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
     <!--<p> <a href="Business.php?logout='1'" style="color: red;">logout</a> </p>-->
    
 <?php endif ?>
</div>
 <nav class="navbar navbar-dark bg-dark navbar-fixed-top" style="background-color:black; color:white" id="navbar">
        
 <a class="navbar-brand" href="#"><h style="color:black">g</h>Vision<h style="color:black">g</h></a>
 <ul class="nav navbar-nav">
 <li class="nav-item">
 <a class="nav-link" href="Banking.php">Banking<span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="Business.php">Business</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="Finance.php">Finance</a>
 </li>
            <li class="nav-item">
 <a class="nav-link" href="Technology.php">Technology</a>
 </li>
 </ul>
 <form class="form-inline pull-xs-right">
 <button class="btn btn-secondary" type="submit"><a href="home.php" style="color:black ;text-decoration:none">Logout</a></button>
 </form>
 </nav>

<div class="row" style="margin-top:100px">
    <div class="col-sm-10">
        <div id="chartContainer" style="height: 500px; width: 85%; margin-left:200px;"></div>
    </div>
    
</div>



</div>
</div>

</body>
</html>
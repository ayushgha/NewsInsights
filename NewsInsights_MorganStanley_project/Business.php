
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
$dbname = "newsinsights";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

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


$conn->close();
?>


var jArrFreq1;
jArrFreq1 = <?php echo json_encode($business1);?>;
var f_hdfc = parseInt(jArrFreq1[0]['freq']);

var jArrFreq2;
jArrFreq2 = <?php echo json_encode($business2);?>;
var f_tesla = parseInt(jArrFreq2[0]['freq']);

var jArrFreq3;
jArrFreq3 = <?php echo json_encode($business3);?>;
var f_avaition= parseInt(jArrFreq3[0]['freq']);

var jArrFreq4;
jArrFreq4 = <?php echo json_encode($business4);?>;
var f_gst = parseInt(jArrFreq4[0]['freq']);



var chart = new CanvasJS.Chart("chartContainer2", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Keyword Contribution"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}</strong>",
		indexLabel: "{name} - {y}",
		dataPoints: [
			{ y: f_hdfc, name: "HDFC", exploded: true },
			{ y: f_tesla, name: "Tesla" },
			{ y: f_avaition, name: "Aviation" },
			{ y: f_gst, name: "GST" },
			/*{ y: 7, name: "University" },
			{ y: 17, name: "Executive" },
			{ y: 22, name: "Other Local Assistance"}*/
		]
	}]
});
chart.render();


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

//$sql = "SELECT x.f FROM (SELECT day, SUM(freq) as f FROM business WHERE keyword='HDFC' GROUP BY day) x ORDER BY x.day";
$sql = ("SELECT SUM(frequency) as freq FROM business WHERE keywrd='HDFC' GROUP BY day ORDER BY day ");
// SELECT freq FROM (SELECT SUM(freq), day FROM business WHERE keyword='HDFC' GROUP BY day) x ORDER BY x.day
//$sql = ("SELECT f from (SUM(freq) as f FROM business WHERE keyword='HDFC' GROUP BY day) ORDER BY day ");

$result = $conn->query($sql);

$business = array();


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$business[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
var jArrFreq;
var len = <?php echo sizeof($business);?>;
//console.log(len);
jArrFreq = <?php echo json_encode($business);?>;
for(i=0; i<len; i++)
{
    console.log(parseInt(jArrFreq[i]['freq']));
}

var arr = new Array(len);
arr[0] ={ 'y': 1 };

for(var i=0; i<len; i++)
{
    arr[i]={y: parseInt(jArrFreq[i]['freq'])} ;
}
console.log(arr);


var lineChart1 = new CanvasJS.Chart("chartContainer3", {

	animationEnabled: true,
	theme: "light2",
	title:{
		text: "HDFC - variation"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",
		lineColor:"black",
      	lineThickness: 1,
		markerType: "circle",
		markerColor: "black",
		markerSize: 5,
			
		dataPoints:arr,
	}]
});
lineChart1.render();



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

$sql = "SELECT SUM(frequency) as freq FROM business WHERE keywrd='Tesla' GROUP BY day ORDER BY day";
$result = $conn->query($sql);

$business = array();


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$business[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
var jArrFreq;
var len = <?php echo sizeof($business);?>;
//console.log(len);
jArrFreq = <?php echo json_encode($business);?>;
for(i=0; i<len; i++)
{
    console.log(parseInt(jArrFreq[i]['freq']));
}

var arr = new Array(len);
arr[0] ={ 'y': 1 };

for(var i=0; i<len; i++)
{
    arr[i]={y: parseInt(jArrFreq[i]['freq'])} ;
}
console.log(arr);
var lineChart2 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Tesla - variation"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",
		lineColor:"black",
      	lineThickness: 1,
		markerType: "circle",
		markerColor: "black",
		markerSize: 5,
		dataPoints: arr,
	}]
});
lineChart2.render();


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

$sql = "SELECT SUM(frequency) as freq FROM business WHERE keywrd='Aviation' GROUP BY day ORDER BY day ";
$result = $conn->query($sql);

$business = array();


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$business[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
var jArrFreq;
var len = <?php echo sizeof($business);?>;
//console.log(len);
jArrFreq = <?php echo json_encode($business);?>;
for(i=0; i<len; i++)
{
    console.log(parseInt(jArrFreq[i]['freq']));
}

var arr = new Array(len);
arr[0] ={ 'y': 1 };

for(var i=0; i<len; i++)
{
    arr[i]={y: parseInt(jArrFreq[i]['freq'])} ;
}
console.log(arr);

var lineChart3 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Aviation - variation"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",
		lineColor:"black",
      	lineThickness: 1,
		markerType: "circle",
		markerColor: "black",
		markerSize: 5,
		dataPoints:arr,
	}]
});
lineChart3.render();



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

$sql = "SELECT SUM(frequency) as freq FROM business WHERE keywrd='GST' GROUP BY day ORDER BY day";
$result = $conn->query($sql);

$business = array();


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$business[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
var jArrFreq;
var len = <?php echo sizeof($business);?>;
//console.log(len);
jArrFreq = <?php echo json_encode($business);?>;
for(i=0; i<len; i++)
{
    console.log(parseInt(jArrFreq[i]['freq']));
}

var arr = new Array(len);
arr[0] ={ 'y': 1 };

for(var i=0; i<len; i++)
{
    arr[i]={y: parseInt(jArrFreq[i]['freq'])} ;
}
console.log(arr);

var lineChart4 = new CanvasJS.Chart("chartContainer6", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "GST - variation"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",
		lineColor:"black",
      	lineThickness: 1,
		markerType: "circle",
		markerColor: "black",
		markerSize: 5,
		dataPoints:arr,
	}]
});
lineChart4.render();

}

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

</script>
      
    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      
      <style>
			#chartContainer1{<!--barchart-->
				margin-top:100px;
				align:right;
				height:350px;
				width:40%;
			}
			#chartContainer2{
				margin-top:100px;
				align:right;
				height:450px;
				width:450px;
			}
			#chartContainer3{
				margin-top:10px;
				margin-left:40px;
				
			}
			#chartContainer4{
				margin-top:10px;
				margin-left:40px;
				
			}
			#chartContainer5{
				margin-top:10px;
				margin-left:40px;
				
			}
			#chartContainer6{
				margin-top:10px;
				margin-left:40px;
				
			}
			.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: black;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
	margin-top:55px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 15px;
    color: white;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
				
			
      .nav.navbar-nav.navbar-right a {
    color: white;
}
          .jumbotron {
              
              background-image: url('calculator-scientific.jpeg');
              text-align: center;
              margin-top: 50px;
          }
          
          #email {
              
              width: 300px;
              
          }
          
          #appSummary {
              
              text-align: center;
              margin-top:50px;
              margin-bottom: 50px;
              
          }
          
          .card-img-top {
              
              width: 100%;
              
          }
          
          #appStoreIcon {
		  
		  
              height: 1px
              width: 1px;
              
          }
          
          #footer {
              
              background-color: black;
              padding-top: 150px;
              margin-top: 50px;
              text-align: center;
              padding-bottom: 150px;
			  font-size:10px;
			  color:white;
          }
          
          body {
              font-family: 'Catamaran';
              position: relative;
              
          }
      
      </style>
      
  </head>
    
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
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<!--<p> <a href="Business.php?logout='1'" style="color: red;">logout</a> </p>-->
	
    <?php endif ?>
</div>
        <nav class="navbar navbar-dark bg-dark navbar-fixed-top" style="background-color:black; color:white" id="navbar">
		
		<a class="navbar-brand" href="#"><h style="color:black">g</h>Vision<h style="color:black">g</h></a>
          <ul class="nav navbar-nav">
			<li class="nav-item">
				<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="Business.php">Business</a>
  <a href="Banking.php">Banking</a>
  <a href="Finance.php">Finance</a>
  <a href="Technology.php">Technology</a>
</div>
<!--<h2>Animated Sidenav Example</h2>
<p></p>-->


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#HDFC">HDFC<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#Tesla">Tesla</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#Aviation">Aviation</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="#gst">GST</a>
            </li>
          </ul>
          <form class="form-inline pull-xs-right">
            <button class="btn btn-secondary" type="submit"><a href="home.php" style="color:black ;text-decoration:none">Logout</a></button>
          </form>
        </nav>

		
	<div class="container" align="center">
		<div class="row">
			<div class="col-sm-12">
				<div id="chartContainer2" ></div>
				<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
				pie
			</div>
			<!--<div class="col-sm-6">
				<div id="chartContainer1" style="height: 370px; width: 40%;"></div>
				<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
				bar
			</div>-->
		</div>
	</div>
	
	
	<br id="HDFC">
	<br>
	<br>
	<div class="container">
		<div class="card text-white bg-dark mb-3" >
  <div class="card-header "style="background-color:black;color:white">
    HDFC
  </div>
  <div class="card-body">
	<div class="row" >
	<div id="chartContainer3" style="height: 370px; width: 95%;"></div></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</div>
</div>
</div>

	<br>
	<br>
	<br>
	<div class="container"id="Tesla">
		<div class="card text-white bg-dark mb-3" >
		<div class="card-header "style="background-color:black;color:white">
    Tesla
  </div>
  <div class="card-body">
	<div class="row" >	 
	<div id="chartContainer4" style="height: 370px; width: 95%;"></div></div>
	
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
</div>
</div>
	<br>
	<br>
	<br>
	<div class="container"id="Aviation">
		<div class="card text-white bg-dark mb-3" >
		<div class="card-header "style="background-color:black;color:white">
    Aviation
  </div>
  <div class="card-body">
	<div class="row" >
	<div id="chartContainer5" style="height: 370px; width: 95%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
</div>
</div>
</div>
	<br>
	<br>
	<br>
	<div class="container"id="gst">
		<div class="card text-white bg-dark mb-3" >
		<div class="card-header "style="background-color:black;color:white">
    GST
  </div>
	<div class="card-body">
	<div class="row" >
	<div id="chartContainer6" style="height: 370px; width: 95%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
</div>
</div>
</div>
	

      <div id="footer">
      
        <div class="row">
          
                <h2 color="white">Find us on social media!</h2>
            
            <p >And get know more about us</p>
            
            <p ><a href=""><img style="width:50px;height:50px;" src="fbbnw.png"></a>
			   |      <a href=""><img style="width:50px;height:50px;" src="twitterbnw.png"></a>
			   |      <a href=""><img style="width:50px;height:50px;" src="instabnw.png"></a>
			
			</p>
            
            
          
          </div>
      
      </div>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
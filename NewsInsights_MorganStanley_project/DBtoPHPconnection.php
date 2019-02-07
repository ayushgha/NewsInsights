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

$sql = "SELECT freq FROM business";
$result = $conn->query($sql);

$business = array();
/*
$banking = array();
$finance = array();
$technology = array();*/

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$business[] = $row;
    }
} else {
    echo "0 results";
}
/*
$sql = "SELECT keywrd,day,frequency FROM banking";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$banking[] = $row;
    }
} else {
    echo "0 results";
}


$sql = "SELECT keywrd,day,frequency FROM finance";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$finance[] = $row;
    }
} else {
    echo "0 results";
}



$sql = "SELECT keywrd,day,frequency FROM technology";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$technology[] = $row;
    }
} else {
    echo "0 results";
}
*/
//print_r($business);
echo "-------------------------";


/*
print_r($banking);
echo "-------------------------";
print_r($finance);
echo "-------------------------";
print_r($technology);
echo "-------------------------";
*/
$conn->close();
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>

window.onload = function () {

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
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Simple Line Chart"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",  
        dataPoints: arr,     
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 400px; width: 100%; margin-top:100px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css" >
<?php
		include 'navbar.php';
        echo "<br>";
       
	 ?>

<?php
$dataPoints = array( 
	array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 1842.55, "label" => "China" ),
	array("y" => 1828.55, "label" => "Russia" ),
	array("y" => 1039.99, "label" => "Switzerland" ),
	array("y" => 765.215, "label" => "Japan" ),
	array("y" => 612.453, "label" => "Netherlands" )
);
 
$test=array();
$count=0;

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chart");
$res=mysqli_query($link,"select * from graphe");
while($row=mysqli_fetch_array($res)){
    $test[$count] ["label"]=$row["label"];
    $test[$count] ["y"]=$row["amount"];
    $count=$count+1;
}






?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "statistique de genre "
	},
	axisY: {
		title: "statistique de genre en (personne)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## personne",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                           
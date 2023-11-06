<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css" >
<?php
		include 'navbar.php';
        echo "<br>";
       
	 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title> graphes </title>
		<meta name="generator" content="Bootply"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css.css">
    </head>
        <body style="background-color:white">

<?php require 'connect.php'; ?><hr>
<h3 class="text-center">La présentation graphique de nombre de consultations selon le genre : </h3>
<div>
  <canvas id="myChart"></canvas>
</div>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
<?php
 $q = " SELECT sex, COUNT(*) as nombreF 
        FROM passion 
        WHERE sex = 'femme'";
$result = $pdo->query($q);
$row = $result->fetch(PDO::FETCH_ASSOC);
$nombref = $row['nombreF'];

$sql = " SELECT sex, COUNT(*) as nombreH 
        FROM passion 
        WHERE sex = 'homme'";
$resultat = $pdo->query($sql);
$row = $resultat->fetch(PDO::FETCH_ASSOC);
$nombreh = $row['nombreH'];
?>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    animationEnabled: true,
	theme: "rgb(220,220,220)",
    type: 'bar',
    data: {
      labels: ['femme', 'homme'],
      datasets: [{
        label: 'nb de consultations selon le genre',
        data: [<?php echo $nombref; ?>, <?php echo $nombreh; ?>],
          backgroundColor: ["rgba(220, 20, 60)", "	rgb(65,105,225)"],
              borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
        </body>
</html>
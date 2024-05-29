<!DOCTYPE html>
<html>
	<head>
		<title>Web Programming</title>
	</head>
	<body>
    <?php 
    // calling db connection file
    include_once('../db_connect.php');

    // sql data book join category
    $sql = "SELECT continent, COUNT(name) AS country_count
            FROM country 
            GROUP BY continent
            ORDER BY continent";

    // query data
    $result_table = mysqli_query($conn, $sql);
    $result_chart = mysqli_query($conn, $sql);
?>




		<table border="1">
			<thead>
				<tr>
					<th>total country</th>
					<th>continent</th>
				</tr>
			</thead>
			<tbody>
			<!-- data output from query -->
			<?php while($row = $result_table->fetch_assoc()):?>
				<tr>
					<td><?php echo $row["country_count"];?></td>
					<td><?php echo $row["continent"];?></td>
				</tr>
        	<?php endwhile;?>
			</tbody>
		</table>

		<!-- chart container -->
		<div id="container"></div>
		
		<!-- import highchart javascript file -->
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>
		<script>
			Highcharts.chart('container', {
				chart: {
					type: 'pie'
				},
				title: {
					text: 'Book Comparison',
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.y} Item ({point.percentage:.1f}%)</b>'
				},
				accessibility: {
					point: {
						valueSuffix: '%'
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: [{
					name: 'Book',
					colorByPoint: true,
					data: [
						
						<?php while($row = $result_chart->fetch_assoc()):?>
						{
							name: '<?php echo $row["continent"]?>',
							y: <?php echo $row["country_count"]?>
						},
						<?php endwhile?>
					]
				}]
			});
		</script>
	</body>
</html>
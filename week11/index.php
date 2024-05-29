<!DOCTYPE html>
<html>
<head>
    <title>Web Programming</title>
</head>
<body>
    <?php 
    // calling db connection file
    include_once('../db_connect.php');

    // sql data to get total population per continent
    $sql = "SELECT country.continent AS continent_name, SUM(city.population) AS total_population
            FROM city 
            JOIN country ON city.country_id = country.id
            GROUP BY country.continent
            ORDER BY total_population DESC";

    // query data
    $result_table = mysqli_query($conn, $sql);
    $result_chart = mysqli_query($conn, $sql);
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Total Population</th>
                <th>Continent</th>
            </tr>
        </thead>
        <tbody>
        <!-- data output from query -->
        <?php while($row = $result_table->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["total_population"]; ?></td>
                <td><?php echo $row["continent_name"]; ?></td>
            </tr>
        <?php endwhile; ?>
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

        const chartData = [
            <?php while($row = $result_chart->fetch_assoc()): ?>
            {
                name: '<?php echo $row["continent_name"]; ?>',
                y: <?php echo $row["total_population"]; ?>
            },
            <?php endwhile; ?>
        ];

        Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total Population by Continent'
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Continent'
                }
            },
            yAxis: {
                title: {
                    text: 'Total Population'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },
            series: [{
                name: 'Population',
                colorByPoint: true,
                data: chartData
            }]
        });
    </script>
</body>
</html>

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
        // Prepare data for the chart from PHP
        const chartData = [
            <?php while($row = $result_chart->fetch_assoc()): ?>
            {
                name: '<?php echo $row["continent_name"]; ?>',
                y: <?php echo $row["total_population"]; ?>
            },
            <?php endwhile; ?>
        ];

        // Prepare series data for the scatter chart
        const seriesData = chartData.map(data => ({
            name: data.name,
            data: [data.y, Math.random() * 100]  // Adjust this to actual scatter plot logic
        }));

        Highcharts.chart('container', {
            chart: {
                type: 'scatter',
                zoomType: 'xy'
            },
            title: {
                text: 'Total Population by Continent (Scatter Chart)'
            },
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Continent'
                },
                categories: chartData.map(data => data.name),
                startOnTick: true,
                endOnTick: true,
                showLastLabel: true
            },
            yAxis: {
                title: {
                    text: 'Total Population'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                backgroundColor: Highcharts.defaultOptions.chart.backgroundColor,
                borderWidth: 1
            },
            plotOptions: {
                scatter: {
                    marker: {
                        radius: 5,
                        states: {
                            hover: {
                                enabled: true,
                                lineColor: 'rgb(100,100,100)'
                            }
                        }
                    },
                    states: {
                        hover: {
                            marker: {
                                enabled: false
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<b>{series.name}</b><br>',
                        pointFormat: 'Total Population: {point.y}'
                    }
                }
            },
            series: seriesData
        });
    </script>
</body>
</html>

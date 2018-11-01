
<h1><?=$title?></h1>

<div class="nre-container" >
    <canvas id="LineChartProduction" width="800" height="500"></canvas>
    <script>
        var ctx = document.getElementById("LineChartProduction");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["10h", "11h", "12h", "13h", "14h", "15h"],
                datasets: [{
                    label: 'Production [kWh]',
                    data: [12, 19, 3, 5, 2, 50],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1,
                    hoverBackgroundColor:[
                        'rgba(255,99,132,1)'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

    <?php View::render('energy-switch-buttons'); ?>

</div>
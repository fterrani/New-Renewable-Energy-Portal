<h1><?=$title?></h1>

<div class="container" >
    <canvas id="LineChartProduction" class="p-3" style="width:500px; height:300px;"></canvas>
    <script>
        var ctx = document.getElementById("LineChartProduction");
        var prodYearsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["", "", "", "", "", ""],
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

    <canvas id="LineChartPower" class="p-3" style="width:500px; height:300px;"></canvas>
    <script>
        var ctx = document.getElementById("LineChartPower");
        var energyBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Aeolian", "Biogas", "Hydraulic River", "Hydraulic Accu", "PV", "Thermal", "Nuclear"],
                datasets: [{
                    label: 'New renewables energy',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 1,
                    hoverBackgroundColor:[
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false
            }
        });
    </script>

    <button class="nre-btn-stats">Login for Windmachine details</button>

    <canvas id="PieChart" class="p-3" style="width:300px; height:300px; margin-top: 30px"></canvas>
    <script>
        var ctx = document.getElementById("PieChart");
        var energyPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Aeolian", "Biogas", "Hydraulic River", "Hydraulic Accu", "PV", "Thermal", "Nuclear"],
                datasets: [{
                    label: 'New renewables energy',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 1,
                    hoverBackgroundColor:[
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false
            }
        });

        $(document).ready(function()
        {
            $.ajax({
                type: "POST",
                url: "<?=__BASE_URL__.'/ajaxstats'?>",
                data: {},
                success: function (response)
                {
                    var prodYearData = response.prodYears;

                    var prodLabels = [];
                    var prodNumbers = [];

                    prodYearData.forEach(function( r )
                    {
                        prodLabels.push( r.IdConsumption );
                        prodNumbers.push( r.Sum );
                    });

                    prodYearsChart.data.labels = prodLabels;
                    prodYearsChart.data.datasets[0].data = prodNumbers;
                    prodYearsChart.update();


                    var pieData = response.pie;
                    var energiesChart = [energyBarChart, energyPieChart];

                    energiesChart.forEach(function(c)
                    {
                        c.data.datasets[0].data = [pieData.Aeolian, pieData.Biogas, pieData.Hydraulic_River, pieData.Hydraulic_Accu, pieData.PV, pieData.Thermal, pieData.Nuclear];
                        c.update();
                    });
                },
                dataType: "json"
            });
        });

    </script>

    <button class="nre-btn-stats">NRE details</button>
</div>
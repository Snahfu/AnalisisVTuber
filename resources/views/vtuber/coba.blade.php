<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle Graph Widget</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="pie-chart"></canvas>
</body>
<script>
    var data = [{
        data: [50, 55, 60, 33],
        labels: ["India", "China", "US", "Canada"],
        backgroundColor: [
            "#4b77a9",
            "#5f255f",
            "#d21243",
            "#B27200"
        ],
        borderColor: "#fff"
    }];

    var options = {
        tooltips: {
            enabled: false
        },
        plugins: {
            datalabels: {
                formatter: (value, ctx) => {

                    let sum = 0;
                    let dataArr = ctx.chart.data.datasets[0].data;
                    dataArr.map(data => {
                        sum += data;
                    });
                    let percentage = (value * 100 / sum).toFixed(2) + "%";
                    return percentage;


                },
                color: '#fff',
            }
        }
    };


    var ctx = document.getElementById("pie-chart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: data
        },
        options: options
    });
</script>

</html>

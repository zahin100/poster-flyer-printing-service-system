<script type="text/javascript">
    var ctx = document.getElementById('YearlyBarChart').getContext('2d');
        var YearlyBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($year);?>,
            datasets: [{
                backgroundColor:[
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 164, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 164, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)'
                ],
                borderColor:[
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 164, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 164, 235, 1)'
                ],
                data: <?php echo json_encode($sales);?>,
                borderWidth: 1
            }]
        },
        options: {
            legend:{
                display: true,
                position: 'bottom',
                labels:{
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
            }
        });
</script>
<x-app-layout>
    <div style="text-align: center; margin-top: 20px;">
        <p>Dashboard</p>
    </div>
    <div class="container">
        <div style="max-width: 600px; margin: auto;">
            <canvas id="appointmentChart"></canvas>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('appointmentChart').getContext('2d');
        var appointmentCounts = @json($appointmentCounts);

        var labels = [];
        var data = [];
        var backgroundColors = []; 
        for (var departmentName in appointmentCounts) {
            labels.push(departmentName);
            data.push(appointmentCounts[departmentName]);

            backgroundColors.push('rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', 0.2)');
        }

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "Total Appointments last month",
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <div style="text-align: center; margin-top: 20px;">
        <p>Total Appointments: {{ $totalAppointments }}</p>
    </div>

    <div>
        <a href="{{route('home')}}" class="btn btn-primary mt-5">Website</a>
    </div>
</x-app-layout>

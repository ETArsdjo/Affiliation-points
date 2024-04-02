@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h2>User Registration</h2>
        </div>
        <div class="card-body">
            <div class="chart-wrapper">
                <canvas id="mixed-chart-1"></canvas>
            </div>
        </div>
    </div>

    <script>
        var userChartCanvas = document.getElementById("mixed-chart-1").getContext("2d");
        var userChart = new Chart(userChartCanvas, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!}, // Ensure $labels is an array
                datasets: [{
                    label: 'Number of Users Registered',
                    data: {!! json_encode($data) !!}, // Ensure $data is an array
                    backgroundColor: "#9e6de0",
                    borderColor: 'rgba( 158, 109, 224, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Users'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }

                }
            }
        });
    </script>

@endsection

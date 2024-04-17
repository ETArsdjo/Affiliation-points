@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')
@section('content')

        <div class="col-md-5">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Gender Distribution</h2>
                <div class="card-body">
                    <div class="chart-wrapper">
                        <canvas id="genderChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


    <script>
        // Data for the chart
        var data = {
            labels: ['Male', 'Female'],
            datasets: [{
                data: [{{ $malePercentage }}, {{ $femalePercentage }}],
                backgroundColor: ['#36a2eb', '#ff6384']
            }]
        };

        // Configuration options
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 15
                }
            }
        };

        // Get the context of the canvas element we want to select
        var ctx = document.getElementById('genderChart').getContext('2d');

        // Create the chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    </script>

@endsection

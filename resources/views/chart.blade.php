@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h2>Category Sales</h2>
        </div>
        <div class="card-body">
            <div class="chart-wrapper">
                <canvas id="category-sales-chart"></canvas>
            </div>
        </div>
    </div>

    <script>
        var categorySalesCanvas = document.getElementById("category-sales-chart").getContext("2d");
        var categorySalesChart = new Chart(categorySalesCanvas, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels2) !!}, // Ensure $labels is an array
                datasets: [{
                    label: 'Number of Sales',
                    data: {!! json_encode($data2) !!}, // Ensure $data is an array
                    backgroundColor: "#faafca",
                    borderColor: 'rgba(158, 109, 224, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Sales'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Category'
                        }
                    }
                }
            }
        });
    </script>


@endsection

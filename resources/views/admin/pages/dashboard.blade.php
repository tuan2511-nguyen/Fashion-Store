@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-primary">
                                    <i class="material-icons-outlined">paid</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Today's Sales</span>
                                    <span class="widget-stats-amount">${{ number_format($totalSales, 2) }}</span>
                                    <span class="widget-stats-info">{{ $totalOrders }} Orders Total</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                                    <i class="material-icons">keyboard_arrow_down</i>
                                    {{ number_format($salesChangePercent, 2) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-warning">
                                    <i class="material-icons-outlined">person</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Active Users</span>
                                    <span class="widget-stats-amount">{{ number_format($totalUsers) }}</span>
                                    <span class="widget-stats-info">{{ $newUsersThisMonth }} new this month</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                    {{ number_format($usersChangePercent, 2) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-danger">
                                    <i class="material-icons-outlined">attach_money</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Total Profit</span>
                                    <span class="widget-stats-amount">${{ number_format($totalProfit, 2) }}</span>
                                    <span class="widget-stats-info">{{ number_format($profitChangePercent, 2) }}%
                                        change</span>
                                </div>
                                <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                    {{ number_format($profitChangePercent, 2) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Orders Per Month</h4>
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Amount Per Month</h4>
                            <canvas id="amountChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Orders Chart
        var ctx = document.getElementById('ordersChart').getContext('2d');
        var ordersChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Number of Orders',
                    data: @json($ordersPerMonth),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Amount Chart
        var ctx = document.getElementById('amountChart').getContext('2d');
        var amountChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Total Amount',
                    data: @json($amountsPerMonth),
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

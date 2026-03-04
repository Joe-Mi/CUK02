<x-admin>
    <div class="admin-container">
        <div class="admin-header">
            <h2>{{ $event->title }}</h2>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="content-section">
            <h3>Key Dates</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Key Date</th>
                            <th>Open</th>
                            <th>Close</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keyDates as $date)
                        <tr>
                            <td>{{ $date->title }}</td>
                            <td>{{ $date->start_date }}</td>
                            <td>{{ $date->end_date }}</td>
                            <td>
                                <span class="badge {{ $date->status == 'Active' ? 'badge-success' : 'badge-secondary' }}">
                                    {{ ucfirst($date->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="charts-grid">
            {{-- Line Chart --}}
            <div class="chart-container">
                <h3>Ticket Sales Over Time</h3>
                <canvas id="salesChart"></canvas>
            </div>

            {{-- Pie Chart --}}
            <div class="chart-container">
                <h3>Capacity vs Tickets Sold</h3>
                <canvas id="capacityChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const salesLabels = @json($salesDates);
        const salesData = @json($salesCounts);

        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: salesLabels,
                datasets: [{
                    label: 'Tickets Sold',
                    data: salesData,
                    tension: 0.3,
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        const capacityData = @json([$ticketsSold, $remainingCapacity]);

        new Chart(document.getElementById('capacityChart'), {
            type: 'pie',
            data: {
                labels: ['Sold', 'Remaining'],
                datasets: [{
                    data: capacityData,
                    backgroundColor: ['#28a745', '#e9ecef']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
</x-admin>
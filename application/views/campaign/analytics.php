<!DOCTYPE html>
<html>
<head>
    <title>Email Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Email Analytics Dashboard</h1>

    <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        <div style="width: 48%;">
            <h2>Opens</h2>
            <canvas id="openChart" width="200" height="200"></canvas>
        </div>
        <div style="width: 48%;">
            <h2>Clicks</h2>
            <canvas id="clickChart" width="200" height="200"></canvas>
        </div>
        <div style="width: 48%;">
            <h2>Bounces</h2>
            <canvas id="bounceChart" width="200" height="200"></canvas>
        </div>
        <div style="width: 48%;">
            <h2>Unsubscribes</h2>
            <canvas id="unsubscribeChart" width="200" height="200"></canvas>
        </div>
    </div>

    <script>
        // Retrieve data for different metrics from PHP data
        var opensData = <?= json_encode(array_column($campaigns, 'open_count')) ?>;
        var clicksData = <?= json_encode(array_column($campaigns, 'click_count')) ?>;
        var bouncesData = <?= json_encode(array_column($campaigns, 'bounce_count')) ?>;
        var unsubscribesData = <?= json_encode(array_column($campaigns, 'unsubscribe_count')) ?>;
        var campaignNames = <?= json_encode(array_column($campaigns, 'subject')) ?>;
        
        // Create pie chart for Opens
        var openChart = new Chart(document.getElementById('openChart'), {
            type: 'pie',
            data: {
                labels: campaignNames,
                datasets: [{
                    data: opensData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        // Add more colors if needed
                    ],
                }],
            },
        });

        // Create pie chart for Clicks
        var clickChart = new Chart(document.getElementById('clickChart'), {
            type: 'doughnut', // Use 'doughnut' for a different style
            data: {
                labels: campaignNames,
                datasets: [{
                    data: clicksData,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        // Add more colors if needed
                    ],
                }],
            },
        });

        // Create pie chart for Bounces
        var bounceChart = new Chart(document.getElementById('bounceChart'), {
            type: 'polarArea', // Use 'polarArea' for a different style
            data: {
                labels: campaignNames,
                datasets: [{
                    data: bouncesData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        // Add more colors if needed
                    ],
                }],
            },
        });

        // Create pie chart for Unsubscribes
        var unsubscribeChart = new Chart(document.getElementById('unsubscribeChart'), {
            type: 'radar', // Use 'radar' for a different style
            data: {
                labels: campaignNames,
                datasets: [{
                    data: unsubscribesData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        // Add more colors if needed
                    ],
                }],
            },
        });
    </script>
</body>
</html>

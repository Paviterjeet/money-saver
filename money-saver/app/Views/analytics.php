<?= $this->include('header') ?>

<div class="container mt-5" >

    <!-- Page Title -->
    <div class="text-center mb-4" >
        <h1 class="display-5 fw-bold text-primary animate__animated animate__fadeInDown">📊 Monthly Analytics</h1>
        <p class="text-muted">Track your savings growth over the month</p>
    </div>

    <!-- Monthly Total Card -->
    <div class="row mb-4">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-sm border-0 rounded-4 p-4 text-center animate__animated animate__zoomIn" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color:white;">
                <h2 class="fw-bold">This Month Total</h2>
                <p class="display-6 mt-2">₹<?= number_format($monthlyTotal, 2) ?></p>
            </div>
        </div>
    </div>

    <hr>

    <!-- Daily Breakdown Cards -->
    <h2 class="mb-3 text-secondary">Daily Breakdown</h2>

    <?php if (!empty($dailySavings)): ?>
    <div class="row g-3 mb-4">
        <?php foreach ($dailySavings as $row): ?>
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 p-3 h-100 hover-card">
                    <h5 class="fw-semibold"><?= date('d M', strtotime($row['day'])) ?></h5>
                    <p class="fs-5 text-success fw-bold">₹<?= number_format($row['total'], 2) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <p class="text-muted">No savings this month</p>
    <?php endif; ?>

    <!-- Chart Section -->
    <div class="card shadow-sm border-0 rounded-4 p-4 mb-4 animate__animated animate__fadeInUp">
        <h3 class="fw-semibold mb-3 text-secondary">📈 Daily Savings Chart</h3>
        <canvas id="monthlyChart" height="120"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?= json_encode(array_map(fn($d) => date('d M', strtotime($d['day'])), $dailySavings)) ?>;
        const data   = <?= json_encode(array_column($dailySavings, 'total')) ?>;

        new Chart(document.getElementById('monthlyChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Daily Savings ₹',
                    data: data,
                    backgroundColor: 'rgba(37, 117, 252, 0.7)',
                    borderColor: 'rgba(37, 117, 252, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { mode: 'index', intersect: false }
                },
                scales: {
                    y: { beginAtZero: true }
                },
                animation: { duration: 1000, easing: 'easeOutQuart' }
            }
        });
    </script>

    <!-- Month Comparison Cards -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0 rounded-3 p-4 text-center hover-card" style="background-color: #fceabb;">
                <h5 class="fw-semibold">This Month</h5>
                <p class="fs-4 fw-bold text-success">₹<?= number_format($thisMonth,2) ?></p>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0 rounded-3 p-4 text-center hover-card" style="background-color: #f8b500;">
                <h5 class="fw-semibold">Last Month</h5>
                <p class="fs-4 fw-bold text-white">₹<?= number_format($lastMonth,2) ?></p>
            </div>
        </div>
    </div>

    <!-- Yearly Overview -->
    <div class="card shadow-sm border-0 rounded-4 p-4 mb-5 animate__animated animate__fadeIn">
        <h3 class="fw-semibold mb-3 text-secondary">🧠 Yearly Overview</h3>
        <div class="row g-3">
            <?php foreach($yearly as $y): ?>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card p-3 text-center hover-card shadow-sm border-0 rounded-3">
                    <strong><?= date('M', mktime(0,0,0,$y['month'],1)) ?></strong>
                    <p class="mb-0 text-success fw-bold">₹<?= number_format($y['total'],2) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<!-- Custom hover animations -->
<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

/* Animate.css integration for fadeIn effects */
@import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
</style>

<?= $this->include('footer') ?>

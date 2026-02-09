<?= $this->include('header') ?>

<!-- Hero Section -->
<!-- Savings Top Section -->
<div class="savings-top position-relative py-5" style="background: linear-gradient(rgb(51 7 151), rgb(187 160 249));overflow: hidden;border-radius: 0px 0px 50px 50px;margin: 0px 50px;">
    
    <!-- Floating Coins Animation -->
    <div class="coin-container">
        <span class="coin">💰</span>
        <span class="coin">💸</span>
        <span class="coin">🪙</span>
        <span class="coin">💰</span>
        <span class="coin">💸</span>
    </div>

    <!-- Main Content -->
    <div class="container text-center text-white position-relative" style="z-index: 10;">
        <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">My Savings</h1>
        <p class="fs-5 mt-2 animate__animated animate__fadeInUp">Track and grow your savings every day</p>

        <!-- Highlight Total Savings Card -->
        <div class="card shadow-lg rounded-4 p-4 mt-4 mx-auto animate__animated animate__zoomIn hover-3d" style="max-width: 350px; background: linear-gradient(135deg, #ffd200 0%, #f7971e 100%); color: #fff;">
            <h4>Total Savings</h4>
            <p class="display-5 fw-bold">₹<?= number_format($total, 2) ?></p>
        </div>
    </div>
</div>

<!-- Floating Coin Animation Styles -->
<style>
.savings-top {
    perspective: 1000px;
    position: relative;
}

.coin-container {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
}

.coin {
    position: absolute;
    font-size: 2rem;
    animation: floatCoins 6s linear infinite;
}

.coin:nth-child(1) { left: 10%; animation-delay: 0s; }
.coin:nth-child(2) { left: 30%; animation-delay: 1s; }
.coin:nth-child(3) { left: 50%; animation-delay: 2s; }
.coin:nth-child(4) { left: 70%; animation-delay: 3s; }
.coin:nth-child(5) { left: 90%; animation-delay: 4s; }

@keyframes floatCoins {
    0% { transform: translateY(100%) rotate(0deg); opacity: 0; }
    10% { opacity: 1; }
    50% { transform: translateY(-50%) rotate(180deg); }
    100% { transform: translateY(-120%) rotate(360deg); opacity: 0; }
}

/* Hover 3D effect for card */
.hover-3d {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    transform-style: preserve-3d;
}
.hover-3d:hover {
    transform: rotateX(5deg) rotateY(5deg) translateY(-5px);
    box-shadow: 0 20px 30px rgba(0,0,0,0.3);
}

</style>


<!-- Main Content -->
<div class="container mt-5">

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success animate__animated animate__fadeIn" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('milestone')): ?>
    <!-- Milestone Celebration Container -->
    <div id="milestone-celebration" class="position-fixed top-0 start-50 translate-middle-x w-100 h-100 d-flex align-items-center justify-content-center" style="z-index: 9999; pointer-events: none;">
        <div class="alert alert-warning text-center animate__animated animate__zoomIn rounded-4 shadow-lg p-4" style="font-size:1.5rem;">
            🎉 <?= session()->getFlashdata('milestone') ?> 🎉
            <audio autoplay>
                <source src="<?= base_url('sounds/achievement.mp3') ?>" type="audio/mpeg">
            </audio>
        </div>
    </div>

    <!-- Confetti JS -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        // Trigger confetti for 5 seconds
        const duration = 5 * 1000;
        const end = Date.now() + duration;

        (function frame() {
            confetti({
                particleCount: 5,
                angle: 60,
                spread: 55,
                origin: { x: 0 }
            });
            confetti({
                particleCount: 5,
                angle: 120,
                spread: 55,
                origin: { x: 1 }
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        })();

        // Remove the alert after 7 seconds
        setTimeout(() => {
            const celebration = document.getElementById('milestone-celebration');
            celebration.classList.add('animate__fadeOut');
            setTimeout(() => celebration.remove(), 1000);
        }, 7000);
    </script>

    <!-- Optional Styles for extra sparkle -->
    <style>
        #milestone-celebration .alert {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            color: #fff;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        }
    </style>
<?php endif; ?>


    <!-- Savings Input Card -->
    <div class="card shadow-lg rounded-4 p-4 mb-4 hover-3d">
        <form method="post" action="/savings/add" class="d-flex flex-column flex-md-row gap-3 align-items-center">
            <input
                type="number"
                name="amount"
                step="0.01"
                placeholder="Enter today’s saving"
                required
                class="form-control form-control-lg"
            >
            <button type="submit" class="btn btn-primary btn-lg shadow-sm">Add Saving 💰</button>
        </form>
    </div>

    <!-- Total Savings & Milestone Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4 p-4 text-center hover-3d" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color:white;">
                <h4>Total Savings</h4>
                <p class="display-5 fw-bold">₹<?= number_format($total, 2) ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4 p-4 text-center hover-3d" style="background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);">
                <h4>Next Milestone</h4>
                <p class="display-5 fw-bold">₹<?= $nextMilestone ?></p>
            </div>
        </div>
    </div>

    <!-- Animated Progress Bar -->
    <div class="card shadow-lg rounded-4 p-4 mb-5">
        <h5 class="fw-semibold mb-3">Progress towards next milestone</h5>
        <div class="progress rounded-4" style="height: 30px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100">
                <?= $progress ?>%
            </div>
        </div>
    </div>

    <!-- Recent Savings -->
    <h3 class="mb-3 text-secondary">Recent Savings</h3>
    <?php if (empty($history)): ?>
        <p class="text-muted fs-5">No savings yet. Start today 💰</p>
    <?php else: ?>
        <div class="row g-3">
            <?php foreach ($history as $row): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm rounded-3 p-3 hover-3d text-center">
                        <p class="fs-5 fw-bold text-success">₹<?= number_format($row['amount'], 2) ?></p>
                        <small class="text-muted"><?= date('d M Y', strtotime($row['created_at'])) ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<!-- Custom 3D Hover & Animations -->
<style>
.hero-section h1, .hero-section p {
    transition: transform 0.5s ease, text-shadow 0.5s ease;
}
.hover-3d {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    transform-style: preserve-3d;
}
.hover-3d:hover {
    transform: rotateX(5deg) rotateY(5deg) translateY(-5px);
    box-shadow: 0 20px 30px rgba(0,0,0,0.3);
}

/* Animate.css integration */
@import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
</style>

<?= $this->include('footer') ?>

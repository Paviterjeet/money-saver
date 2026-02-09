<?= $this->include('header') ?>

<!-- Hero Section -->
<div class="hero-section d-flex align-items-center justify-content-center text-center text-white" style="
    background: linear-gradient(rgb(51 7 151), rgb(187 160 249));
    background-size: cover;
    height: 60vh;
">
    <div class="hero-content animate__animated animate__fadeInDown">
        <h1 class="display-4 fw-bold">Welcome to Money Saver 💰</h1>
        <p class="fs-5 mt-3">Your saving journey starts today</p>
        <a href="<?= base_url('savings/add') ?>" class="btn btn-lg btn-primary mt-3 shadow-lg">Add Your First Savings</a>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-5">

    <div class="row g-4">

        <!-- User Session Info Card -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 p-4 text-center hover-3d">
                <h4 class="fw-semibold text-primary">Your Session Info</h4>
                <p class="text-muted mt-2">User Session ID:</p>
                <p class="fs-5 fw-bold"><?= session('user_id') ?></p>
            </div>
        </div>

        <!-- Total Savings Card -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 p-4 text-center hover-3d" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color:white;">
                <h4 class="fw-semibold">Total Savings</h4>
                <p class="display-5 fw-bold mt-2">₹<?= number_format($total, 2) ?></p>
            </div>
        </div>

    </div>

    <!-- 3D Info Section -->
    <div class="info-section mt-5 p-5 text-center animate__animated animate__fadeInUp" style="
        background: linear-gradient(120deg, #ffecd2 0%, #fcb69f 100%);
        border-radius: 20px;
        box-shadow: 0 15px 25px rgba(0,0,0,0.2);
        transform-style: preserve-3d;
        perspective: 1000px;
    ">
        <h2 class="fw-bold mb-3">💡 Why Save with Us?</h2>
        <p class="fs-5">Track your savings, visualize your growth, and stay motivated with our interactive analytics. Your money, smarter.</p>
    </div>

</div>

<!-- Custom Hover 3D & Animations -->
<style>
.hero-section h1, .hero-section p, .hero-section a {
    transition: transform 0.5s ease, text-shadow 0.5s ease;
}
.hero-section a:hover {
    transform: translateY(-5px) scale(1.05);
    text-shadow: 0 5px 15px rgba(0,0,0,0.3);
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

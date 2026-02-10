<?= $this->include('header') ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h3 class="fw-bold">Welcome Back 👋</h3>
                <p class="text-muted mb-0">Login to manage your savings</p>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/login">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Enter your email"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        name="password" 
                        placeholder="Enter your password"
                        required>
                </div>

                <button class="btn btn-primary w-100 py-2">
                    Login
                </button>
            </form>

            <div class="text-center mt-3">
                <small class="text-muted">
                    Don’t have an account?
                    <a href="/register" class="fw-semibold text-decoration-none">
                        Sign up
                    </a>
                </small>
            </div>

        </div>
    </div>
</div>

<?= $this->include('footer') ?>

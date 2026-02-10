<?= $this->include('header') ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 420px;">
        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h3 class="fw-bold">Create Account 🚀</h3>
                <p class="text-muted mb-0">Start tracking your savings today</p>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/register">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="Enter your email"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control" 
                        placeholder="Create a password"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input 
                        type="password" 
                        name="confirm_password" 
                        class="form-control" 
                        placeholder="Confirm your password"
                        required>
                </div>

                <button class="btn btn-success w-100 py-2">
                    Sign Up
                </button>
            </form>

            <div class="text-center mt-3">
                <small class="text-muted">
                    Already have an account?
                    <a href="/login" class="fw-semibold text-decoration-none">
                        Login
                    </a>
                </small>
            </div>

        </div>
    </div>
</div>

<?= $this->include('footer') ?>

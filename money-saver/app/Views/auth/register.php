<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4">
                <h3 class="text-center mb-3">Create Account</h3>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="/register">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

                    <input type="password" name="confirm_password" class="form-control mb-3" placeholder="Confirm Password" required>

                    <button class="btn btn-success w-100">Sign Up</button>
                </form>

                <p class="text-center mt-3">
                    Already have an account?
                    <a href="/login">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>

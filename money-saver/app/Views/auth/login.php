<?= $this->include('header') ?>

<div class="container mt-4">

    <div class="container mt-5 col-md-4">
        <h2>Login</h2>

        <form method="post" action="/login">
            <input class="form-control mb-2" name="email" placeholder="Email" required>
            <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
            <button class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center mt-3">
    Don’t have an account?
    <a href="/register">Sign up</a>
</p>
    </div>
</div>
<?= $this->include('footer') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Saver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .purple-color{
background: rgb(51 7 151) !important
    }
    
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark purple-color">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Money Saver</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if(session()->get('logged_in')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>">Add Savings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('savings/analytics') ?>">Show Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-2" href="<?= base_url('logout') ?>">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light text-primary" href="<?= base_url('login') ?>">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

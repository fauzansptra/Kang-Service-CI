<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        // esc($title);
        ?>

    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?= site_url('user') ?>">Kang Service</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('user') ?>">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('admin') ?>">Admins</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('technician') ?>">Technicians</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('service-request') ?>">Service Requests</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('service-history') ?>">Service History</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('feedback') ?>">Feedback</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="text-center mt-4">
        <p>&copy; <?= date('Y') ?> Kang Service. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
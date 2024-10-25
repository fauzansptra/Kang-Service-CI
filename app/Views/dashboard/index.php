<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h2 class="text-center">Dashboard</h2>
<div class="row">
    <div class="col-md-12">
        <h4>Welcome, <?= esc(session()->get('name')) ?>!</h4>
        <p>Your role: <?= esc(session()->get('role')) ?></p>
    </div>
</div>
<?= $this->endSection() ?>
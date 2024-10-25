<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h2 class="text-center">Service Requests Queue</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Ticket ID</th>
            <th>Device Name</th>
            <th>Issue</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requests as $request): ?>
            <tr>
                <td><?= esc($request['ticket_id']) ?></td>
                <td><?= esc($request['device_name']) ?></td>
                <td><?= esc($request['issue_description']) ?></td>
                <td><?= esc($request['status']) ?></td>
                <td>
                    <a href="<?= site_url('service-request/' . $request['request_id']) ?>" class="btn btn-info">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
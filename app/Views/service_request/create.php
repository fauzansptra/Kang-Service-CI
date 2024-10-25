<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="text-center">Submit Service Request</h2>
        <form action="<?= site_url('service-request') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="device_type">Device Type</label>
                <select class="form-control" id="device_type" name="device_type" required>
                    <option value="mobile">Mobile</option>
                    <option value="computer">Computer</option>
                    <option value="tablet">Tablet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="device_name">Device Name</label>
                <input type="text" class="form-control" id="device_name" name="device_name" required>
            </div>
            <div class="form-group">
                <label for="issue_description">Issue Description</label>
                <textarea class="form-control" id="issue_description" name="issue_description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit Request</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
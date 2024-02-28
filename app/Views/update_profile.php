<?= $this->extend("layout/Templet") ?>
<?= $this->section("layout"); ?>

<section class="container my-3 bg-dark w-50 text-light p-2">
    <div class="h1">Insert Data</div>
    <form class="row g-3 p-3" method="post" enctype="multipart/form-data" action="/save-updated-profile/<?= esc($eid) ?>">
        <div class="col-md-4">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" placeholder="Enter your first name" name="fname" value="<?= esc($employee['fname']) ?>">
            <span class="text-danger"><?= service('validation')->showError('fname'); ?></span>
        </div>
        <input type="hidden" name="eid" value="<?= esc($employee['eid']) ?>">

        <div class="col-md-4">
            <label for="mname" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="mname" placeholder="Enter your Middle Name" name="mname" value="<?= esc($employee['mname']) ?>">
            <span class="text-danger"><?= service('validation')->showError('mname'); ?></span>
        </div>

        <div class="col-md-4">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" placeholder="Enter your last name" name="lname" value="<?= esc($employee['lname']) ?>">
            <span class="text-danger"><?= service('validation')->showError('lname'); ?></span>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" aria-label="Select Your Gender" required>
                <option <?= ($employee['gender'] == 'male') ? 'selected' : '' ?> value="male">Male</option>
                <option <?= ($employee['gender'] == 'female') ? 'selected' : '' ?> value="female">Female</option>
            </select>
            <span class="text-danger"><?= service('validation')->showError('gender'); ?></span>
        </div>

        <div class="mb-3">
            <label for="mail" class="form-label">Mail</label>
            <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter your Email address" value="<?= esc($employee['mail']) ?>">
            <span class="text-danger"><?= service('validation')->showError('mail'); ?></span>
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile No</label>
            <input type="text" class="form-control" id="mobile" placeholder="Enter your Mobile No" name="mobile_no" value="<?= esc($employee['mobile_no']) ?>">
            <span class="text-danger"><?= service('validation')->showError('mobile_no'); ?></span>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter your date of birth" value="<?= esc($employee['date_of_birth']) ?>">
            <span class="text-danger"><?= service('validation')->showError('date_of_birth'); ?></span>
        </div>

        <div class="mb-3">
            <label for="photograph" class="form-label">Photograph</label>
            <input type="file" class="form-control" id="photograph" name="photograph" placeholder="Select your photograph" value="">
            <span class="text-danger"><?= service('validation')->showError('photograph'); ?></span>
        </div>

        <div class="mb-3">
            <label for="active" class="form-label">Status</label>
            <select class="form-select" id="active" name="status" aria-label="Select Your Status" required>
                <option <?= ($employee['status'] == '1') ? 'selected' : '' ?> value="1">Active</option>
                <option <?= ($employee['status'] == '0') ? 'selected' : '' ?> value="0">Inactive</option>
            </select>
            <span class="text-danger"><?= service('validation')->showError('status'); ?></span>
        </div>

        <div class="col-12 d-grid gap-2">
            <button type="submit" class="btn btn-primary">Insert Data</button>
        </div>
    </form>

    <a href="/address">
        <div class="col-12 d-grid gap-2">
            <button class="btn btn-primary" type="button">Add Address</button>
        </div>
    </a>
</section>

<?= $this->endSection("layout"); ?>
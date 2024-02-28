<?= $this->extend("layout/Templet") ?>
<?= $this->section("layout"); ?>

<body>
    <div class="container">
        <div class="main-body">


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?= esc($employee['photograph']) ?>" alt="Photograph" width="100" alt="Admin" class="rounded-circle" width="170">
                                <div class="mt-5">
                                    <h4><?= esc($employee['fname']) ?> <?= esc($employee['mname']) ?> <?= esc($employee['lname']) ?></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= esc($employee['fname']) ?> <?= esc($employee['mname']) ?> <?= esc($employee['lname']) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= esc($employee['mail']) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= esc($employee['gender']) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile No</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= esc($employee['mobile_no']) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= esc($employee['date_of_birth']) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Current Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= esc($employee['status']) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="<?= site_url('delete-profile') ?>">
                                        <input type="hidden" name="email" value="<?= esc($employee['mail']) ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your profile?')">
                                            Delete Profile
                                        </button>
                                    </form>
                                    <br>

                                    <form method="post" action="<?= site_url('update-profile') ?>">
                                        <input type="hidden" name="email" value="<?= esc($employee['mail']) ?>">
                                        <button type="submit" class="btn btn-primary">
                                            Update Profile
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?= $this->endSection("layout"); ?>
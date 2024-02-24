<?= $this->extend("layout/Templet") ?>
<?= $this->section("layout"); ?>

<section class="container my-3 bg-dark w-50 text-light p-2">
    <div class="h1">Insert Dara</div>
    <form class="row g-3 p-3" method="post"   action="/MyController/insert" >  
    <!-- enctype="multipart/form-data" -->
        <div class="col-md-4">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" placeholder="Enter your first name" name="fname" value="">
            <span class="text-danger"><?= service('validation')->showError('fname'); ?></span>
        </div>


        <div class="col-md-4">
            <label for="mname" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="mname" placeholder="Enter your Middle Name" name="mname"
                value="">
                <span class="text-danger"><?= service('validation')->showError('mname'); ?></span>
        </div>


        <div class="col-md-4">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" placeholder="Enter your last name" name="lname" value="">
            <span class="text-danger"><?= service('validation')->showError('lname'); ?></span>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" aria-label="Select Your Gender" required>
                <option selected disabled>Select Your Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <span class="text-danger"><?= service('validation')->showError('gender'); ?></span>
        </div>


        <div class="mb-3">
            <label for="mail" class="form-label">Mail</label>
            <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter your Email address"
                value="">
                <span class="text-danger"><?= service('validation')->showError('mail'); ?></span>
        </div>


        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile No</label>
            <input type="text" class="form-control" id="mobile" placeholder="Enter your Mobile No" name="mobile_no"
                value="">
                <span class="text-danger"><?= service('validation')->showError('mobile_no'); ?></span>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                placeholder="Enter your date of birth" value="">
                <span class="text-danger"><?= service('validation')->showError('date_of_birth'); ?></span>
        </div>

        <div class="mb-3">
            <label for="photograph" class="form-label">Photograph</label>
            <input type="file" class="form-control" id="photograph" name="photograph"
                placeholder="Select your photograph" value="">
                <span class="text-danger"><?= service('validation')->showError('photograph'); ?></span>
        </div>

        <div class="mb-3">
            <label for="active" class="form-label">Status</label>
            <select class="form-select" id="active" name="status" aria-label="Select Your Status" required>
                <option selected disabled>Select Your Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
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

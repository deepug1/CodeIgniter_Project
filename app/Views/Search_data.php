<?=$this->extend("layout/Templet") ?>
    <?=$this->section("layout"); ?>
    <body>

    <div class="container mt-5">
        <form action="<?= site_url('/search') ?>" method="post" class="col-md-6 offset-md-3">
            <div class="mb-3">
                <label for="email" class="form-label">Search by Email:</label>
                <div class="input-group">
                    <input type="text" name="email" id="email" class="form-control" required>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>

</body>
<?=$this->endSection("layout"); ?>
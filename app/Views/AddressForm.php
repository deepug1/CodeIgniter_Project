<?=$this->extend("layout/Templet") ?>
    <?=$this->section("layout"); ?>


<section class="container my-3 bg-dark w-50 text-light p-2">
    <form class="row g-3 p-3" method="post" action="InsertAddress">
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="add_line1" placeholder="">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" name="add_line2" placeholder="">
        </div>
        
        <div class="col-md-4">
        <label for="inputCountry" class="form-label">Country</label>
            <select  name="Country" class="form-select" onchange="fetchStateData(this.value)">
                <option value="">Select Country</option>
                <?php foreach ($country as $row) { ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                <?php  } ?>
            </select>
        </div>

        

        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select name="State" class="fw-lighter form-select border-1 border-dark rounded" id="stateID" onchange="fetchCityData(this.value)">
                <option value="">Select State</option>
            </select>
        </div>
        <div class="col-md-4">
        <label for="inputCountry" class="form-label">City</label>
            <select name="City" class="fw-lighter form-select border-1 border-dark rounded" id="cityId">
                <option value="">Select City</option>
            </select>
        </div>
        <div class="col-12">
            <label for="inputZip" class="form-label">Pincode</label>
            <input type="text" class="form-control" id="inputZip" name="pincode">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Insert Address</button>
        </div>
    </form>
</section>
<script>
        function fetchStateData(countryId) {
            $.ajax({
                url: "<?php echo site_url("state") ?>",
                method: "POST",
                data: {
                    cId: countryId
                },
                success: function(result){
                    let data = JSON.parse(result);
                    // console.log(data);

                    let output = "<option>select state</option>";
                    for(let row in data) {
                        
                    for (let row in data) {
                        output += `<option value="${data[row].id}">${data[row].name}</option>`;
                    }
                    document.querySelector("#stateID").innerHTML = output;
                }

             }
         });
        }


        function fetchCityData(stateID) {
            $.ajax({
                url: "<?php echo site_url("city") ?>",
                method: "POST",
                data: {
                    sId: stateID
                },
                success: function(result) {
                    let data = JSON.parse(result);
                    document.querySelector("#cityId").innerHTML = data;
                    // console.log(result);
                }
            });
        }
    </script>
<?= $this->endSection("layout"); ?>
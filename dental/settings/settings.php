<?php
include('../includes/header.php');
include('../../login/verify.php');
include('../includes/style-links.php');
?>

<body style="background-color: #D7F1F6;">
    <!-- Navbar -->
    <?php
        include ('../includes/nav2.php');

    ?>

    </div>

    <div class="container-md shadow-lg bg-white p-5 justify-content-center mt-5 mb-4" id="cons">
        <h1 class="fw-bold" style="color: #FF6D33;">Settings</h1>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <?php
                $setting = getById('settings', 1);
                ?>

                <input type="hidden" name="settingId" value="<?= $setting['data']['id'] ?? "" ?>" />

                <h2 class="mb-4 text-center orange"></h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Website Name</label>
                            <input type="text" name="title" value="<?= $setting['data']['title'] ?? "" ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Banner Header</label>
                            <input type="text" name="small_description" value="<?= $setting['data']['small_description'] ?? "" ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Banner Description</label>
                            <input type="text" name="meta_description" value="<?= $setting['data']['meta_description'] ?? "" ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Facebook Name</label>
                            <input type="text" name="meta_keyword" value="<?= $setting['data']['meta_keyword'] ?? "" ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dental_image">Dental Image</label>
                            <input type="file" name="dental_image" accept="image/*" class="form-control">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="optical_image">Optical Image</label>
                            <input type="file" name="optical_image" accept="image/*" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Email 1</label>
                            <input type="email" name="email1" value="<?= $setting['data']['email1'] ?? "" ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Email 2</label>
                            <input type="email" name="email2" value="<?= $setting['data']['email2'] ?? "" ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Phone 1</label>
                            <input type="text" name="phone1" value="<?= $setting['data']['phone1'] ?? "" ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Phone 2</label>
                            <input type="text" name="phone2" value="<?= $setting['data']['phone2'] ?? "" ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="address" name="address" value="<?= $setting['data']['address'] ?? "" ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Google Maps</label>
                        <textarea name="iframe" class="form-control" rows="3"><?= $setting['data']['iframe'] ?? "" ?></textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3 text-end">
                            <br>
                            <button type="submit" name="saveSetting" class="btn btn-submit text-white fw-bold" style="background-color: #FF6D33;">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>

</body>
<?php include('../includes/script-links.php'); ?>

</html>
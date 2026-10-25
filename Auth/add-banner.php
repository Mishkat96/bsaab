<?php require_once 'includes/header.php';
$err = '';
if (isset($_POST['addBannner'])) {
    $banner = $_FILES['banner'];
    try {
        $image = $obj->uploadMedia($banner, 'assets/images/');
        $result = $obj->insertData('banner', array('banner' => $image));
        if (!$result) {
            $_SESSION['status'] = "Banner added successfully";
            $_SESSION['status_code'] = "success";
            ?>
            <script>
                window.location.href = 'banner.php';
            </script>
            <?php
        } else {
            $err = 'Failed to add banner';
        }
    } catch (Exception $e) {
        $err = $e->getMessage(); // Capture any errors thrown by uploadPhoto method
    }
}
?>

<div class="content-body" style="min-height: 1054px;">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <?php
    if ($err !== '') {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $err; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
    ?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner" required>
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="addBannner" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<?php require_once 'includes/footer.php'; ?>
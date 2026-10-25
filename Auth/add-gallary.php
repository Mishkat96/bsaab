<?php require_once 'includes/header.php';

$err = '';
if (isset($_POST['addBannner'])) {
    $gallary = $_FILES['gallary'];
    try {
        $image = $obj->uploadMedia($gallary, 'assets/images/');
        $result = $obj->insertData('gallary', array('img' => $image));
        if (!$result) {
            $_SESSION['status'] = "gallary added successfully";
            $_SESSION['status_code'] = "success";
            ?>
            <script>
                window.location.href = 'gallary.php';
            </script>
            <?php
        } else {
            $err = 'Failed to add gallary';
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">add Gallery</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="#" method="post" enctype="multipart/form-data"
                                novalidate="novalidate">
                                <div class="form-group row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gallary">
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
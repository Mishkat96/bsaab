<?php
require_once 'includes/header.php';
$data = $obj->getData('about', '*', array('id' => 1));

if (isset($data['0'])) {
    foreach ($data as $list) {
        $c1 = $list['c1'];
        $c2 = $list['c2'];
        $c3 = $list['c3'];
        $c4 = $list['c4'];
        $img = $list['img'];


    }
}



if (isset($_POST['submit'])) {
    $c1 = $obj->get_safe($_POST['c1']);
    $c2 = $obj->get_safe($_POST['c2']);
    $c3 = $obj->get_safe($_POST['c3']);
    $c4 = $obj->get_safe($_POST['c4']);
    $upload = $img;
    if (isset($_FILES['val-image']) && $_FILES['val-image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['ab-image'];
        $upload = $obj->uploadMedia($image, 'assets/images/');

    }
    $result = $obj->updateData('about', array(
        'c1' => $c1,
        'c2' => $c2,
        'c3' => $c3,
        'c4' => $c4,
        'img' => $upload,
    ), '1');
    if (!$result) {
        $_SESSION['status'] = " update successfully";
        $_SESSION['status_code'] = "success";
        ?>
        <script>
            window.location.href = 'about.php';
        </script>
        <?php
    } else {
        $err = 'Failed to update about';
    }
}
?>

<div class="content-body" style="min-height: 1054px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">UI Management</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add About</a></li>
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
                            <form class="form-valide" action="#" method="post" novalidate="novalidate"
                                enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-fblink">about contant 1 <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-fblink" name="c1"
                                            placeholder="Enter your Facebook link" value="<?php echo $c1 ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-linkedin">about contant 2 <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-linkedin" name="c2"
                                            placeholder="Enter your LinkedIn link" value="<?php echo $c2 ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-instagram">about contant 3 <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-instagram" name="c3"
                                            placeholder="Enter your Instagram link" value="<?php echo $c3 ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-twitter">about contant 4 <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-twitter" name="c4"
                                            placeholder="Enter your Twitter link" value="<?php echo $c4 ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-image">About Image <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="val-image" name="ab-image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

<?php
require_once 'includes/footer.php';
?>
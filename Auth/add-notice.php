<?php require_once 'includes/header.php';

if (isset($_POST['submit'])) {
    $title = $obj->get_safe($_POST['val-title']);
    $desc = $obj->get_safe($_POST['val-desc']);
    $upload = $_FILES['val-thumb'];

    $img = $obj->uploadMedia($upload, 'assets/images/');
    $result = $obj->insertData('notice', array(
        'title' => $title,
        'img' => $img,
        'noticedesc' => $desc
    ));
    if (!$result) {
        $_SESSION['status'] = "Notice added successfully";
        $_SESSION['status_code'] = "success";
        ?>
        <script>
            window.location.href = 'notice.php';
        </script>
        <?php
    } else {
        $err = 'Failed to add notice';
    }
}


?>
<div class="content-body" style="min-height: 1054px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">UI Management</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Notice</a></li>
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
                                    <label class="col-lg-4 col-form-label" for="val-username">Notice Title <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="val-title"
                                            placeholder="Enter notice title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Notice Thumbnail <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="val-username" name="val-thumb"
                                            placeholder="Enter notice thumbnail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Notice Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="val-desc" rows="5"
                                            placeholder="Enter notice Description"></textarea>
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
<?php require_once 'includes/footer.php'; ?>
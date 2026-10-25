<?php require_once 'includes/header.php';


$data = $obj->getData('video');
if (isset($data[0])) {
    foreach ($data as $list) {
        $image = $list['thumb'];
        $vid = $list['video'];
    }
}

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadImg = $image; // Existing image (if any)
    $uploadVid = $vid;   // Existing video (if any)

    if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
        $banner = $_FILES['banner'];
        $uploadImg = $obj->uploadMedia($banner, 'assets/images/');
    }

    if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $video = $_FILES['video'];
        $uploadVid = $obj->uploadMedia($video, 'assets/images/');
    }

    // Insert the paths of the uploaded files into the database
    $result = $obj->updateData('video', array(
        'thumb' => $uploadImg,
        'video' => $uploadVid
    ), '1');

    if (!$result) { // Check if the update was successful
        $_SESSION['status'] = "Files uploaded and saved successfully";
        $_SESSION['status_code'] = "success";
        ?>
        <script>
            window.location.href = 'video.php';
        </script>
        <?php
    } else {
        $err = 'Failed to save file paths to database.';
    }
} ?>
<div class="content-body" style="min-height: 1054px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">UI Management</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Video<?php echo $err ?></a></li>
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
                                enctype="multipart/form-data" novalidate="novalidate">
                                <div class="form-group row">
                                    <label for="">Banner</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="">Video</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="video">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
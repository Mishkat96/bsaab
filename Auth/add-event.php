<?php require_once 'includes/header.php';
if (isset($_GET['type']) && $_GET['type'] == 'edit') {
    $id = $_GET['id'];
    $data = $obj->getData('event', '*', array('id' => $id));
    if (isset($data['0'])) {
        foreach ($data as $list) {
            $eventTitle = $list['title'];
            $eventLocation = $list['location'];
            $eventDate = $list['date'];
            $eventLink = $list['link'];
            $eventBanner = $list['banner'];
            $eventDesc = $list['evetndesc'];
        }
    }
}
$err = '';
if (isset($_POST['submit'])) {
    $title = $obj->get_safe($_POST['title']);
    $location = $obj->get_safe($_POST['location']);
    $date = $obj->get_safe($_POST['date']);
    $link = $obj->get_safe($_POST['link']);
    $banner = $_FILES['banner'];
    $desc = $obj->get_safe($_POST['desc']);
    $img = $eventBanner;
    if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
        // Upload the file
        try {
            $img = $obj->uploadMedia($_FILES['banner'], 'assets/images/');
        } catch (Exception $e) {
            $err = $e->getMessage();
        }
    }
    $conArr = array(
        'title' => $title,
        'location' => $location,
        'date' => $date,
        'link' => $link,
        'banner' => $img,
        'evetndesc' => $desc,
    );
    $result = $obj->updateData('event', $conArr, '1');
    if (!$result) {
        $_SESSION['status'] = "Banner added successfully";
        $_SESSION['status_code'] = "success";
        ?>
        <script>
            window.location.href = 'event.php';
        </script>
        <?php
    } else {
        $err = "Failed to add";
    }
}



?>
<div class="content-body" style="min-height: 1054px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">UI Management</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Event</a></li>
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
                            <form class="form-valide" action="#" method="post" novalidate="novalidate"
                                enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Event Title <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="title"
                                            placeholder="Enter event title" value="<?php echo $eventTitle ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Event Location <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="location"
                                            placeholder="Enter event location" value="<?php echo $eventLocation ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Event Date <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="val-password" name="date"
                                            placeholder="Choose a safe one.." value="<?php echo $eventDate ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Google Form link <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-password" name="link"
                                            placeholder="Enter google form link" value="<?php echo $eventLink ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-confirm-password">Event Banner
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="val-confirm-password" name="banner"
                                            placeholder="..and confirm it!" value="<?php echo $eventBanner ?>">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Event Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="desc" rows="5"
                                            placeholder="Enter event Description"><?php echo $eventDesc ?>"</textarea>
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
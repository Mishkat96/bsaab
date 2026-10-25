<?php require_once 'includes/header.php';

$err = $id = $name = $role = $fblink = $instalink = $twetlink = $linkedlink = $image = $msg = '';
if (isset($_GET['type']) && $_GET['type'] == 'edit' && isset($_GET['id'])) {
    // Sanitize the input
    $id = intval($_GET['id']);

    // Retrieve the data from the database
    $data = $obj->getData('members', '*', array('id' => $id));

    if (isset($data[0])) {
        foreach ($data as $list) {
            // Assuming the $list is an associative array with the keys: id, name, role, fblink, instalink, twetlink, linkedlink, image, msg
            $id = htmlspecialchars($list['id']);
            $name = htmlspecialchars($list['name']);
            $role = htmlspecialchars($list['role']);
            $fblink = htmlspecialchars($list['fblink']);
            $instalink = htmlspecialchars($list['instalink']);
            $twetlink = htmlspecialchars($list['twetlink']);
            $linkedlink = htmlspecialchars($list['linkedlink']);
            $img = htmlspecialchars($list['image']);
            $msg = htmlspecialchars($list['msg']);
        }
    }
}
if (isset($_POST['Submit'])) {
    $name = htmlspecialchars(trim($_POST['val-username']));
    $role = htmlspecialchars(trim($_POST['val-role']));
    $fblink = htmlspecialchars(trim($_POST['val-fblink']));
    $instalink = htmlspecialchars(trim($_POST['val-instagram']));
    $twetlink = htmlspecialchars(trim($_POST['val-twitter']));
    $linkedlink = htmlspecialchars(trim($_POST['val-linkedin']));
    $msg = htmlspecialchars(trim($_POST['val-msg']));
    $image = '';
    if (isset($_FILES['val-image']) && $_FILES['val-image']['error'] === UPLOAD_ERR_OK) {
        $upload = $_FILES['val-image'];
        $image = $obj->uploadMedia($upload, 'assets/images/');
    }
    $dataArray = array(
        'name' => $name,
        'role' => $role,
        'fblink' => $fblink,
        'instalink' => $instalink,
        'twetlink' => $twetlink,
        'linkedlink' => $linkedlink,
        'image' => $image,
        'msg' => $msg
    );
    $result = $obj->insertData('members', $dataArray);
    if (!$result) {
        $_SESSION['status'] = "Members added successfully";
        $_SESSION['status_code'] = "success";
        ?>
        <script>
            window.location.href = 'members.php';
        </script>
        <?php
    } else {
        $err = 'Failed to add members';
    }

}

if (isset($_POST['Update'])) {
    $name = htmlspecialchars(trim($_POST['val-username']));
    $role = htmlspecialchars(trim($_POST['val-role']));
    $fblink = htmlspecialchars(trim($_POST['val-fblink']));
    $instalink = htmlspecialchars(trim($_POST['val-instagram']));
    $twetlink = htmlspecialchars(trim($_POST['val-twitter']));
    $linkedlink = htmlspecialchars(trim($_POST['val-linkedin']));
    $msg = htmlspecialchars(trim($_POST['val-msg']));
    $image = $img;
    if (isset($_FILES['val-image']) && $_FILES['val-image']['error'] === UPLOAD_ERR_OK) {
        $upload = $_FILES['val-image'];
        $image = $obj->uploadMedia($upload, 'assets/images/');
    }
    $dataArray = array(
        'name' => $name,
        'role' => $role,
        'fblink' => $fblink,
        'instalink' => $instalink,
        'twetlink' => $twetlink,
        'linkedlink' => $linkedlink,
        'image' => $image,
        'msg' => $msg
    );
    $result = $obj->updateData('members', $dataArray, $id);
    if (!$result) {
        $_SESSION['status'] = "Members update successfully";
        $_SESSION['status_code'] = "success";
        ?>
        <script>
            window.location.href = 'members.php';
        </script>
        <?php
    } else {
        $err = 'Failed to update members';
    }
}
?>
<div class="content-body" style="min-height: 1054px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">UI Management</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Members</a></li>
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
                                    <label class="col-lg-4 col-form-label" for="val-username">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input required type="text" class="form-control" id="val-username" name="val-username"
                                            placeholder="Enter name" value="<?php echo $name; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-role">Role<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select required name="val-role" id="val-role" class="form-control">
                                            <option value="" seleted disabled>Choose...</option>
                                            <option value="0" <?php echo $role === '0' ? 'selected' : ''; ?>>
                                                Leadership</option>
                                            <option value="1" <?php echo $role === '1' ? 'selected' : ''; ?>>
                                                Advisor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-fblink">Facebook link <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-fblink" name="val-fblink"
                                            placeholder="Enter your Facebook link" value="<?php echo $fblink; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-linkedin">LinkedIn link <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-linkedin" name="val-linkedin"
                                            placeholder="Enter your LinkedIn link" value="<?php echo $linkedlink; ?> " required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-instagram">Instagram link <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-instagram" name="val-instagram"
                                            placeholder="Enter your Instagram link" value="<?php echo $instalink; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-twitter">Twitter link <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-twitter" name="val-twitter"
                                            placeholder="Enter your Twitter link" value="<?php echo $twetlink; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-image">Image <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input required type="file" class="form-control" id="val-image" name="val-image">
                                        <?php if ($image): ?>
                                            <img src="<?php echo $image; ?>" alt="Current image"
                                                style="max-width: 100px; margin-top: 10px;">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-msg">Message <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" required id="val-msg" name="val-msg" rows="5"
                                            placeholder="Enter Message"><?php echo $msg; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit"
                                            name="<?php echo isset($_GET['type']) && $_GET['type'] == 'edit' ? 'Update' : 'Submit' ?>"
                                            class="btn btn-primary"><?php echo isset($_GET['type']) && $_GET['type'] == 'edit' ? 'Update' : 'Submit' ?></button>
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
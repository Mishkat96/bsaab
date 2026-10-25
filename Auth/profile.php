<?php
require_once 'includes/header.php';

if (isset($_POST['submit'])) {
    $email = $obj->get_safe($_POST['email']);
    $pass = $obj->get_safe($_POST['pass']);
    $c1 = $obj->get_safe($_POST['c1']);
    $c2 = $obj->get_safe($_POST['c2']);
    $c3 = $obj->get_safe($_POST['c3']);
    $c4 = $obj->get_safe($_POST['c4']);
    $result = $obj->updateData('login', array(
        'email' => $email,
        'pwd' => $pass,
        'fb' => $c1,
        'ins' => $c2,
        'linkd' => $c3,
        'tweet' => $c4
    ), '1');

    if (!$result) {
        $_SESSION['status'] = " update successfully";
        $_SESSION['status_code'] = "success";
    }
}
$data = $obj->getData('login');

if (isset($data['0'])) {
    foreach ($data as $list) {
        $fb = $list['fb'];
        $ins = $list['ins'];
        $linkd = $list['linkd'];
        $tweet = $list['tweet'];
        $emails = $list['email'];
        $pwd = $list['pwd'];
    }
}

?>
<div class="content-body" style="min-height: 1054px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <?php
    if (isset($_SESSION['status'])) {

        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['status'];
            sleep(3);
            unset($_SESSION['status']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }

    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <img class="mr-3" src="assets/images/final logo with correction without background-01.png"
                                width="80" height="80" alt="">
                            <div class="media-body">
                                <h3 class="mb-0">BSAAB</h3>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                    <h3 class="mb-0"><?php
                            $data = $obj->getData('bemember');

                            // Check if $data is an array or Countable object
                            if (is_array($data) || $data instanceof Countable) {
                                // Output the count of the data
                                echo count($data);
                            } else {
                                // Handle cases where $data is not countable
                                echo "0";
                            }

                            ?></h3>
                                    <p class="text-muted px-4">Members</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <form class="form-valide" action="#" method="post" novalidate="novalidate" style="padding:12px"
                        enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-fblink">Change Email <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-fblink" name="email"
                                    placeholder="Enter new email" value="<?php echo $emails ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-fblink">Change Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-fblink" name="pass"
                                    placeholder="Enter new password" value="<?php echo $pwd ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-fblink">Facebook Link <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-fblink" name="c1"
                                    placeholder="Enter your Facebook link" value="<?php echo $fb ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-linkedin">linkedin Link <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-linkedin" name="c2"
                                    placeholder="Enter your LinkedIn link" value="<?php echo $linkd ?>">">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-instagram">instagram Link <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-instagram" name="c3"
                                    placeholder="Enter your Instagram link" value="<?php echo $ins ?>">">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-twitter">twitter Links <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-twitter" name="c4"
                                    placeholder="Enter your Twitter link" value="<?php echo $tweet ?>">">
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
    <!-- #/ container -->
</div>

<?php
require_once 'includes/footer.php'; ?>
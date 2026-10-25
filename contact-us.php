<?php require_once 'includes/header.php';
ob_start();
$err = '';
$status = '';
if (isset($_POST['submit'])) {
    $subject = $obj->get_safe($_POST['subject']);
    $fname = $obj->get_safe($_POST['fname']);
    $lname = $obj->get_safe($_POST['lname']);
    $phone = $obj->get_safe($_POST['phone']);
    $email = $obj->get_safe($_POST['email']);
    $university = $obj->get_safe($_POST['university']);
    $message = $obj->get_safe($_POST['message']);
    
    $conArr = array(
        'subject' => $subject,
        'fname' => $fname,
        'lname' => $lname,
        'phone' => $phone,
        'email' => $email,
        'university' => $university,
        'message' => $message,
    );
    
    $result = $obj->insertData('contact', $conArr);
    
    if (!$result) {
        $_SESSION['err'] = 'Thanks for contacting us!';
        $_SESSION['status'] = 'success';
    } else {
        $_SESSION['err'] = 'Failed to contact us!';
        $_SESSION['status'] = 'danger';
    }
    
    // Redirect using JavaScript after rendering the page content
    echo "<script>
            setTimeout(function(){
                window.location.href = '" . $_SERVER['PHP_SELF'] . "';
            }, 3000); // Redirect after 2 seconds
          </script>";
}


?>
<div class="Contactheader">
    <div class="overlay-text">
        <h2>We'd love to talk</h2>
        <h2>about how we can work together</h2>
    </div>
</div>
<?php
if (isset($_SESSION['status'])) {

    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php
        echo $_SESSION['err'];
        sleep(3);
        unset($_SESSION['status']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}
?>
<div class="container d-flex contactForm">
    <div class="card " style="width: 62%;">
        <div class="contactFormTxt text-start m-3 d-flex flex-column gap-3">
            <h3>Request a call</h3>
            <span> Give us some info so the right person can get back to you.</span>
            <p>&#10004 Turst is our #1 value, so rest assured your email is safe. Learn more about the
                user of
                personal data
                in
                our Privacy Policy</p>
        </div>
        <div class="container ">
            <form id="contact_form" name="contact_form" method="post">
                <div class="mb-3 row">
                    <div class="col">
                        <input type="text" name="subject" required maxlength="50" class="form-control"
                            placeholder="Subject">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <input type="text" required maxlength="50" class="form-control" id="email_addr" name="fname"
                            placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" required maxlength="50" class="form-control" id="phone_input" name="lname"
                            placeholder="Last Name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <input type="tel" required maxlength="50" class="form-control" id="email_addr" name="phone"
                            placeholder="Phone">
                    </div>
                    <div class="col">
                        <input type="email" required maxlength="50" class="form-control" id="phone_input" name="email"
                            placeholder="Email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <input type="text" required maxlength="50" class="form-control" id="phone_input"
                            name="university" placeholder="University">
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="message" name="message" rows="5"
                        placeholder="Message"></textarea>
                </div>
                <button type="submit" name="submit" class=" constiBtn px-4 btn-lg" style="margin-left: 11pc;">Send your message</button>
            </form>
        </div>
    </div>
    <div class="card noticFormTxt">
        <h3>Check out our helpline</h3>
        <a href="#" class="text-dark" style="text-decoration: none;">See all our notice</a>
        <a href="notic.php"><button class=" constiBtn px-4 btn-lg">Notice</button></a>
    </div>
</div>
<?php require_once 'includes/footer.php' ?>
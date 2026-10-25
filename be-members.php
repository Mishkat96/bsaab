<?php require_once 'includes/header.php';
$Regerr = '';
$status = '';

if (isset($_POST['submit'])) {
    // Retrieve and sanitize form input
    $given_name = $obj->get_safe($_POST['given_name']);
    $surname = $obj->get_safe($_POST['surname']);
    $father_name = $obj->get_safe($_POST['father_name']);
    $mother_name = $obj->get_safe($_POST['mother_name']);
    $dob = $obj->get_safe($_POST['dob']);
    $gender = $obj->get_safe($_POST['gender']);
    $phone = $obj->get_safe($_POST['phone']);
    $email = $obj->get_safe($_POST['email']);
    $university = $obj->get_safe($_POST['university']);
    $field_of_study = $obj->get_safe($_POST['field_of_study']);
    $types_of_study = $obj->get_safe($_POST['types_of_study']);
    $address = $obj->get_safe($_POST['address']);
    $photo = $_FILES['photo'];
    $image = $obj->uploadMedia($photo, 'Auth/assets/images/');

    // Prepare data for insertion
    $conArr = array(
        'given_name' => $given_name,
        'surname' => $surname,
        'father_name' => $father_name,
        'mother_name' => $mother_name,
        'dob' => $dob,
        'gender' => $gender,
        'phone' => $phone,
        'email' => $email,
        'university' => $university,
        'field_of_study' => $field_of_study,
        'types_of_study' => $types_of_study,
        'address' => $address,
        'image' => $image,
    );

    // Insert data into database
    $result = $obj->insertData('bemember', $conArr);

    if (!$result) {
        $_SESSION['Regerr'] = 'Register successfuly!';
        $_SESSION['status'] = 'success';
    } else {
        $_SESSION['err'] = 'Failed to contact us!';
        $_SESSION['status'] = 'danger';
    }
    // Redirect to prevent form resubmission on page refresh
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
        <h2>Be a member of our family</h2>
    </div>
</div>

<?php
if (isset($_SESSION['Regerr'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php
        echo $_SESSION['Regerr'];
        sleep(3);
        unset($_SESSION['Regerr']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}
?>

<div class="container justify-content-center d-flex contactForm">
    <div class="card ">
        <div class="contactFormTxt text-start m-3 d-flex flex-column gap-3">
            <h3>Put your information as per Passport</h3>
            <span> Be a member of our family in Belgium so that we can experience together</span>
            <p>✔ Turst is our #1 value, so rest assured your email is safe. Learn more about the user of
                personal data
                in
                our Privacy Policy</p>
        </div>
        <div class="container ">
            <form id="contact_form" name="contact_form" method="post" enctype="multipart/form-data">
                <div class="">
                    <div class="">

                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" required maxlength="50" class="form-control" id="given_name"
                                    name="given_name" placeholder="Given Name">
                            </div>
                            <div class="col">
                                <input type="text" required maxlength="50" class="form-control" id="surname"
                                    name="surname" placeholder="Surname">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" required maxlength="50" class="form-control" id="father_name"
                                    name="father_name" placeholder="Father Name">
                            </div>
                            <div class="col">
                                <input type="text" required maxlength="50" class="form-control" id="mother_name"
                                    name="mother_name" placeholder="Mother Name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <div class="date-input-wrapper">
                                    <input type="date" required class="form-control" id="dob" name="dob">
                                    <label for="dob" class="date-placeholder-label">Date of Birth</label>
                                </div>
                            </div>
                            <div class="col">
                                <select name="gender" id="gender" class="form-select">
                                    <option selected disabled value="">Gender</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="tel" required maxlength="50" class="form-control" id="phone" name="phone"
                                    placeholder="Phone">
                            </div>
                            <div class="col">
                                <input type="email" required maxlength="50" class="form-control" id="email" name="email"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" required maxlength="50" class="form-control" id="university"
                                    name="university" placeholder="University">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" required maxlength="50" class="form-control" id="field_of_study"
                                    name="field_of_study" placeholder="Field of Study">
                            </div>
                            <div class="col">
                                <input type="text" required maxlength="50" class="form-control" id="types_of_study"
                                    name="types_of_study" placeholder="Types of Study">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" required maxlength="50" class="form-control" id="address" name="address"
                                placeholder="Address">
                        </div>
                        <div class="mb-3 row">
                            <div class="file-input-container col">
                                <input type="file" name="photo" id="fileInput" class="file-input"
                                    onchange="updatePlaceholder()" required />
                                <label for="fileInput" id="fileInputLabel">Photo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="constiBtn px-4 btn-lg" style="margin-left: 24pc">Register</button>
            </form>
        </div>

    </div>
</div>
<?php require_once 'includes/footer.php' ?>
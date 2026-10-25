<?php require_once 'includes/header.php';
?>

<!-- Carousel with auto slide -->
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        $bannerData = $obj->getData('banner');
        if (isset($bannerData[0])) {
            foreach ($bannerData as $index => $bannerList) {
                ?>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?php echo $index; ?>" 
                    class="<?php echo $index === 0 ? 'active' : ''; ?>" 
                    aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" 
                    aria-label="Slide <?php echo $index + 1; ?>"></button>
                <?php
            }
        }
        ?>
    </div>
    <div class="carousel-inner">
        <?php
        if (isset($bannerData[0])) {
            foreach ($bannerData as $index => $bannerList) {
                ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>" data-bs-interval="2000">
                    <img src="Auth/assets/images/<?php echo $bannerList['banner']; ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption  d-md-block">
                        <h5>Bangladeshi Student and Alumni Association in Belgium</h5>
                        <p>NOW HELP IN YOUR HAND</p>
                        <a href="be-members.php"><button class="memberBtn">Be a member</button></a>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="container">

    <h2 class="card-title text-center mt-5">
        At a Glance
    </h2>
    <?php
    $vidData = $obj->getData('video');
    if (isset($vidData['0'])) {
        foreach ($vidData as $vidList) {
            $thumb = $vidList['thumb'];
            $video = $vidList['video'];
        }
    }
    ?>
    <div class="card d-none" id="modalBox">
        <video src="Auth/assets/images/<?php echo $video ?>" controls></video>
        <button id="videoCls" class="btn btn-primary mt-3">Close</button>
    </div>
    <div id="modal" class="container-fluid mt-5 mb-5 ">
        <!-- Video box with play button -->
        <div class="video-box" style="background-image:
        linear-gradient(to bottom right, rgb(0 0 0 / 45%), rgb(0 0 0 / 78%)),
        url(Auth/assets/images/<?php echo $thumb ?>);">
            <!-- Play button (visible when video is not playing) -->
            <div id="playBtn" class="play-button">
                <img src="assets/img/playBtn.png" alt="">
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 mb-5">
        <?php
        $eventData = $obj->getData('event');
        if (isset($eventData['0'])) {
            foreach ($eventData as $eventList) {
                $title = $eventList['title'];
                $location = $eventList['location'];
                $date = $eventList['date'];
                $link = $eventList['link'];
                $banner = $eventList['banner'];
                $evetndesc = $eventList['evetndesc'];
                $timestamp = strtotime($date);
                $formattedDate = date('jS F, Y', $timestamp);
            }
        }
        ?>
        <div class="image-box" style="  background-image:
        linear-gradient(to right, rgb(0 0 0 / 0%) 0%, rgb(0 0 0 / 73%) 100%),
        url(Auth/assets/images/<?php echo $banner ?>););">
            <div class="txt-right">
                <h4><?php echo $title ?></h4>
                <div class="address d-flex ">
                    <span>
                        <i class="fa-solid fa-street-view"></i>
                        <?php echo $location ?>
                    </span>
                    <span>
                        <i class="fa-regular fa-clock"></i>
                        <?php echo $formattedDate ?>
                    </span>
                </div>
                <p class="paragraph">
                    <?php echo $evetndesc ?>
                </p>
                <a href="<?php echo $link ?>"><button class="buyBtn">Buy Ticket</button></a>
            </div>
        </div>
    </div>

    <div class="container  text-center " id="vision">
        <div class="img-left">
            <img src="assets/img/unnamed.jpg" alt="">
        </div>
        <div class="visonTxt">
            <h2>Our Vision</h2>
            The Vision of the BSAAB is to become one of the best student associations in Belgium that will contribute to
            Bangladeshi student and community development and National building as well.
        </div>
    </div>
    <div class="container  text-center " id="mission">
        <div class="img-right">
            <img src="assets/img/vision2.jpg" alt="">
        </div>
        <div class="missiontxt">
            <h2>Our Mission</h2>
            <p>
                The mission of the BSAAB is to develop and support Bangladeshi students in Belgium by optimum
                utilization of their knowledge, experience, and self-resources; forming more interpersonal relationships
                among each other to achieve the highest level of success by assisting current and fellow former
                students; ensuring the continued excellence of BSAAB.
            </p>
            <a href="Bangladeshi Student and Alumni Association in Belgium.pdf"> <button class="constiBtn"><i
                        class="fa-solid fa-download"></i> Constitution</button></a>
        </div>
    </div>

</div>

<div class="section-padding" id="members">
<div id='roundBg' style="background: #F5F7FA; padding: 5rem 0; border-top-right-radius: 30%; border-top-left-radius: 20%;">
    <div class="">
        <div class="col-md-12">
            <div class="section-title">
                <h2>Our Members</h2>
                <div class="section-borders">
                    <button class="advicBtn leaderBtn tab-button" data-filter="leadership">Leadership</button>
                    <button class="advicBtn leaderBtn tab-button" data-filter="advisors">Advisors</button>
                </div>
            </div>
        </div>
    </div>
    <div class="owl-carousel client-testimonial-carousel">
        <?php
        $membersData = $obj->getData('members');
        if (isset($membersData[0])) {
            foreach ($membersData as $membersList) {
        ?>
                <div class="single-testimonial-item tab-content"
                     data-category="<?php echo isset($membersList['role']) && $membersList['role'] == 0 ? 'leadership' : 'advisors'; ?>">
                    <div class="card testimonial-card">
                        <img src="Auth/assets/images/<?php echo $membersList['image']; ?>" class="" alt="...">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h5><?php echo $membersList['name']; ?></h5>
                                <span><?php echo isset($membersList['role']) && $membersList['role'] == 0 ? 'Leadership' : 'Advisors'; ?></span>
                            </div>
                            <p class="card-text"><?php echo $membersList['msg']; ?></p>
                            <div class="card-link">
                                <a href="<?php echo $membersList['twetlink']; ?>">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="<?php echo $membersList['linkedlink']; ?>">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                                <a href="<?php echo $membersList['instalink']; ?>">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="<?php echo $membersList['fblink']; ?>">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

    <div class="container">
        <div class="memberInfo" style="padding: 57px 0;background:#F5F7FA">
            <div class="memTxt d-flex">
                <h2>Hepling a local</h2>
                <h2 class="danger">Student reinvent himself</h2>
                <small>We are united and ready to help others</small>
            </div>
            <div class="memCount d-flex">
                <div class="topCount">
                    <div class="countInfo">
                        <i class="fa-solid fa-users"></i>
                        <div class="count">
                            <div class="nmbr">
                                <span class="numbr"><?php
                                $data = $obj->getData('bemember');

                                // Check if $data is an array or Countable object
                                if (is_array($data) || $data instanceof Countable) {
                                    // Output the count of the data
                                    echo count($data);
                                } else {
                                    // Handle cases where $data is not countable
                                    echo "0";
                                }

                                ?></span>
                                <span>members</span>
                            </div>
                        </div>
                    </div>
                    <div class="countInfo">
                        <i class="fa-regular fa-hand-pointer"></i>
                        <div class="count">
                            <div class="nmbr">
                                <span class="numbr">82</span>
                                <span>Event Organize</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="topCount">
                    <div class="countInfo">
                        <i class="fa-solid fa-hands-bubbles"></i>
                        <div class="count">
                            <div class="nmbr">
                                <span class="numbr">12</span>
                                <span>Clubs</span>
                            </div>
                        </div>
                    </div>
                    <div class="countInfo">
                        <i class="fa-solid fa-wallet"></i>
                        <div class="count">
                            <div class="nmbr">
                                <span class="numbr">127</span>
                                <span>Seminer Organize</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-ride="carousel"
        data-bs-interval="3000">
        <div class="galleryTitle">
            <span>Our best</span>
            <h2 class="danger">Gallery</h2>
        </div>

        <div class="carousel-inner">
            <?php
            $galleryData = $obj->getData('gallary');
            if (isset($galleryData['0'])) {
                foreach ($galleryData as $galleryList) {
                    ?>
                    <div class="carousel-item active">
                        <div class="overlay">
                            <img src="Auth/assets/images/<?php echo $galleryList['img'] ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <!-- Carousel indicators (dots) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
    </div>

</div>

<!-- About 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 container" id="about">
    <div class="container">
        <?php
        $aboutData = $obj->getData('about');
        if (isset($aboutData['0'])) {
            foreach ($aboutData as $aboutList) {
                $c1 = $aboutList['c1'];
                $c2 = $aboutList['c2'];
                $c3 = $aboutList['c3'];
                $c4 = $aboutList['c4'];
                $img = $aboutList['img'];
            }
        }
        ?>
        <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-5">
                <h2 class="card-title about">About Us</h2>
                <img class="img-fluid rounded mt-3" loading="lazy" src="Auth/assets/images/<?php echo $img ?>"
                    alt="About 1">
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="row justify-content-xl-start">
                    <div class="row gy-4 gy-md-0 gx-xxl-5X">
                        <div class="col-12 col-md-6">
                            <div class="d-flex">
                                <div>
                                    <span class="aboutNmbr">1</span>
                                    <p class="text-secondary mb-0"><?php echo $c1 ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex">
                                <div>
                                    <span class="aboutNmbr">2</span>
                                    <p class="text-secondary mb-0"><?php echo $c2 ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 gy-md-0 gx-xxl-5X mt-5">
                        <div class="col-12 col-md-6">
                            <div class="d-flex">
                                <div>
                                    <span class="aboutNmbr">3</span>
                                    <p class="text-secondary mb-0"><?php echo $c3 ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex">
                                <div>
                                    <span class="aboutNmbr">4</span>
                                    <p class="text-secondary mb-0"><?php echo $c4 ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class=" container newsletter-section mt-5">
    <div class="content">
        <h2>Sign up to our newsletter</h2>
        <p>Receive the latest news, updates, and many other things every week.</p>
        <div class="input-group">
            <input type="email" class="form-control" placeholder="Enter Your email address">
            <button class="btn btn-danger" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send"
                    viewBox="0 0 16 16">
                    <path
                        d="M15.854 0.146a.5.5 0 0 1 .057.638l-10 14a.5.5 0 0 1-.894-.447L5.995 10 1.707 8.707a.5.5 0 0 1-.447-.894l14-10a.5.5 0 0 1 .594.333zM6.5 10.328L8.214 14.79 14.079 2.464 6.5 10.328zm.181-.945l-4.26-1.42 9.351-6.68-5.09 8.1z" />
                </svg>
            </button>
        </div>
    </div>
</div>
<div class="container aboutus d-flex justify-content-xl-center  flex-column text-center " style="
    width: 85%;
    padding: 71px;
    background: #F5F7FA;
">
    <h2>Get to know us better</h2>
    <span>It is a pleasure to have you our website. Let us know if there's an opportunity to do something
        together</span>
    <a href="contact-us.php"> <button class="constiBtn">Contact us</button></a>
</div>
<?php require_once 'includes/footer.php' ?>
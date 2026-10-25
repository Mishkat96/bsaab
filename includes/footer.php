<!-- Remove the container if you want to extend the Footer to full width. -->

<footer class="text-center text-lg-start" style="background:#F5F7FA;padding-top:6rem;">
    <!-- Grid container -->
    <div class="container-fluid">
        <!-- Center the content horizontally -->
        <div class="row d-flex justify-content-center gap-3">
            <!--Grid column 1-->
            <div class="col-lg-2 col-md-6 col-sm-12 mb-4 mb-md-0">
                <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mx-auto"
                    style="width: 150px; height: 150px;">
                    <img src="assets/img/final logo with correction without background-01.png" height="70" alt=""
                        loading="lazy">
                </div>
                <?php
                $data = $obj->getData('login');

                if (isset($data['0'])) {
                    foreach ($data as $list) {
                        $fb = $list['fb'];
                        $ins = $list['ins'];
                        $linkd = $list['linkd'];
                        $tweet = $list['tweet'];
                    }
                }
                ?>
                <p class="text-center">Bangladeshi Student and Alumni Association in Belgium</p>
                <ul class="card-link list-unstyled d-flex flex-row justify-content-center">
                    <li><a href="<?php echo $fb ?>" class="px-2"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="<?php echo $ins ?>" class="px-2"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="<?php echo $linkd ?>" class="px-2"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="<?php echo $tweet ?>" class="px-2"><i class="fa-brands fa-facebook"></i></a></li>
                </ul>
            </div>
            <!--Grid column 1-->

            <!--Grid column 2-->
            <div class="col-lg-2 col-md-6 col-sm-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Location</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#!" class="text-dark">Connecticut Center for Advanced Technology, 222 Pitkin
                            Street,
                            STE 126 East Hartford, CT 06108, Brussels, Belgium</a>
                    </li>
                </ul>
            </div>
            <!--Grid column 2-->

            <!--Grid column 3-->
            <div class="col-lg-2 col-md-6 col-sm-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Resources</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#!" class="text-dark">Download</a></li>
                    <li class="mb-2"><a href="#!" class="text-dark">Help Center</a></li>
                    <li class="mb-2"><a href="#!" class="text-dark">About us</a></li>
                    <li class="mb-2"><a href="#!" class="text-dark">App Directory</a></li>
                </ul>
            </div>
            <!--Grid column 3-->

            <!--Grid column 4-->
            <div class="col-lg-2 col-md-6 col-sm-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Guideline</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#!" class="text-dark">Blog</a></li>
                    <li class="mb-2"><a href="#!" class="text-dark">Case studies</a></li>
                    <li class="mb-2"><a href="#!" class="text-dark">Guideline</a></li>
                    <li class="mb-2"><a href="#!" class="text-dark">Information</a></li>
                </ul>
            </div>
            <!--Grid column 4-->

            <!--Grid column 5-->
            <div class="col-lg-2 col-md-6 col-sm-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Get App</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#!" class="text-dark">App Store</a></li>
                    <li class="mb-2"><a href="#!" class="text-dark">Google Play Store</a></li>
                </ul>
            </div>
            <!--Grid column 5-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="p-3 d-flex justify-content-between align-items-center">
        <span style="font-weight: 700;">Copyright © All rights reseved: BSAAB</span>
        <span>Developed by <a href="https://tmtsoft.com/index.html" class="text-dark" style="font-weight: 700;text-decoration: none;">TMT
                Soft</a></span>
    </div>



    <!-- Copyright -->
</footer>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$(document).ready(function () {
    const owl = $(".owl-carousel");

    // Function to initialize the Owl Carousel
    function initializeOwlCarousel() {
        owl.owlCarousel({
            items: 3,
            loop: false,
            margin: 10,
            center: true,
            nav: true,
            dots: false,
            autoHeight: true,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 }
            }
        });
    }

    // Initialize the carousel on page load
    initializeOwlCarousel();

    // Click event for tab buttons
    $(".tab-button").on("click", function () {
        const filter = $(this).data("filter");

        // Destroy the carousel
        owl.trigger('destroy.owl.carousel').removeClass('owl-loaded');

        // Filter the items
        $(".tab-content").each(function () {
            if ($(this).data("category") === filter) {
                $(this).show(); // Show matching items
            } else {
                $(this).hide(); // Hide non-matching items
            }
        });

        // Delay the reinitialization slightly to ensure proper DOM update
        setTimeout(function () {
            // Reinitialize the carousel with filtered items
            initializeOwlCarousel();
        }, 100); // Adjust the delay if necessary

        // Update active tab button class
        $(".tab-button").removeClass('tabactive');
        $(this).addClass('tabactive');
    });

    // Trigger the first tab's click event on page load
    $(".tab-button").first().trigger("click");
});


    document.querySelectorAll('.navbar-nav .nav-link').forEach((link) => {
        link.addEventListener('click', () => {
            var navbarCollapse = document.querySelector('.navbar-collapse');
            var bsCollapse = new bootstrap.Collapse(navbarCollapse);
            bsCollapse.hide();
        });
    });

    function truncateText(elementId, wordLimit) {
        const element = document.getElementById(elementId);
        const text = element.innerText.trim();
        const words = text.split(' ');

        if (words.length > wordLimit) {
            const truncated = words.slice(0, wordLimit).join(' ') + '...';
            element.innerText = truncated;
        }
    }

    // Call the function on page load or as needed
    truncateText('showSome', 10);
    function updatePlaceholder() {
        const fileInput = document.getElementById('fileInput');
        const fileInputLabel = document.getElementById('fileInputLabel');

        if (fileInput.files.length > 0) {
            fileInputLabel.textContent = fileInput.files[0].name;
        } else {
            fileInputLabel.textContent = 'Choose a file...';
        }
    }


</script>
</body>

</html>
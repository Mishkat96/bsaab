<?php require_once 'includes/header.php' ?>
<div class="Contactheader">
    <div class="overlay-text">
        <h2>Notices</h2>
    </div>
</div>
<div class="container my-5">
    <div class="card-list">
        <!-- Card 1 -->
        <?php
        $noticData = $obj->getData('notice');
        if (isset($noticData['0'])) {
            foreach ($noticData as $noticList) {
                ?>
                <a href="notic-view.php?id=<?php echo $noticList['id'] ?>" style="text-decoration:none">
                    <div class="card">
                        <img src="Auth/assets/images/<?php echo $noticList['img'] ?>" alt="Image 1">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $noticList['title'] ?></h5>
                            <p id="showSome" class="card-text">
                                <?php echo $noticList['noticedesc'] ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <i class="fas fa-calendar-alt"></i>

                            <?php

                            $timestamp = strtotime($noticList['date']);
                            echo $formattedDate = date('jS F, Y', $timestamp);
                            ?>
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>


        <!-- Repeat cards as needed -->
    </div>
</div>
<?php require_once 'includes/footer.php' ?>
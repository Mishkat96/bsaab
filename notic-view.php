<?php require_once 'includes/header.php';
if (isset($_GET['id'])) {
    $data = $obj->getData('notice', '*', array('id' => $_GET['id']));
    if (isset($data['0'])) {
        foreach ($data as $list) {
            $title = $list['title'];
            $noticedesc = $list['noticedesc'];
            $date = $list['date'];
            $timestamp = strtotime($date);
            $formattedDate = date('jS F, Y', $timestamp);
        }
    }
}

?>
<div class="Contactheader">
    <div class="overlay-text">
        <h2>Notices</h2>
    </div>
</div>
<div class="container my-5">
    <div class="content-card">
        <div class="content-header">
            <h2><?php echo $title ?>.</h2>
            <div class="date">
                <i class="fas fa-calendar-alt"></i> <?php echo $formattedDate ?>
            </div>
        </div>
        <div class="content-body">
            <?php echo $noticedesc ?>
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php' ?>
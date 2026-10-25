<?php require_once 'includes/header.php';

$msg = '';
if (isset($_GET['type']) && $_GET['type'] == 'delete') {
    $id = $_GET['id'];
    $result = $obj->deleteData('notice', array('id' => $id));
    if (!$result) {
        $msg = 'Successfuly deleted';
    } else {
        $msg = 'Failed to delete';
    }
} ?>

<div class="content-body" style="min-height: 1054px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">UI Management</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Notice</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <?php
    if ($msg !== '') {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $msg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between " width="100%">
                            <h4 class="card-title">Notice List</h4>
                            <a href="add-notice.php"><button class="btn btn-primary">Add Notice</button></a>
                        </div>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show
                                                <select name="DataTables_Table_0_length"
                                                    aria-controls="DataTables_Table_0"
                                                    class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm"
                                                    placeholder="" aria-controls="DataTables_Table_0"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered zero-configuration dataTable"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 120.578px;">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 199.641px;">NOTICE TITLE</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 199.641px;">THUMBNAIL</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 199.641px;">NOTICE DESCRIPTION</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 85.9844px;">ACTION</th>
                                            </thead>
                                            <tbody>


                                                </tr>
                                                <?php
                                                $data = $obj->getData('notice');
                                                if (isset($data['0'])) {
                                                    $i = 1;
                                                    foreach ($data as $list) {
                                                        ?>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1"><?php echo $i ?></td>
                                                            <td class="sorting_1"><?php echo $list['title'] ?></td>
                                                            <td>
                                                                <div class=" ">
                                                                    <img src="assets/images/<?php echo $list['img'] ?>"
                                                                        height="50" width="50" alt="">
                                                                </div>
                                                            </td>
                                                            <td><?php echo $list['noticedesc'] ?></td>
                                                            <td><a href="notice.php?type=delete&id=<?php echo $list['id'] ?>"><i
                                                                        class="icon-trash menu-icon text-danger "></a></i>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">ID</th>
                                                    <th rowspan="1" colspan="1">Notice Title</th>
                                                    <th rowspan="1" colspan="1">Thumbnail</th>
                                                    <th rowspan="1" colspan="1">Notice Description</th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<?php require_once 'includes/footer.php'; ?>
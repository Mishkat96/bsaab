<?php require_once 'includes/header.php';
$msg = '';
if (isset($_GET['type']) && $_GET['type'] == 'delete') {
    $id = $_GET['id'];
    $result = $obj->deleteData('members', array('id' => $id));
    if (!$result) {
        $msg = 'Successfuly deleted';
    } else {
        $msg = 'Failed to delete';
    }
}
?>

<div class="content-body" style="min-height: 1054px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">UI Management</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Members</a></li>
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
                            <h4 class="card-title">Members List</h4>
                            <a href="add-members.php"><button class="btn btn-primary">Add members</button></a>
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
                                                        style="width: 199.641px;">IMAGE</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 199.641px;">NAME</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 199.641px;">ROLE</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 199.641px;">MESSAGE</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 199.641px;">SOCIAL LINKS</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 85.9844px;">ACTION</th>
                                            </thead>
                                            <tbody>


                                                </tr>
                                                <?php
                                                $data = $obj->getData('members');
                                                if (isset($data['0'])) {
                                                    $i = 1;
                                                    foreach ($data as $list) {
                                                        ?>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1"><?php echo $i ?></td>
                                                            <td>
                                                                <img src="assets/images/<?php echo $list['image'] ?>"
                                                                    height="50" width="50" alt="">
                                                            </td>
                                                            <td><?php echo $list['name'] ?></td>
                                                            <td><?php echo isset($list['role']) && $list['role'] == 0 ? 'Leadership' : 'advisors' ?>
                                                            </td>
                                                            <td><?php echo $list['msg'] ?></td>
                                                            <td>
                                                                <div class="card-link d-flex justify-content-around">
                                                                    <a href="<?php echo $list['twetlink'] ?>">
                                                                        <i class="fa-brands fa-twitter"></i>
                                                                    </a>
                                                                    <a href="<?php echo $list['linkedlink'] ?>">
                                                                        <i class="fa-brands fa-linkedin"></i>
                                                                    </a>
                                                                    <a href="<?php echo $list['instalink'] ?>">
                                                                        <i class="fa-brands fa-instagram"></i>
                                                                    </a>
                                                                    <a href="<?php echo $list['fblink'] ?>">
                                                                        <i class="fa-brands fa-facebook"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td><a
                                                                    href="add-members.php?type=edit&id=<?php echo $list['id'] ?>"><i
                                                                        class="icon-note menu-icon text-success "></a></i>
                                                                <a href="members.php?type=delete&id=<?php echo $list['id'] ?>"><i
                                                                        class="icon-trash menu-icon text-danger "></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr class="text-center">
                                                        <td>NO DATA </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">ID</th>
                                                    <th rowspan="1" colspan="1">Image</th>
                                                    <th rowspan="1" colspan="1">Name</th>
                                                    <th rowspan="1" colspan="1">Role </th>
                                                    <th rowspan="1" colspan="1">Message </th>
                                                    <th rowspan="1" colspan="1">Social Links </th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="DataTables_Table_0_previous"><a href="#"
                                                        aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                                        class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0"
                                                        class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0"
                                                        class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="DataTables_Table_0_next">
                                                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7"
                                                        tabindex="0" class="page-link">Next</a>
                                                </li>
                                            </ul>
                                        </div>
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
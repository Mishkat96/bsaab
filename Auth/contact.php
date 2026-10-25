<?php require_once 'includes/header.php';

$msg = '';
if (isset($_GET['type']) && $_GET['type'] == 'delete') {
    $id = $_GET['id'];
    $result = $obj->deleteData('contact', array('id' => $id));
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Form Management</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Contact</a></li>
            </ol>
        </div>
    </div>
    <?php
    if ($msg !== '') {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $msg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
    ?>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between " width="100%">
                            <h4 class="card-title">Contact List</h4>
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
                                                        aria-label="ID: activate to sort column descending"
                                                        style="width: 100px;">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Subject: activate to sort column ascending"
                                                        style="width: 150px;">Subject</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="First Name: activate to sort column ascending"
                                                        style="width: 150px;">First Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last Name: activate to sort column ascending"
                                                        style="width: 150px;">Last Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Phone: activate to sort column ascending"
                                                        style="width: 150px;">Phone</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Email: activate to sort column ascending"
                                                        style="width: 200px;">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="University: activate to sort column ascending"
                                                        style="width: 150px;">University</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Message: activate to sort column ascending"
                                                        style="width: 200px;">Message</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 100px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Example row -->
                                                <?php
                                                $data = $obj->getData('contact');
                                                if (isset($data['0'])) {
                                                    $i = 1;
                                                    foreach ($data as $list) {
                                                        ?>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1"><?php echo $i ?></td>
                                                            <td><?php echo $list['subject'] ?></td>
                                                            <td><?php echo $list['fname'] ?></td>
                                                            <td><?php echo $list['lname'] ?></td>
                                                            <td><?php echo $list['phone'] ?></td>
                                                            <td><?php echo $list['email'] ?></td>
                                                            <td><?php echo $list['university'] ?></td>
                                                            <td><?php echo $list['message'] ?></td>
                                                            <td><a href="contact.php?type=delete&id=<?php echo $list['id'] ?>"><i
                                                                        class="icon-trash menu-icon text-danger"></i></a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">ID</th>
                                                    <th rowspan="1" colspan="1">Subject</th>
                                                    <th rowspan="1" colspan="1">First Name</th>
                                                    <th rowspan="1" colspan="1">Last Name</th>
                                                    <th rowspan="1" colspan="1">Phone</th>
                                                    <th rowspan="1" colspan="1">Email</th>
                                                    <th rowspan="1" colspan="1">University</th>
                                                    <th rowspan="1" colspan="1">Message</th>
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
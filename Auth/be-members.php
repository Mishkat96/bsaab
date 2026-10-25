<?php require_once 'includes/header.php';

$msg = '';
if (isset($_GET['type']) && $_GET['type'] == 'delete') {
    $id = $_GET['id'];
    $result = $obj->deleteData('bemember', array('id' => $id));
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Be members</a></li>
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
                            <h4 class="card-title">Members List</h4>
                        </div>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap4">
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
                                                        aria-label="Member Visa Type: activate to sort column ascending"
                                                        style="width: 150px;">IMAGE</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Given Name: activate to sort column ascending"
                                                        style="width: 150px;">Given Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Surname: activate to sort column ascending"
                                                        style="width: 150px;">Surname</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Father Name: activate to sort column ascending"
                                                        style="width: 150px;">Father Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Mother Name: activate to sort column ascending"
                                                        style="width: 150px;">Mother Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Date of Birth: activate to sort column ascending"
                                                        style="width: 150px;">Date of Birth</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Gender: activate to sort column ascending"
                                                        style="width: 150px;">Gender</th>
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
                                                        aria-label="Field of Study: activate to sort column ascending"
                                                        style="width: 150px;">Field of Study</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Types of Study: activate to sort column ascending"
                                                        style="width: 150px;">Types of Study</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Address: activate to sort column ascending"
                                                        style="width: 200px;">Address</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 100px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Example row -->
                                                <?php
                                                $data = $obj->getData('bemember');
                                                if (isset($data['0'])) {
                                                    $i = 1;
                                                    foreach ($data as $list) {
                                                        ?>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1"><?php echo $i; ?></td>
                                                            <td><img src="assets/images/<?php echo $list['image']; ?>"
                                                                    width="40" height="40" alt="">
                                                            </td>
                                      
                                                            <td><?php echo $list['given_name']; ?></td>
                                                            <td><?php echo $list['surname']; ?></td>
                                                            <td><?php echo $list['father_name']; ?></td>
                                                            <td><?php echo $list['mother_name']; ?></td>
                                                            <td><?php echo $list['dob']; ?></td>
                                                            <td><?php echo $list['gender']; ?></td>
                                                            <td><?php echo $list['phone']; ?></td>
                                                            <td><?php echo $list['email']; ?></td>
                                                            <td><?php echo $list['university']; ?></td>
                                                            <td><?php echo $list['field_of_study']; ?></td>
                                                            <td><?php echo $list['types_of_study']; ?></td>
                                                            <td><?php echo $list['address']; ?></td>
                                                            
                                                            <td><a
                                                                    href="be-members.php?type=delete&id=<?php echo $list['id']; ?>"><i
                                                                        class="icon-trash menu-icon text-danger"></i></a></td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Member Visa Type</th>
                                                    <th>Given Name</th>
                                                    <th>Surname</th>
                                                    <th>Father Name</th>
                                                    <th>Mother Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>University</th>
                                                    <th>Field of Study</th>
                                                    <th>Types of Study</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
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
</div>



<?php require_once 'includes/footer.php'; ?>
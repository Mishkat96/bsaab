<?php
require_once "includes/header.php";


?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Member</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?php
                            $data = $obj->getData('bemember');

                            // Check if $data is an array or Countable object
                            if (is_array($data) || $data instanceof Countable) {
                                // Output the count of the data
                                echo count($data);
                            } else {
                                // Handle cases where $data is not countable
                                echo "0";
                            }

                            ?></h2>
                            <p class="text-white mb-0"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Site Visitors</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?php
                            $data = $obj->getData('site_visitors');

                            // Check if $data is an array or Countable object
                            if (is_array($data) || $data instanceof Countable) {
                                // Output the count of the data
                                echo count($data);
                            } else {
                                // Handle cases where $data is not countable
                                echo "0";
                            }

                            ?></h2>
                            <p class="text-white mb-0"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Unique Site Visitors</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?php
                            // Get unique visitors count
                            // Example: Get unique visitors
                            $unique_visitors = $obj->getData('site_visitors', 'COUNT(DISTINCT ip_address) AS unique_visitors');

                            // Output the result
                            if ($unique_visitors) {
                                $unique_visitors_count = $unique_visitors[0]['unique_visitors'];
                                echo $unique_visitors_count;
                            } else {
                                echo "0";
                            }


                            ?></h2>
                            <p class="text-white mb-0"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<?php
require_once "includes/footer.php";
?>
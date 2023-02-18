<?php
include "header-inc.php";

if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "update") {
        $msg = "Record Updated Successfully";
    }
}
?>
<div id="navigation">
    <div class="container-fluid">
        <a href="#" id="brand">Administration</a>
        <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
        <?php include "top-inc.php"; ?>
    </div>
</div>
<div class="container-fluid" id="content">
<?php include "left-inc.php"; ?>
        <div id="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>All Customers</h1>
                    </div>
                    <div class="pull-right">
						<ul class="minitiles">
							<li class='green'>
								<a href="addCustomer.php" title="Add New"><i class="icon-plus"></i></a>
							</li>
						</ul>
					</div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="customers.php">Customers</a>
                        </li>
                    </ul>
                    <div class="close-bread">
                        <a href="#"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">

                        <?php if (isset($msg) && !empty($msg)) { ?>
                            <div class="alert alert-success" id="alert" >
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h5>
                                    <?php
                                    if (isset($msg)) {
                                        $msg = str_replace('%20', ' ', $msg);
                                        echo $msg;
                                    }
                                    ?>
                                </h5>
                            </div>
                        <?php } ?>
                        <div class="box box-color box-bordered">
                            <div class="box-title">
                                <h3>
                                    <i class="icon-table"></i>
                                    Customers
                                </h3>
                            </div>
                            <div class="box-content nopadding">


                                <table class="table table-nomargin dataTable table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        $sql_page = "SELECT * FROM customers ORDER BY customerNumber DESC";
                                        $res_pages = mysqli_query($connection, $sql_page) or die(mysqli_error($connection));
                                        if (mysqli_num_rows($res_pages) > 0) {
                                            while ($row_pages = mysqli_fetch_assoc($res_pages)) {
                                                $customerName = $row_pages['customerName'];
                                                $phone = $row_pages['phone'];
                                                $city = $row_pages['city'];
                                                $state = $row_pages['state'];
                                                $country = $row_pages['country'];
                                                $email = $row_pages['email'];
                                                
                                                $i++;
                                                ?>                                      
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td>   
                                                        <div class="btn-group">
                                                            <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
                                                                <i class="icon-cog"></i> <span class="caret"></span></a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="editCustomer.php?ID=<?= $row_pages['customerNumber']; ?>" >Edit</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>                                                
                                                    <td><?= $customerName; ?></td>
                                                    <td><?= $email; ?></td>
                                                    <td><?= $phone; ?></td>
                                                    <td><?= $city; ?></td>
                                                    <td><?= $state; ?></td>
                                                    <td><?= $country; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>           

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>					
                </div>
                <div class="row-fluid">
                    <div class="span6">

                    </div>
                    <div class="span6">

                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">

                    </div>
                    <div class="span6">

                    </div>
                </div>
            </div>
        </div>            
</div>
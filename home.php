<?php
ob_start();
include "header-inc.php";
?>
<div id="navigation">
  <div class="container-fluid"> <a href="index.php" id="brand">Administration</a> <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
    <?php include "top-inc.php"; ?>
  </div>
</div>
<div class="container-fluid" id="content">
  <?php include "left-inc.php"; ?>
  <div id="main">
    <div class="container-fluid">
      <div class="page-header">
        <div class="pull-left">
          <h1>Dashboard</h1>
        </div>
        <div class="pull-right">
        </div>
      </div>
      <div class="breadcrumbs">
        <ul>
          <li> <a href="index.php">Home</a> <i class="icon-angle-right"></i> </li>
        </ul>
        <div class="close-bread"> <a href="#"><i class="icon-remove"></i></a> </div>
      </div>

      <!-- TILES -->
      <div class="row-fluid">
        <div class="span6">
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-file-alt"></i>CUSTOMER MANAGEMENT</h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="orange high long"> <a href="<?php echo BASEURL;?>customers.php"><span><i class="glyphicon-user"></i></span><span class='name' style="text-align:center">All Customers</span></a> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="span6">
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-file-alt"></i>REPORT</h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="purple long"> <a target="_blank" href="<?php echo BASEURL;?>orders.php"><span><i class="icon-list-ol"></i></span><span class='name' style="text-align:center">All Orders</span></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!--
	  <div class="row-fluid">
        <div class="span12">
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-table"></i> Certification</h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="red high long"> <a href="<?php echo BASEURL;?>certificates.php" target="_blank"><span><i class="icon-list-ol"></i></span><span class='name' style="text-align:center">Certification</span></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span6">
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-search"></i> Schools </h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="blue long"> <a href="<?php echo BASEURL;?>schools.php"><span><i class="glyphicon-home"></i></span><span class='name' style="text-align:center">Schools</span></a> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="span6">
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-search"></i> Products </h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="magenta"> <a href="<?php echo BASEURL;?>products.php"><span><i class="glyphicon-note"></i></span><span class='name' style="text-align:center">Products</span></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-file-alt"></i>Reports</h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="red high long"> <a href="<?php echo BASEURL;?>reports.php"><span><i class="icon-eye-open"></i></span><span class='name' style="text-align:center">Reports</span></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span6">
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-table"></i> Manage </h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="green high long"> <a href="<?php echo BASEURL;?>emails.php"><span><i class="icon-cogs"></i></span><span class='name' style="text-align:center">Emails</span></a> </li>
              </ul>
            </div>
          </div>
          </div>
          <div class="span6">
		  <div class="box">
            <div class="box-title">
              <h3> <i class="icon-table"></i> Training Materials </h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="red long high"> <a href="<?php echo BASEURL;?>trainingMaterials.php"><span><i class="icon-dashboard"></i></span><span class='name' style="text-align:center">Training Materials</span></a> </li>

              </ul>
            </div>
          </div>

        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-plus-sign-alt"></i> Additional Products </h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="red long"> <a href="<?php echo BASEURL;?>additionalProducts.php"><span><i class="icon-money"></i></span><span class='name' style="text-align:center">New Products</span></a> </li>
              </ul>
            </div>
          </div>
          <div class="box">
            <div class="box-title">
              <h3> <i class="icon-search"></i> Other </h3>
            </div>
            <div class="box-content">
              <ul class="tiles">
                <li class="blue long"> <a href="<?php echo BASEURL;?>todo.php"><span><i class="icon-pencil"></i></span><span class='name' style="text-align:center">To Do List</span></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      -->

      <!-- END -->

    </div>

    <!------------------------ END ------------------------->
  </div>
</div>

<?php include 'footer-inc.php';?>
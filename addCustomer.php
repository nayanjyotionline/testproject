<?php include "header-inc.php";

$msg = '';

if(@$_POST['email']){
    
    $error = 0;
    $sql = "SELECT * FROM customers WHERE email = '".$_POST['email']."'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));   
    if(mysqli_num_rows($result)>0){
        $error = 1;
        $msg = "Email already exists with different account";
    } 
    
    if($error == 0){
        $sql = "INSERT INTO customers SET email = '".mysqli_real_escape_string($connection, $_POST['email'])."', customerName = '".mysqli_real_escape_string($connection, $_POST['customerName'])."', phone = '".mysqli_real_escape_string($connection, $_POST['phone'])."', city = '".mysqli_real_escape_string($connection, $_POST['city'])."', state = '".mysqli_real_escape_string($connection, $_POST['state'])."', country = '".mysqli_real_escape_string($connection, $_POST['country'])."'";      
        //echo $sql;
        mysqli_query($connection, $sql) or die(mysqli_error($connection));     
        
        $msg = "Changes saved";
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
                    <h1>Add Customer</h1>
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
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Add Customer</a>
                    </li>
                </ul>

                <div class="close-bread">
                    <a href="#"><i class="icon-remove"></i></a>
                </div>
            </div>
            
            <?php if ($msg) { ?>
                <div class="row-fluid">
                    <div class="span12">
                        <br>
                        <div class="alert alert-success">
                            <?php echo $msg;?>
                        </div>                    
                    </div>
                </div>
            <?php } ?> 
            
            <div class="row-fluid">
                <div class="span12">
                    <form action="" method="POST" class='form-horizontal form-bordered form-validate' id="bb" enctype="multipart/form-data">
                        
                        <div class="box box-bordered box-color">
                            <div class="box-title">
                                <h3><i class="icon-th-list"></i>Customer Information</h3>
                            </div>
                            <div class="box-content nopadding">

                                <div class="control-group">
                                    <label for="textfield" class="control-label">Email Address</label>
                                    <div class="controls">
                                        <input type="email" name="email" id="email" class="input-xlarge" value="" data-rule-required="true" data-rule-minlength="2" placeholder="Email Address">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label for="textfield" class="control-label">Name</label>
                                    <div class="controls">
                                        <input type="text" name="customerName" id="customerName" class="input-xlarge" value="" data-rule-required="true" data-rule-minlength="2" placeholder="Name">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label for="textfield" class="control-label">Phone</label>
                                    <div class="controls">
                                        <input type="text" name="phone" id="phone" class="input-xlarge" value="" data-rule-required="true" data-rule-minlength="2" placeholder="Phone">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label for="textfield" class="control-label">City</label>
                                    <div class="controls">
                                        <input type="text" name="city" id="city" class="input-xlarge" value="" data-rule-required="true" data-rule-minlength="2" placeholder="City">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label for="textfield" class="control-label">State</label>
                                    <div class="controls">
                                        <input type="text" name="state" id="state" class="input-xlarge" value="" data-rule-required="true" data-rule-minlength="2" placeholder="State">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label for="textfield" class="control-label">Country</label>
                                    <div class="controls">
                                        <input type="text" name="country" id="country" class="input-xlarge" value="" data-rule-required="true" data-rule-minlength="2" placeholder="Country">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button onClick="window.location='pages.php'" type="button" class="btn">Cancel</button>
                                </div>       
                                
                            </div>
                        </div>
                        
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer-inc.php';?>
<?php
ob_start();
include "header-login-inc.php";

function setClientSession(){
    $clientSession = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                        mt_rand( 0, 0xffff ),
                        mt_rand( 0, 0x0C2f ) | 0x4000,
                        mt_rand( 0, 0x3fff ) | 0x8000,
                        mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
                    );
    return $clientSession;
}

$msg = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email = '". mysqli_real_escape_string($connection, $email)."' AND password = '". mysqli_real_escape_string($connection, md5($password))."' AND active = 'Y'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $adminSession = 'Admin-'.setClientSession();
        $md5Email = md5($row['email']);
        $update = "UPDATE admin SET sessionID = '".$adminSession."', md5Email = '".$md5Email."' WHERE id = '".$row['id']."'";
        mysqli_query($connection, $update) or die(mysqli_error($connection));
        $_SESSION["adminSession"] = $adminSession;
        $_SESSION["adminEmail"] = $md5Email;
        header('Location: home.php');
    } else {
        $msg = 'Invalid email id or password';
    }
}
?>
<div class="wrapper">
    <h1 style="text-align: center;"><img src="img/logo.gif" alt="" class='retina-ready' width="59" height="49"></h1>
    <h3 style="color: #ffffff; font-size: 19px; text-align: center;">Test Project</h3>
    <div class="login-body">
        <h4 style="text-align: center; font-size: 14px; padding-top: 10px;"><?php echo $msg;?></h4>
        <h2 style="padding-top: 0px;">SIGN IN</h2>        
        <form action="" method='post' class='form-validate' id="test">
            <div class="control-group">
                <div class="email controls">
                    <input type="text" name='email' placeholder="Email address" class='input-block-level' data-rule-required="true" data-rule-email="true">
                </div>
            </div>
            <div class="control-group">
                <div class="pw controls">
                    <input type="password" name="password" placeholder="Password" class='input-block-level' data-rule-required="true">
                </div>
            </div>
            <div class="submit">
                <div class="remember">
                    <input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>
                </div>
                <input type="submit" value="Sign me in" class='btn btn-primary'>
            </div>
        </form>
        <div class="forget">
            <!--<a href="#"><span>Forgot password?</span></a>-->
            &nbsp;
        </div>

    </div>
</div>

<?php include 'footer-inc.php';?>
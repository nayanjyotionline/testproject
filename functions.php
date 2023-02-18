<?php

    function getProductAccessLog($user_id, $product_id, $connection){
        $disp = '';
        $sql = "SELECT *, pal.creation_time AS cTime FROM product_access_log pal, file f WHERE pal.file_id = f.file_id AND pal.user_id = '".$user_id."' AND pal.product_id = '".$product_id."' ORDER BY cTime DESC";
        $result_product = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if(mysqli_num_rows($result_product)>0){
            while($rowProduct = mysqli_fetch_assoc($result_product)){
                $disp .= '<tr>
                            <td>'.$rowProduct['name'].'</td>
                            <td>'.date("F j, Y" ,strtotime($rowProduct['cTime'])).'</td>
                            <td>'.date("h:i:s a",strtotime($rowProduct['cTime'])).'</td>
                            <td>'.$rowProduct['ip_address'].'</td>
                         </tr>';
            }
        }

        return $disp;
    }

    function getUserSchool($user_id, $connection){
        $disp = '';
        $sql = "SELECT * FROM user_school us, school s WHERE us.school_id = s.school_id AND us.user_id = '".$user_id."'";
        $result_school = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if(mysqli_num_rows($result_school)>0){
            while($row_school = mysqli_fetch_assoc($result_school)){
                //$disp .=  '<a href="/training/profile/schools/edit?school_id='.$row_school['school_id'].'">'.$row_school['name'].'</a>';

                $expired = '';
                $sql1 = "SELECT * FROM transaction t, product p WHERE t.product_id = p.product_id AND t.school_id = '".$row_school['school_id']."' AND t.end_time >= '".date("Y-m-d H:i:s")."' AND t.record_status = 'A'";
                $result_transaction = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
                if(mysqli_num_rows($result_transaction) == 0){
                    $expired= '(EXPIRED)';
                }

                if($_SESSION['sysadmin'] == 1){                            
                    $disp .=  '<a href="/training/profile/schools/edit?school_id='.$row_school['school_id'].'">'.$row_school['name'].'</a>';

                } else if($row_school['master_flag'] == 1){
                    //$disp .=  '<a href="/training/profile/schools/edit?school_id='.$row_school['school_id'].'">'.$row_school['name'].'</a>';
                    $disp .=  $row_school['name'];
                } else {
                    $disp .=  $row_school['name'];
                }

                if($row_school['master_flag'] == 1){
                    $disp .= '&nbsp;<img src="/image/icon_m.png" width="12" height="12" alt="Master User" title="Master User" />';
                }
                if($row_school['contact_flag'] == 1){
                    $disp .= '&nbsp;<img src="/image/icon_c.png" width="12" height="12" alt="Primary User" title="Primary User" />';
                }
                if($expired){
                    $disp .= '<br />'.$expired.'<br />';
                } else {
                    $disp .= '<br />';
                }

            }
        }
        return $disp;
    }
    
    function getUserSchoolShort($user_id, $connection){
        $disp = '';
        $school_id = '';
        $sql = "SELECT * FROM user_school us, school s WHERE us.school_id = s.school_id AND us.user_id = '".$user_id."'";
        $result_school = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if(mysqli_num_rows($result_school)>0){
            while($row_school = mysqli_fetch_assoc($result_school)){

                $school_id .= $row_school['school_id'].',';
                $disp .=  $row_school['name'];
                if($row_school['master_flag'] == 1){
                    $disp .= '&nbsp;<img src="/image/icon_m.png" width="12" height="12" alt="Master User" title="Master User" />';
                }
                if($row_school['contact_flag'] == 1){
                    $disp .= '&nbsp;<img src="/image/icon_c.png" width="12" height="12" alt="Primary User" title="Primary User" />';
                }
                $disp .= '<br />';
            }
        }
        $school_id = rtrim($school_id, ",");
        return $disp.'|'.$school_id;
    }

    function isProductActive($school_id, $product_id, $connection){
        $sql = "SELECT * FROM transaction WHERE school_id = '".$school_id."' AND product_id = '".$product_id."' AND end_time > NOW()";
        $result_product = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if(mysqli_num_rows($result_product)>0){
            return true;
        } else {
            return false;
        }
    }
    
?>
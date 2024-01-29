<?php
include("secure.php");

if(isset($_POST['pass_but']) && isset($_SESSION['username'])) {
    $phoneNoArray = $_POST['phoneNo'];
    $dobArray = $_POST['dob'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $mobile_flag = false;
    $pax = $_POST['pax'];
    $mob_len = count($_POST['phoneNo']);
    for($i=0;$i<$mob_len;$i++) {
        if(strlen($_POST['phoneNo'][$i]) !== 10) {
            $mobile_flag = true;
            break;            
        }
    }
    if($mobile_flag) {
        header('Location: pass_form.php?error=moblen');
        exit();         
    }
    $date_len = count($_POST['dob']);
    for($i=0;$i<$date_len;$i++) {        
        $date_mnth = (int)substr($_POST['dob'][$i],5,2);
        $flag = false;
        if($date_mnth > (int)date('m')){
          $flag = true;
        } else if($date_mnth == (int)date('m')){
          if((int)substr($_POST['dob'][$i],8,2) >= (int)date('d')) {
            $flag = true;            
          } 
        }  
    /*    if($flag) {
            header('Location: pass_form.php?error=invdate');
            exit();    
            break;
        }     */
    }
    $stmt = mysqli_stmt_init($con);
    $sql = 'SELECT * FROM passenger_profile';
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header('Location: pass_form.php?error=sqlerror');
        exit();
    }else {
/*        mysqli_stmt_bind_param($stmt,'i', $row['trainID']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $flag = false;
        while ($row = mysqli_fetch_assoc($result)) {
            $pass_id=$row['passenger_id'];
        }
    } 
    if(is_null($pass_id)) { */
        $pass_id = 0;
        $trainID = 0;
        $stmt = mysqli_stmt_init($con);
        $sql = 'ALTER TABLE passenger_profile AUTO_INCREMENT = 1 ';
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header('Location: pass_form.php?error=sqlerror');
            exit();            
        } else {         
            mysqli_stmt_execute($stmt);
        }        
    }
    $stmt = mysqli_stmt_init($con);
    $flag = false;
    $sql = 'INSERT INTO passenger_profile (firstname,lastname,phoneNo,dob) VALUES (?,?,?,?)';          
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header('Location: pass_form.php?error=sqlerror');
            exit();          
        } else {
            for ($i = 0; $i < count($phoneNoArray); $i++) {
                mysqli_stmt_bind_param($stmt, 'ssis', $firstname, $lastname, $phoneNoArray[$i], $dobArray[$i]);                            
                mysqli_stmt_execute($stmt);  
            $flag = true;        
        }
    if($flag) {
        $_SESSION['pass_id'] = $pass_id+1;
        header('Location: payment.php');
        exit();          
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);    
    }
}} else {
    header('Location: pass_form.php');
    exit();  
}
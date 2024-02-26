<?php
    // require_once '../../connection.php';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nbscedup_nbscv2";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

     $servername2 = "localhost";
    $username2 = "root";
    $password2 = "";
    $dbname2 = "nbscedup_nbscsms";
    try {
        $connSMS = new PDO("mysql:host=$servername2;dbname=$dbname2;charset=utf8mb4", $username2, $password2);
        $connSMS->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    


    $email = $_POST['email'];
    $pass =  sha1($_POST['pass']);

    $selectQry = $conn->prepare("SELECT count(personelId) as cnt,personelId,email,`password`,isActive,instructor_id
        FROM tblpersonnel2  WHERE email = ? AND `password` = ?");
    $selectQry->execute([$email, $pass]);
    $selectQry = $selectQry->fetch();

    // $encoded = base64_encode($string);
    // $decoded = base64_decode($encoded);
    
    if($selectQry['cnt'] > 0 && $selectQry['email'] == $email && $selectQry['password'] == $pass){
        if($selectQry['isActive'] == 0){
            echo 'Integrated System account is deactivated';
            exit();
        }
        session_start();
        $_SESSION['nbscisuserid'] = base64_encode($selectQry['personelId']);
        if ($selectQry['instructor_id'] != NULL) {
            $_SESSION['nbscisfacultyid'] = base64_encode($selectQry['instructor_id']);
        }
        echo 'success';
    }else{
        $selInstructureAccount = $connSMS->prepare("SELECT count(a.instructor_id) as cnt, a.instructor_id, a.ins_username, aes_decrypt(a.ins_password , 'nbccsms') as `password`,ins_status  
            FROM tbl_instructor a
            where a.ins_username = ? and aes_decrypt(a.ins_password , 'nbccsms') = ?");
        $selInstructureAccount->execute([$email, $_POST['pass']]);
        $selInstructureAccount = $selInstructureAccount->fetch();
    
        if($selInstructureAccount['cnt'] > 0 && $selInstructureAccount['ins_username'] == $email && $selInstructureAccount['password'] == $_POST['pass']){
            if($selInstructureAccount['ins_status'] != 'Active'){
                echo 'Faculty Portal account is deactivated';
                exit();
            }
            session_start();
            $_SESSION['nbscisfacultyid'] = base64_encode($selInstructureAccount['instructor_id']);
            echo 'success';
        }else{
            echo 'Invalid email/password';
        }
    }
?>
<?php
$email = filter_input(INPUT_POST,'email');
$pword = filter_input(INPUT_POST,'pword');


$conn = new mysqli("localhost", "root", "","final");
if($conn->connect_error) {
    die("Invalid email or Password : ".$conn->connect_error);    
}
else{
    $stmt = $conn->prepare("select * from dfile where email = ?");
    $stmt->blind_param("s",$_post['email']);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['pword'] === $pword) {
            echo "Login Successfully";
        }
        else{
            echo "Invalid Email or password";
        }
    }else{
        echo "Invalid email or password";
    }
}
?>

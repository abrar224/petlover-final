<?php 

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

    $date = validate($_POST['date']);
	$address = validate($_POST['address']);
    $status = validate($_POST['status']);
	$email = validate($_POST['email']);
    $transaction = validate($_POST['transaction']);
   

	$user_data ='&date='.$date.'&email='.$email.'&status='.$status.'&email='.$email.'&transaction='.$transaction;

	if (empty($date)) {
		header("Location: ../support.php?error=Name is required&$user_data");
        
	}
    else if (empty($address)) {
		header("Location: ../support.php?error=Address is required&$user_data");
	}
    else if (empty($status)) {
		header("Location: ../support.php?error=Organization is required&$user_data");
	}
    else if (empty($email)) {
		header("Location: ../support.php?error=Subject is required&$user_data");
	}
    else if (empty($transaction)) {
		header("Location: ../support.php?error=Message is required&$user_data");
	}
    else {

       $sql = "INSERT INTO support(date,address,status,email,transaction) 
               VALUES('$date','$address','$status','$email','$transaction')";
        
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../user_support.php?success=successfully created");
       }else {
          header("Location: ../support.php?error=unknown error occurred&$user_data");
       }
	}

}
?>
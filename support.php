<!DOCTYPE html>
<html>

<head>
    <title>Support</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h1>Support</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row mb-5">
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="text">
                                    <p><span>Address:</span> United City, Madani Avenue,  Badda, Dhaka 1212, Bangladesh.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="text">
                                    <p><span>Phone:</span> <a href="tel://1234567920">+8801914001470</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-paper-plane"></span>
                                </div>
                                <div class="text">
                                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@petlover.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-globe"></span>
                                </div>
                                <div class="text">
                                    <p><span>Website</span> <a href="#">petlover.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Emergency Contact</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <div id="form-message-success" class="mb-4">
                                    Your message was sent, thank you!
                                </div>



                                <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET['error']; ?>
                                </div>
                                <?php } ?>





                                <form action="php/create.php" method="post">

                                   
                                    <hr><br>
                                    <?php if (isset($_GET['error'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_GET['error']; ?>
                                    </div>
                                    <?php } ?>


                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" id="date" name="date" value="<?php if(isset($_GET['date']))
		                           echo($_GET['date']); ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="address">Name</label>
                                        <input type="address" class="form-control" id="address" name="address" value="<?php if(isset($_GET['address']))
		                           echo($_GET['address']); ?>" placeholder="Enter name">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Organization Name</label>
                                        <input type="status" class="form-control" id="status" name="status" value="<?php if(isset($_GET['status']))
		                           echo($_GET['status']); ?>" placeholder="Enter organization name">
                                    </div>


                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_GET['email']))
		                           echo($_GET['email']); ?>" placeholder="Enter email">
                                    </div>


                                    <div class="form-group">
                                        <label for="transaction">Message</label>
                                        <textarea type="transaction" class="form-control" id="transaction" name="transaction" value="<?php if(isset($_GET['transaction']))
    echo($_GET['transaction']); ?>" placeholder="Write something...." rows="3"></textarea>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary" name="create">Send Message</button>
                                    </div>

                                </form>








                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5 img" style="background-image: url(images/img.jpg);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>


<?php 

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $organization_name = validate($_POST['organization_name']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);
   

	$user_data ='&name='.$name.'&email='.$email.'&organization_name='.$organization_name.'&subject='.$subject.'&message='.$message;

	if (empty($name)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	}else if (empty($email)) {
		header("Location: ../index.php?error=Email is required&$user_data");
	}else if (empty($organization_name)) {
		header("Location: ../index.php?error=Organization Name is required&$user_data");
	}else if (empty($subject)) {
		header("Location: ../index.php?error=Subject is required&$user_data");
	}else if (empty($message)) {
		header("Location: ../index.php?error=Message is required&$user_data");
	}else {

       $sql = "INSERT INTO support(name,email,organization_name,subject,message) 
               VALUES('$name','$email','$organization_name','$subject','$message')";
        
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully created");
       }else {
          header("Location: ../index.php?error=unknown error occurred&$user_data");
       }
	}

}

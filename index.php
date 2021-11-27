<?php 
ob_start();
include "connection.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Registration Form</title>
  </head>
  <body>


      <section class="mainpart">
        <div class="container py-5 ">
          <div class="col-lg-10 m-auto">
            <div class="row background align-items-center">
              <div class="col-lg-3">
                <div class="welcome">
                  <img src="img_349207.png" alt="register" class="img-fluid">
                  <h2>Welcome</h2>
                  <p>Please fill all details carefully. This form can change your life.</p>
                  <a href="display.php" target="0">Check Form</a>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="inner-form">
                  <h2>App for Web Developer Post</h2>
                  <form class="row" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="enter your name*" class="form-control mb-2" required value="">

                    <input type="text" name="degree" placeholder="enter your qualification*" class="form-control mb-2" required value="">

                    <input type="text" name="mobile" placeholder="enter your number*" class="form-control mb-2" required value="">

                    <input type="text" name="email" placeholder="enter your email*" class="form-control mb-2" required value="">

                    <input type="text" name="refer" placeholder="reference*" class="form-control mb-2" required value="">

                    <input type="text" name="jobpost" placeholder="Web Developer" class="form-control mb-2" required/ value="Web Developer" value="">

                    <input type="file" name="file" placeholder="Your Image" class="form-control">
                    
                    <input type="submit" name="submit" value="Register" class="btn form-control">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="time">
        <div class="container">
      <h6>
        <?php
        $timezone = date_default_timezone_set("Asia/Dhaka");
        $date =  date("d/m/Y");
        $time = date("h:i a");
        echo "$date <br/> $time GMT+6";
        ?>
      </h6>
        </div>

      </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php

    if (isset($_POST['submit'])) {
      $name          = mysqli_real_escape_string($connect,$_POST['name']) ;
      $degree        = mysqli_real_escape_string($connect,$_POST['degree']) ;
      $mobile        = mysqli_real_escape_string($connect,$_POST['mobile']) ;
      $email         = mysqli_real_escape_string($connect,$_POST['email']) ;
      $refer         = mysqli_real_escape_string($connect,$_POST['refer']) ;
      $jobpost       = mysqli_real_escape_string($connect,$_POST['jobpost']) ;
      $file          = $_FILES['file'] ;

      $fileName = $file['name'];
      $filePath = $file['tmp_name'];
      $fileError = $file['error'];



      if ($fileError == 0) {

        $destinationFile = 'image/'.$fileName ;
        move_uploaded_file($filePath, $destinationFile);

      $insert = "INSERT INTO `register`(`name`, `degree`, `mobile`, `email`, `refer`, `jobpost`, `file`) VALUES ('$name ','$degree','$mobile','$email','$refer','$jobpost', '$destinationFile')";

      $inserted = mysqli_query($connect,$insert);
        ?>
        <script>
          alert('data inserted successfully');
        </script>
        <?php
      }else{
        ?>
        <script>
          alert('data inserted failed');
        </script>
        <?php
      }
    }

?>
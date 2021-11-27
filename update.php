<?php include "connection.php"; ?>
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



                  <form class="row" method="POST" action="">


            <?php

              $ids = $_GET['id'];

              $showquery = "SELECT * FROM `register` WHERE id={$ids}";

              $showdata = mysqli_query($connect,$showquery);

              $datasubmit = mysqli_fetch_array($showdata);

              

              if (isset($_POST['submit'])) {
                $idupdate      = $_GET['id'];
                $name          = mysqli_real_escape_string($connection,$_POST['name']) ;
                $degree        = mysqli_real_escape_string($connection,$_POST['degree']) ;
                $mobile        = mysqli_real_escape_string($connection,$_POST['mobile']) ;
                $email         = mysqli_real_escape_string($connection,$_POST['email']) ;
                $refer         = mysqli_real_escape_string($connection,$_POST['refer']) ;
                $jobpost       = mysqli_real_escape_string($connection,$_POST['jobpost']) ;
                $file          = $_FILES['file'] ;

                $fileName = $file['name'];
                $filePath = $file['tmp_name'];
                $fileError = $file['error'];


                $update = "UPDATE `register` SET `id`='$idupdate',`name`='$name',`degree`='$degree',`mobile`='$mobile',`email`='$email',`refer`='$refer',`jobpost`='$jobpost' `file`= '$file' WHERE id=$idupdate";

                $inserted = mysqli_query($connect,$update);

                if ($inserted) {
                  ?>
                  <script>
                    alert('data updated successfully');
                  </script>
                  <?php
                }else{
                  ?>
                  <script>
                    alert('data updated failed');
                  </script>
                  <?php
                }
              }

          ?>


                    <input type="text" name="name" placeholder="enter your name*" class="form-control mb-2" required value="<?php echo $datasubmit['name']; ?>">

                    <input type="text" name="degree" placeholder="enter your qualification*" class="form-control mb-2" required value="<?php echo $datasubmit['degree']; ?>">

                    <input type="text" name="mobile" placeholder="enter your number*" class="form-control mb-2" required value="<?php echo $datasubmit['mobile']; ?>">

                    <input type="text" name="email" placeholder="enter your email*" class="form-control mb-2" required value="<?php echo $datasubmit['email']; ?>">

                    <input type="text" name="refer" placeholder="reference*" class="form-control mb-2" required value="<?php echo $datasubmit['refer']; ?>">

                    <input type="text" name="jobpost" placeholder="Web Developer" class="form-control mb-2" required/ value="Web Developer" value="<?php echo $datasubmit['jobpost']; ?>">

                    <input type="file" name="file" placeholder="Your Image" class="form-control mb-2" required value="<?php echo $datasubmit['file']; ?>">

                    <input type="submit" name="submit" value="UPDATE" class="btn">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>


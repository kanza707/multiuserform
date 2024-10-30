<?php
include_once('connection.php');

?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <title>Hello, world!</title>
</head>

<body>
  <?php

  $show_query = "SELECT * FROM `dataa` WHERE `role` != 'admin' ";
  $sq = mysqli_query($con, $show_query);
  if (mysqli_num_rows($sq)) { ?>




    <div class="container login-container">
      <div class="row">
        <div class="col-md-6 login-form-1">
          <h3 class="bg-primary  text-white"> REGISTER FORM</h3>

          <form action="query.php" method="post">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Your name *" value="" required />
            </div>
            <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="pass" placeholder="Your Password *" value="" />
            </div>
            <div class="form-grxoup">



              <select name="select" id="" class="form-control " required>
                <option selected disabled>select ocuption</option>
                <?php while ($row = mysqli_fetch_assoc($sq)) { ?>

                  <option value="<?php echo $row['role_id'] ?>" required><?php echo $row['role  ']  ?></option>
                <?php    }   ?>
              </select>

            </div>
            <div class="form-group">
              <input type="submit" name="register" class="btnSubmit mt-5" value="register" />
            </div>

          </form>
          <?php

          if (isset($_GET['message'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><?php echo $_GET['message'];   ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          } elseif (isset($_GET['failed'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><?php echo $_GET['failed'];   ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php

          } elseif (isset($_GET['warn'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><?php echo $_GET['warn'];   ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php  }
          ?>


        </div>
      <?php  } ?>
      <div class="col-md-6 login-form-2 ">
        <h3 class="bg-white text-primary "> login FORM</h3>
        <form action="login.php" method="post">
          <div class="form-group mt-5">
            <input type="text" name="lemail" class="form-control" placeholder="Your Email *" value="" />
          </div>
          <div class="form-group mt-5">
            <input type="password" name="lpass" class="form-control" placeholder="Your Password *" value="" />
          </div>
          <div class="form-group mt-5">
            <input type="submit" name="login" class="btnSubmit" value="Login" />
          </div>
          <?php
          if (isset($_GET['invalid'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><?php echo $_GET['invalid'];   ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php  }
          ?>






        </form>
      </div>
      </div>
    </div>


    <?php
    session_start();
    if (isset($_REQUEST['login'])) {
      $lemail = $_REQUEST['lemail'];
      $lpass = $_REQUEST['lpass'];
      $lquery = "SELECT * FROM `registration` WHERE `email` = '$lemail' AND `pass` = '$lpass'";

      $res = mysqli_query($con, $lquery);
      $row = mysqli_fetch_assoc($res);

      if (!empty($row)) {
        if ($row['role_id'] == 1) {
          $_SESSION['email'] = $row['email'];
          $_SESSION['name'] = $row['name'];
          header('location: admin.php');
        } elseif ($row['role_id'] == 2) {
          $_SESSION['email'] = $row['email'];
          $_SESSION['name'] = $row['name'];
          header('location: teacher.php');
        } elseif ($row['role_id'] == 3) {
          $_SESSION['email'] = $row['email'];
          $_SESSION['name'] = $row['name'];
          header('location: student.php');
        } else {
          header('location: login.php?invalid=invalid credational ');
        }
      }
    }

    echo"<pre>";
    print_r($_SESSION );
    echo"</pre>";






    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


</body>

</html>
<?php
/* VinayGawade: 09-09-2021 ->check that cookie set or not<- */
if(!isset($_COOKIE['signInUser'])):
  header( "Location:./ " );
endif;

include './includes/helper.php';

$query = new runQuery();
# ->fetch signed in users data from database<-
$data = $query->selectAllQuery('users','id, userFullName, userEmailId',$_COOKIE['signInUser']);
# ->set current user;s id in cookie<-
setcookie('signInUserId', $data[0]['id'], time() + 600, "/");
?>
  <link rel="icon" href="./assets/img/favicon.ico" sizes="any" type="image/icon">
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="System's dashboard page where you can see own account and update it.">
  <meta name="keywords" content="login,signup,user,email,profile,password,dashoard">
  <meta name="author" content="Vinay-Gawade">
  <meta name="robots" content="index,follow">

  <!-- Title &  Icon -->
  <link rel="icon" href="./assets/img/favicon.ico" sizes="any" type="image/icon">
  <title>Dashboard Page</title>

  <!-- Bootstrap CSS JS JQuery -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
  <nav class="container-fluid navbar d-flex bg-primary align-items-baseline">
    <div class="navbar-brand text-white fs-2">Dashboard <span class="text-small fs-6">(AJAX Version)</span></div>
    <div class="justify-content-end">
      <form id="signOutForm" method="post">
      <span class="text-white">Hi <?php echo explode("@",$_COOKIE['signInUser'])[0];?></span>
        <input type="hidden" name="task" value="SignOut">
        <button type="button" id="signOutBtn" class="btn btn-light" href="./index.html">Sign-Out</button>
      </form>
    </div>
  </nav>

  <section class="container-fluid m-0 p-3">
    <div class="row">

    <div class="col-md-6">
        <div class="card p-0 my-3">
          <div class="card-header text-center">
            <div class="text-dark fs-3">Change Password Here</div>
          </div>
          <div class="card-body">
            <form id="UpdatePasswordForm" method="post">
          <input type="hidden" name="task" value="UpdatePassword">
              <div class="mb-3">
                <label for="currentPassword" class="form-label">Your Current Password :-</label>
                <input type="password" inputmode="passsword" class="form-control" name="currentPassword"
                  id="currentPassword" required>
              </div>
              <div class="mb-3">
                <label for="newPassword" class="form-label">Your new Password :-</label>
                <input type="password" inputmode="passsword" class="form-control" name="newPassword" id="userPassword"
                  required>
              </div>
              <div class="mb-3">
                <label for="newConfirmPassword" class="form-label">Confirm New Password :-</label>
                <input type="password" inputmode="passsword" class="form-control" name="newConfirmPassword"
                  id="userConfirmPassword" required>
                <div class="alert alert-light py-0 mb-0 mt-3" id='notice' role="alert"></div>
              </div>
              <div class="mt-4" id="dashboard">
                <button  type="button" id="UpdatePasswordBtn" class="btn btn-lg btn-primary w-100">Save</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">

          <div class="card p-0 my-3">
          <div class="card-header text-center">
            <div class="text-dark fs-3">Your Details Here</div>
          </div>
          <div class="card-body">
            <form action="./includes/do.php" method="post">
          <input type="hidden" name="task" value="UpdateName">
              <div class="mb-3">
                <label for="userFullName" class="form-label">Your Name :-</label>
                <input type="text" inputmode="text" class="form-control" value="<?php echo $data[0]['userFullName']; ?>" name="userFullName" id="userFullName"
                  required>
              </div>
              <div class="mb-3">
                <label for="userEmailId" class="form-label">Your Email address :-</label>
                <input type="email" inputmode="email" class="form-control" value="<?php echo $data[0]['userEmailId']; ?>" name="userEmailId" id="userEmailId" required>
                <div class="alert alert-light py-0 mb-0 mt-3" id='emailNotice' role="alert"></div>
              </div>
              <div class="mt-4" id="dashboardEmail">
                <button type="button" id="submitNameEmailBtn" class="btn btn-lg btn-primary w-100">Save</button>
              </div>
            </form>
          </div>

        </div>
          </div>
          <div class="col-md-12">
          <div class="card p-0 my-3">
          <div class="card-header text-center">
            <div class="text-dark fs-3">Your Logs Here</div>
          </div>
          <div class="card-body">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Status</th>
      <th scope="col">Timestamp</th>
    </tr>
  </thead>
  <tbody>
  <!-- Loop over the userLogs Table using select query method -->
    <?php $i=1;foreach($query->selectAllQuery('userLogs','*',$_COOKIE['signInUser']) as $row){ ?>
    <tr></tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $row['userStatus'];?></td>
      <td><?php echo $row['loggedUserTimeStamp'];?></td>
    </tr>
    <?php } ?>
    <!-- End Loop -->
    <tr>
  </tbody>
</table>
          </div>
        </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <footer class="bg-dark text-center text-white">
    <!-- Copyright -->
    <div class="text-center text-white p-3 m-0">
      © 2021 Copyright :-
      <a class="text-white" href="https://mdbootstrap.com/">something.com</a>
    </div>
    <!-- Copyright -->
  </footer>

  <!-- Separate Popper and Bootstrap JS -->
  <script src="./assets/js/ajax.js" charset="utf-8"></script>
  <script src="./assets/js/validation.js" charset="utf-8"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
    integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
    crossorigin="anonymous"></script>

</body>

</html>

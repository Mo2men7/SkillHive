<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sing in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<!-- sign in header  start-->
  <div class="container">
    <br><br>
    <div class="bg-light container p-3 border border-warning">
      <h1 class="text-center text-warning">Sign in</h1>
      <!-- sign in header  end-->

      <!-- sign in  form  start -->
      <form action="sign-in-recievereq.php" method="post">

        <div class="form-group">
          <label for="">email</label>
          <input type="email" class="form-control " placeholder="type your email" name="email" value="
        <?php
        if (isset($_REQUEST["email"])) {
          echo $_REQUEST["email"];
        }
        ?>">
        </div>
        <br>
        <div class="form-group">
          <label for="">password</label>
          <input type="password" class="form-control" placeholder="type your password" name="password">
        </div>
        <div>
          <?php
          if (isset($_REQUEST["error"])) {
            echo " <small class ='text-danger'> Make sure the email address and password you entered is correct.</small>";
          }
          ?>
        </div>
        <br>
        <button type="submit" class="btn btn-warning">Login</button>
    </div>
    </form>
  </div>
  <!-- sign in  form end-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
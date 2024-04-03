<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
      box-sizing: border-box;
    }

    body {
      background: #f6f5f7;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
      margin: -20px 0 50px;
    }

    h1 {
      font-weight: bold;
      margin: 0;
    }

    h2 {
      text-align: center;
    }

    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
    }

    span {
      font-size: 12px;
    }

    a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
    }

    button {
      border-radius: 20px;
      border: 1px solid #3498db;
      background-color: #3498db;
      color: #FFFFFF;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: transform 80ms ease-in;
    }

    button:active {
      transform: scale(0.95);
    }

    button:focus {
      outline: none;
    }

    button.ghost {
      background-color: transparent;
      border-color: #FFFFFF;
    }

    form {
      background-color: #FFFFFF;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }

    input {
      background-color: #eee;
      border: none;
      padding: 12px 15px;
      margin: 8px 0;
      width: 100%;
    }

    .container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
        0 10px 10px rgba(0, 0, 0, 0.22);
      position: relative;
      overflow: hidden;
      width: 70%;
      max-width: 100%;
      min-height: 80%;
    }

    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
      transform: translateX(100%);
    }

    .sign-up-container {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }

    @keyframes show {

      0%,
      49.99% {
        opacity: 0;
        z-index: 1;
      }

      50%,
      100% {
        opacity: 1;
        z-index: 5;
      }
    }

    .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }

    .container.right-panel-active .overlay-container {
      transform: translateX(-100%);
    }

    .overlay {
      background: linear-gradient(90deg, rgba(0, 116, 255, 1) 0%, rgba(33, 216, 255, 1) 100%);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #FFFFFF;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
      transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
      transform: translateX(0);
    }

    .overlay-right {
      right: 0;
      transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
      transform: translateX(20%);
    }

    .social-container {
      margin: 20px 0;
    }

    .social-container a {
      border: 1px solid #DDDDDD;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      height: 40px;
      width: 40px;
    }

    footer {
      background-color: #222;
      color: #fff;
      font-size: 14px;
      bottom: 0;
      position: fixed;
      left: 0;
      right: 0;
      text-align: center;
      z-index: 999;
    }

    footer p {
      margin: 10px 0;
    }

    footer i {
      color: red;
    }

    footer a {
      color: #3c97bf;
      text-decoration: none;
    }
    input[type="file"] {
  display: none;
}

.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}
    </style>
  </style>
</head>

<body>
  <!-- navbar start-->

  <!-- navbar end-->

  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <!-- sign up start-->
      <form action="storing.php" method="post" enctype="multipart/form-data" >

        <input type="text" id="job_title" name="job_title" placeholder="Job Title" />


        <div class="d-flex gap-2">
          <input type="text" id="firstName" name="firstname" placeholder="First Name" />
          <input type="text" id="lastName" name="lastname" placeholder="Last Name" />
        </div>

        <div class="d-flex gap-2">
          <div class="d-flex w-100 ">
            <select name="country" id="country" class="w-100" style="background-color: #eee;border: none;padding: 12px 35px; margin: 8px 0;width:100%">
              <option value="Egypt">Egypt</option>
              <option value="Palestine">Palestine</option>
              <option value="Yemen">Yemen</option>
              <option value="Sudan">Sudan</option>
              <option value="Jordan">Jordan</option>
              <option value="Saudi Arabia">Saudi Arabia</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="Tunisia">Tunisia</option>
              <option value="Algeria">Algeria</option>
            </select>
          </div>


          <div class=" d-flex align-items-center w-50 justify-content-between">
            <!-- <h6 class="mx-2">Gender: </h6> -->
            <div class="d-flex m-1 align-items-center ">
              <input class=" " type="radio" name="gender" id="maleGender" value="male" checked />
              <label class=" m-1 " for="maleGender">Male</label>
            </div>


            <div class="d-flex m-1 align-items-center ">
              <input class="" type="radio" name="gender" id="femaleGender" value="female" />
              <label class=" m-1" for="femaleGender">Female</label>
            </div>

          </div>
        </div>
        <div class="d-flex gap-2">
          <input type="text" id="Phone" name="phone" placeholder="Phone" class="" />
          <input type="text" id="Address" class="" placeholder="Address" name="address" />
        </div>
        <div class="d-flex gap-2">
          <input type="email" id="emailAddress" placeholder="Email" name="email" />
          <input type="date" name="date" class=" w-75">
        </div>
        <div class="d-flex gap-2">
          <input type="text" id="username" name="username" placeholder="Username" class="" />
          <input type="password" id="password" class="" placeholder="Password" name="password" />
        </div>


        <div class="d-flex justify-content-between">
          <label for="file" class="me-2 custom-file-upload">
            <i class="fa-solid fa-upload" style="color: #3498db"></i> picture
          </label>

          <input class="custom-file-upload" type="file" id="file" name="file" required style="width:20vw">
          <button  type="submit" name="sumbit" value="submit">Sign Up</button>
        </div>
      </form>
      <!-- sign up end-->
    </div>

    <div class="form-container sign-in-container">
      <!-- sign in start-->
      <form action="sign-in-reqapp.php" method="post">
        <h1>Sign in</h1>
        <input type="email" placeholder="Email" name="email" value="<?php
                                                                    if (isset($_REQUEST["email"])) {
                                                                      echo $_REQUEST["email"];
                                                                    }
                                                                    ?>" />
        <input type="password" placeholder="Password" name="password" />
        <div>
          <?php
          if (isset($_REQUEST["error"])) {
            echo " <small class ='text-danger'> 
            Make sure the email address and password you entered is correct.
            </small>";
          }
          ?>
        </div>
        <button>Sign In</button>
      </form>
      <!-- sign in end-->
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Hello, Talent!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Welcome Back, Talent!</h1>
          <p>Enter your personal details and start journey with us</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
      container.classList.remove("right-panel-active");
    });
  </script>
</body>

</html>
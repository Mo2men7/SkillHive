<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="register.css">
</head>

<body>

  <section class="vh-100 gradient-custom">
    <div class="py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Registration Form</h3>
              <form action="storing.php" method="post">
                <!-- <form action="index.php" method="post"> -->

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label">First Name</label>
                      <input type="text" id="firstName" name="firstname" class="form-control form-control-lg" />
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label">Last Name</label>
                      <input type="text" id="lastName" name="lastname" class="form-control form-control-lg" />
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">

                    <div class="form-outline datepicker w-100">
                      <label for="birthdayDate" class="form-label">Country</label>
                      <select name="country" id="country" class="w-100 form-control form-control-lg">
                        <option value="Egypt">Egypt</option>
                        <option value="Egypt2">Egypt2</option>
                        <option value="Egypt3">Egypt3</option>
                      </select>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <h6 class="mb-2 pb-1">Gender: </h6>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" checked />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                  </div>
                </div>

                <div class="mb-4 row">
                  <div class="form-outline col-md-6">
                    <label class="form-label" for="emailAddress">Email</label>
                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline col-md-6">
                    <label class="form-label" for="dateOfBirth">Date of birth</label>
                    <input type="date" name="date" class="form-control form-control-lg">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <label class="form-label" for="username">Username</label>
                      <input type="text" id="username" name="username" class="form-control form-control-lg" />
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" class="form-control form-control-lg" name="password" />
                    </div>

                  </div>
                </div>

                <div class="mt-4 pt-2 d-flex justify-content-center">
                  <input class="btn btn-primary btn-lg m-auto" type="submit" value="REGISTER" />
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>
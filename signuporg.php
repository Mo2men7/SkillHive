<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./css/signup.css"> -->
    <style>

form {
    background-color:rgba(0, 0, 0, 0.05);
    margin: auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-content: space-between;
    width: 50vw;
    /* border: solid 1px; */
    font-size: 16px;
    /* background-color: rgba(255, 255, 255, 0.196); */
    border-radius: 15px;
    

}

div {
    margin-top: 10px;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-around;


}
/* 
label::after {
    background: none !important;
} */

/* input[type="text"],
input[type="email"],
input[type="date"],
input[type="password"],
input[type="file"],
input[type="file"]::file-selector-button,
select,
textarea {

    background: none !important;

} */
    </style>
</head>

<body>
    <form action="inc/signup.inc.php" method="post" class="needs-validation d-flex flex-column align-items-center mt-5 mb-5" novalidate enctype="multipart/form-data">
        <h2 class="mt-4 ">Sign up</h2>

        <div class="form-floating col-8 d-flex has-validation flex-column">
            <input type="text" name="org_name" class="form-control" id="org_name" placeholder="Organization Name" required>
            <label for="org_name">Organization Name</label>

        </div>

        <div class="form-floating col-8 has-validation d-flex flex-column">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" aria-describedby="inputGroupPrepend" required>
            <label for="email">Email</label>
            <?php
            if (isset($_REQUEST["error"]))
            {
                echo "<div class='text-danger text-start'> Email Exists!</div>";
            }
            ?>
        </div>
        <div class="form-floating col-8 has-validation d-flex flex-column">
            <input type="password" name="password" class="form-control" id="pass" aria-describedby="inputGroupPrepend" placeholder="Password" required>
            <label for="pass">Password</label>
            <div id="passpatt" class="invalid-feedback" style="display: none;">
                follow pattern
            </div>
        </div>
        <div class="form-floating col-8 has-validation d-flex flex-column">
            <input type="password" name="confpass" class="form-control" id="confpass" aria-describedby="inputGroupPrepend" placeholder="Confirm Password" required>
            <label for="confpass">Confirm Password</label>
            <div id="passcheck" class="invalid-feedback" style="display: none;">
                Not Matched!
            </div>
        </div>
        <div class="form-floating col-8 has-validation d-flex flex-column">
            <textarea name ="org_description" class="form-control" id="org_description" placeholder="Organization Description" required></textarea>
            <label for="org_description">Organization Description</label>
        </div>
        <div class="form-floating col-8 has-validation d-flex flex-column">
            <input type="date" name="date_of_est" class="form-control" id="date_of_est" aria-describedby="inputGroupPrepend" placeholder="Date Of Establish" required>
            <label for="date_of_est">Date Of Establish</label>

        </div>
        <div class="form-floating col-8 has-validation d-flex flex-column">
            <input type="text" name="location" class="form-control" id="location" placeholder="Location" required>
            <label for="location">Location</label>
        </div>
        <div class="col-8 has-validation d-flex flex-column">
            <input type="file" class="form-control" id="file" name="file" required>
        </div>

        <div>
            <input type="submit" class="btn btn-outline-success me-5" name="register" value="Register">
            <!-- <input type="reset" class="btn btn-outline-light" value="Reset"> -->
        </div>
    </form>



    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- <script src="js/form_valid.js">
    </script> -->
    <script>


    </script>
    <script src="js/form_valid.js"></script>
</body>

</html>
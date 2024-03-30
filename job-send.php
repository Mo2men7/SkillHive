<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- sign in header  start-->
  <div class="container">
    <br><br>
    <div class="bg-light container p-3 border border-warning">
      <h1 class="text-center text-warning">Job Form</h1>
      <!-- sign in header  end-->

      <!-- sign in  form  start -->
      <form action="job-recieve.php" method="post">
        <!-- job title -->
        <div class="form-group">
          <label for="">Job Title</label>
          <input type="text" class="form-control " placeholder="type job title" name="job_title">
        </div>
        <br>
        <!-- description -->
        <div class="form-group">
          <label for="">Description</label>
          <textarea class="form-control " placeholder="type job description" name="job_description" rows="4" cols="50"></textarea>
        </div>
        <br>
        <!-- salary -->
        <div class="form-group">
          <label for="">Salary</label>
          <input class="form-control"  type="number" placeholder="type The estimated salary by $" name="salary" min="0">
        </div>
        <br>
        <!-- category -->
        <?php
session_start();
$connection = new mysqli("localhost", "root", "123y", "job_portal");
if ($connection->connect_errno) {
    die("error in database connection");
}
$data = $connection->query("SELECT * FROM category");
?>

<div class='form-group'>
    <label for='category'>Category</label>
    <select id='category' name='category' class='form-control'>
        <?php
        // Loop through each row fetched from the database
        while ($row = $data->fetch_assoc()) {
            // Output an option for each category
            echo "<option value='" . $row['id_category'] . "'>" . $row['category'] . "</option>";
        }
        ?>
    </select>
</div>

<?php
// Close the PHP block
$connection->close();
?>
          <br>
          <div class="form-group">
          <label for="">Expire date</label>
          <input class="form-control"  type="date"  name="expire_date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" >
        </div>
        <br>
        </div>

        <!-- open and close -->
        <!-- <div class="form-group">
        <label for="room_no">Status</label>
        <select id="room_no" name="room_no" class="form-control">
          <option value="o" selected>Opened</option>
          <option value="c">Closed</option>
        </select>
      </div>
        </div> -->
        <br>
        <button type="submit" class="btn btn-warning">Add Job</button>
    </div>
    </form>
  </div>
  <!-- sign in  form end-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>



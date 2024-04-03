<?php
require_once "header.php";
$id_category;
?>


  <style>
    .bg_title {
      background: linear-gradient(90deg, rgba(0, 116, 255, 1) 0%, rgba(33, 216, 255, 1) 100%);
    }

    .main {
      width: 60%;
    }
  </style>
  <!-- sign in header  start-->
  <div class="container main mt-5 ">
    <br><br>
    <div class=" border mt-6">
      <h1 class="text-white text-center bg_title p-4">Create Job</h1>
      <!-- sign in header  end-->
      <div class="p-4">
        <!-- sign in  form  start -->
        <form action="job-recieve.php" method="post">
          <!-- job title -->
          <div class="form-group">
            <label for="">Job Title</label>
            <input type="text" class="form-control rounded shadow py-2 " placeholder="type job title" name="job_title" required>
          </div>
          <br>
          <!-- description -->
          <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control rounded shadow py-2 " placeholder="type job description" name="job_description" rows="4" cols="50" required></textarea>
          </div>
          <br>
          <!-- salary -->
          <div class="form-group">
            <label for="">Salary</label>
            <input class="form-control rounded shadow py-2" type="number" placeholder="type The estimated salary by $" name="salary" min="0" required>
          </div>
          <br>
          <!-- category -->
          <?php
          $data = $connection->query("SELECT * FROM category");

          ?>

          <div class='form-group '>
            <label for='category'>Category</label>
            <select class='form-control rounded shadow py-2' id='category' name='category'>
              <?php
              $id_category;
              // Loop through each row fetched from the database
              while ($row = $data->fetch_assoc()) {
                // Output an option for each category
                $id_category = $row['id_category'];
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
            <input class="form-control rounded shadow py-2" type="date" name="expire_date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
          </div>
          <br>
      </div>

      <br>
      <div class="text-center"> <button type="submit" class="btn text-light bg_title my-3 fw-bold">Add Job</button></div>
    </div>
    </form>
  </div>
  </div>
  <!-- sign in  form end-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

</html>
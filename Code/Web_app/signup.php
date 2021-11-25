<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Group-32, Fall 2021">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>S.R.I.J.A.S - Register</title>
  <?php
  /**
     * This segment of code is responsible for loading entries from the job_master
     * table and putting them into the drop-down in the form
     * @var object paramsFile and
     * @var params associative array(string) extracts content from parameters.json
     * @var skill_ids array(int) stores the IDs of the job_master table entries
     * @var skill_array array(string) stores the titles of the job_master table entries.
      */
  $paramsFile = file_get_contents("parameters.json");
  $params = json_decode($paramsFile, true);

  /**
     * @var servername string and
     * @var username string and
     * @var password string and
     * @var db string variables store the connection parameters for $conn
     */
  $servername = $params["server_name"];
  $username = $params["user_name"];
  $password = $params["password"];
  $db = $params["db_name"];

  $conn = new mysqli($servername, $username, $password, $db);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM job_master";
  $result = $conn->query($sql);
  $skill_array = array();
  $skill_ids = array();
  $len = $result->num_rows;
  if ($len > 0) {
    while($row = $result->fetch_assoc()) {
      array_push($skill_array, $row["job_title"]);
      array_push($skill_ids, $row["job_id"]);
    }
  }
  $conn->close();
  ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
          <div class="text-center my-5">
            <!-- <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100"> -->
            <h2 class="display-4 font-weight-bold" style="font-size:15px;display:inline-block">S.R.I.J.A.S. (Smart Resume Interpreter And Job Alerts System)</h2>
          </div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">

								<div class="mb-3">
									<label class="mb-2 text-muted" for="inputName">Name</label>
									<input id="inputName" type="text" class="form-control" name="inputName" placeholder="Enter your Name" value="" required autofocus>
									<div class="invalid-feedback"> Name is required </div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="inputEmail">E-Mail Address</label>
									<input id="inputEmail" type="email" class="form-control" name="inputEmail" placeholder="Enter your email address" value="" required>
									<div class="invalid-feedback"> Email is Invalid </div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="inputLocation">Password</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="Enter your Password" required>
								  <div class="invalid-feedback"> Password is required </div>
								</div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="inputLocation">Location</label>
                  <input id="location" type="text" class="form-control" name="location" placeholder="Enter your Location" required>
                  <div class="invalid-feedback"> Location is required </div>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="inputJobTypeId">Job you're looking for </label>
                  <select class="custom-select mr-sm-2" id="inputJobTypeId" name="inputJobTypeId" required>
                    <option selected>Choose...</option>
                    <?php
                    $count = 0;
                    foreach($skill_array as $skill){
                    echo "<option value='".$skill_ids[$count]."'>".$skill."</option>";
                    $count = $count+1;
                    }
                    ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="uploadResume">Upload Your Resume</label>
                  <input type="file" class="form-control-file" id="uploadResume" name="uploadResume" required>
                </div>

								<div class="align-items-center d-flex">
									<button type="submit" value="Submit" id="submit" name="submit" class="btn btn-primary ms-auto"> Register </button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center"> Already have an account? <a href="login.php" class="text-dark">Login</a> </div>
						</div>
					</div>
        <br><div align="center">Made with <span style="color: #e25555;">&hearts;</span>. Contribute on <a href="https://github.com/sak007/SRIJAS" class="text-dark" target="_blank">GitHub</a>.</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>

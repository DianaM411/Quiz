<?php
session_start(); 
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<?php
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $_SESSION['username'] = $name;
  $password = $_POST["password"];
  //Verify if user & password combo exists in the database
  $stmt = $conn->prepare("SELECT * FROM users WHERE name='$name' AND password='$password'");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if (count($result) > 0) {
    header("Location: questions/q1.php");
  }else {
    echo "Username or password incorrect";
  }
}
?>
<section class="vh-100 gradient-custom">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-9">
            <div class="card text-black" style="border-radius: 25px">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-8 col-xl-7 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mx-md-2 my-5">
                      Login to Start
                    </p>
                   
                    <form class="mx-1 mx-md-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    
                      <div class="d-flex flex-row align-items-center mb-3">
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="text"
                            name="name" required
                            class="form-control"
                          />
                          <label class="form-label" for="name"
                            >Your Name</label
                          >
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-2">
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="password"
                            name="password" required
                            class="form-control"
                          />
                          <label class="form-label" for="password"
                            >Password</label
                          >
                        </div>
                      </div>

                      <div class="d-flex justify-content-center mb-2 mb-lg-4">
                        <div class="d-grid gap-2 col-12 mx-auto">
                          <input
                            class="btn btn-dark btn-lg my-4"
                            type="submit"
                            value="Login"
                          />
                        </div>
                      </div>
                      <div class="d-flex justify-content-center">
                        Not yet a member?
                        <a class="mx-2" href="register.php">Register</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
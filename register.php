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
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<?php
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $password = test_input($_POST["password"]);
  $filename = $_FILES["photo"]["name"];
  $tempname = $_FILES["photo"]["tmp_name"];  
  $folder = "images/".$filename;   

//Insert Form Data into Database
  $sql = "INSERT INTO users(name, password, image) VALUES ('$name', '$password', '$folder')";
  $conn->exec($sql);
  header("Location: login.php");

//Add the image to the "images" folder
if (move_uploaded_file($tempname, $folder)) {
  $msg = "Image uploaded successfully";
}else{
  $msg = "Failed to upload image";
}
}
?>
<!--The htmlspecialchars() function converts special characters to HTML entities. 
This means that it will replace HTML characters like < and > with &lt; and &gt;. 
This prevents attackers from exploiting the code by injecting HTML or Javascript code 
(Cross-site Scripting attacks) in forms.-->

<section class="vh-100 gradient-custom">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mx-md-2 mt-4">
                      How Lazy Are You?
                    </p>
                    <p class="text-center h4 fw-light mb-5">
                      Based On Your Cell Phone Habits
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

                      <div class="d-flex flex-row align-items-center mb-2">
                        <div class="col-md-12">
                        <input type="file" id="inputImage" name="photo" class="form-control form-control">        
                          <div class="small text-muted mt-2">
                            Upload your avatar photo. Max file size 50 MB
                          </div>
                        </div>
                      </div>

                      <div class="d-flex justify-content-center mb-2 mb-lg-4">
                        <div class="d-grid gap-2 col-12 mx-auto">
                          <input
                            class="btn btn-dark btn-lg my-4"
                            type="submit"
                            value="Register"
                          />
                        </div>
                      </div>
                      <div class="d-flex justify-content-center">
                        Already have an account?
                        <a class="mx-2" href="login.php">Login</a>
                      </div>
                    </form>
                  </div>
                  <div
                    class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2"
                  >
                    <img src="images/sloth.png" class="img-fluid" alt="Sloth" />
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
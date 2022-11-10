<?php 
session_start(); 
if(!(isset($_SESSION['username']))){
  header("location:register.php");
}
//echo $_SESSION['points'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Question 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['checkArr'])){
      foreach($_POST['checkArr'] as $checked){
        $_SESSION['points'] += 5;
      }
    } else {
      echo '<div class="error">Checkbox is not selected!</div>';
    }
   // echo $_SESSION['points'];
    header("Location: ../result.php");
  }
  ?>

  <section class="vh-100 gradient-custom">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-8">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-10 order-2 order-lg-1">
                  <p class="h2 fw-bold mx-md-2 mt-5 mb-4">
                  How do you typically order takeout?
                  </p>
                  <form id="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-outline mb-4">    
                      <input type="checkbox" id="vehicle1" name="checkArr[]" value="option1"/>
                      <label for="vehicle1"> Delivery apps, like Uber Eats or DoorDash</label><br/>
                      <input type="checkbox" id="vehicle2" name="checkArr[]" value="option2"/>
                      <label for="vehicle2">Order in the app, then pick up from restaurant</label><br/>
                      <input type="checkbox" id="vehicle3" name="checkArr[]" value="option3"/>
                      <label for="vehicle3"> Call the restaurant to have food delivered</label><br/>
                      <input type="checkbox" id="vehicle4" name="checkArr[]" value="option4"/>
                      <label for="vehicle3"> Walk to the restaurant and order takeout</label><br/>
                    </div>
                    <input class="btn btn-dark btn-lg mb-4" type="submit" value="Submit"/>
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

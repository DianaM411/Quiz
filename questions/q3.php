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
    <title>Question 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['option'])) {
      $answer=$_POST['option'];
      switch ($answer) {
        case "Too many to count!":
          $_SESSION['points'] += 15;
          header("Location: q4.php");
          break;
        case "Four to six hours":
          $_SESSION['points'] += 5;
          header("Location: q4.php");
          break;
        case "Seven or more hours":
          $_SESSION['points'] += 10;
          header("Location: q4.php");
          break;
        default:
        $_SESSION['points'] += 0;
        header("Location: q4.php");
      }      
  } else {
      echo 'Please select the value.';
  }
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
                    What's your daily screen time like?
                    </p> 
                    <form id="form3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <div class="form-outline mb-4">  
                        <input type="radio" id="option1" name="option" value="One to three hours"/>
                        <label for="option1">One to three hours</label><br/>
                        <input type="radio" id="option2" name="option" value="Four to six hours" />
                        <label for="option2">Four to six hours</label><br/>
                        <input type="radio" id="option3" name="option" value="Seven or more hours"/>
                        <label for="option3">Seven or more hours</label><br/>
                        <input type="radio" id="option4" name="option" value="Too many to count!"/>
                        <label for="option4">Too many to count!</label><br/>
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

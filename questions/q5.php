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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>Question 5</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['alarms'])) {
      $answer=$_POST['alarms'];
      switch ($answer) {
        case "option2":
          $_SESSION['points'] += 5;
          break;
        case "option3":
          $_SESSION['points'] += 10;
          break;
        case "option4":
          $_SESSION['points'] += 15;
          break;
        default:
        $_SESSION['points'] += 0;
      }      
  } else {
      echo 'Please select the value.';
  }
    header("Location: q6.php");
  }
  ?>
  <section class="vh-100 gradient-custom">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-8">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-10 order-2 order-lg-1">
                    <p class="text-center h2 fw-bold mx-md-2 mt-5 mb-4">
                    How many alarms do you set in the morning?
                    </p>
                    <label for="alarms">Choose an option:</label>
                    <select class="mb-4" id="alarms" name="alarms">
                      <option value="option1">One to three</option>
                      <option value="option2">Four or more</option>
                      <option value="option3">Enough that one goes off every five minutes</option>
                      <option value="option4">Too many to count!</option>
                    </select><br/>
                    <div class="d-grid gap-2 col-5 mx-auto">
                      <input class="btn btn-dark btn-lg mb-4" type="submit">
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
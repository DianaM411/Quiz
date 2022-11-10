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
    <title>Question 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <?php 
    if(isset($_POST['button1'])) {
      $_SESSION['points'] += 10;
      header("Location: q5.php");
    }
    if(isset($_POST['button2'])) {
      header("Location: q5.php");
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
                    <p class="text-center h2 fw-bold mx-md-2 my-5">
                    Do you call or text someone when they're in the same house as you?
                    </p>
                  <form id="form4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="d-grid gap-2 col-10 mx-auto">
                    <input class="btn btn-dark btn-lg mb-2" type="submit" name="button1" value="YES"/>
                    <input class="btn btn-dark btn-lg mb-4" type="submit" name="button2" value="NO"/>
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

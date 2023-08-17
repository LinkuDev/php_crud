<?php 
  include 'config/database.php';
  include_once 'session.php';
  include 'function.php';
  if(isset($_SESSION['user_id'])){
    header("Location: admin.php");
    exit;
};
  try {
    $query = "SELECT * FROM users WHERE email=:email";
    $stmt = $conn->prepare($query);
    $errorLogin = $emailErr = $passwordErr = '';
    $email = $password = '';
    $user;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
      };
      if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      } else {
        $password = md5(test_input($_POST["password"]));
      };
      $stmt->bindParam(':email', $email);
      //$stmt->bindParam(':password', $password);
      
      $stmt->execute();
      
        if($stmt->rowCount()!=null){
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          if($password==$user['pass']){
            create_session($user);
            header("Location: admin.php");
          }
          else{
            $passwordErr = "Wrong password!";
          }
        }
        else{
          $emailErr = "Email doesn't exist!";
        }
    }
  }catch (PDOException $th) {
      die('ERROR: ' . $th->getMessage());
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">Sign in</h3>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-outline mb-4">
                  <label class="form-label" for="typeEmailX-2">Email</label>  
                  <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name='email'/>
                  <label class="form-label text-danger" for="typePasswordX-2"><?php echo $emailErr; ?></label>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="typePasswordX-2">Password</label>
                  <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password"/>
                  <label class="form-label text-danger" for="typePasswordX-2"><?php echo $passwordErr; ?></label>
                </div>
                <label class="form-label text-danger" for="typePasswordX-2"><?php echo $errorLogin; ?></label>
                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                  <label class="form-check-label" for="form1Example3"> Remember password </label>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            </form>
            <hr class="my-4">

            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
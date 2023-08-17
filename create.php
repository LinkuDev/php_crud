<?php 
   include_once 'config/database.php';
   include 'function.php';
   include_once 'session.php';
   try {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      // $_SESSION['user_name'] = $_POST['name'];
      // $_SESSION[user_email'] = $_POST['email'];
      // $_SESSION['user_password'] = $_POST['password'];
      // $_SESSION['user_sdt'] = $_POST['password'];
      // $_SESSION['user_gender'] = $_POST['gender'];
      // $_SESSION['user_birth'] = $_POST['birth'];
      $code = '';
      if(isset($_POST["num1"])){
        $code = $_POST["num1"].$_POST["num2"].$_POST["num3"].$_POST["num4"].$_POST["num5"].$_POST["num6"];
      }
      echo $code . 'so sánh' . $_SESSION['code'];
      if($code == $_SESSION['code']){
              
        $query = "SELECT * FROM users WHERE email=:email";
        $stmt = $conn->prepare($query);
        $email = test_input($_SESSION['reg_email']);
        $stmt ->bindParam(':email',$email);
        $stmt->execute();
        if($stmt->rowCount()!=null){
            $_SESSION['msg'] = 'Your email is existed';
            header("Location: admin.php");
            exit();
        }
        else{
            try {
                $query = "INSERT INTO users SET name=:name, email=:email, sdt=:sdt, pass=:password, birth=:birth, gender=:gender";
                $stmt = $conn->prepare($query);
                $email = test_input($_SESSION['reg_email']);
                $password = md5(test_input($_SESSION['reg_password']));
                $name = test_input($_SESSION['reg_name']);
                $sdt = test_input($_SESSION['reg_phone']);
                $birth = test_input($_SESSION['reg_birth']);
                $gender = test_input($_SESSION['reg_gender']);


                $stmt ->bindParam(':email',$email);
                $stmt ->bindParam(':password',$password);
                $stmt ->bindParam(':name',$name);
                $stmt ->bindParam(':sdt',$sdt);
                $stmt ->bindParam(':birth',$birth);
                $stmt ->bindParam(':gender',$gender);

                if($stmt->execute()){
                    header("Location: admin.php");
                }else{
                    echo "<div class='alert alert-danger'>Unable to save record.</div>";
                }
            } catch (PDOException $th) {
                    die('ERROR: ' . $th->getMessage());
            }
        }
            
      }
      else{
          $requiredSessionVar = array('user_id','user_name','user_email','user_password','user_sdt','user_gender','user_birth');
          foreach($_SESSION as $key => $value) {
              if(!in_array($key, $requiredSessionVar)) {
                  unset($_SESSION[$key]);
              }
          }
          $_SESSION['msg'] = 'Your code is not correct';
          header("Location: admin.php");
          
      }
    
    }
  } catch (Exception $th) {
    echo $th;
  }
    
?>
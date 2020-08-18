<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cssProject.css" />
    <title>Login Page</title>
  </head>
  <body>
    <?php
        // LOGIN PAGE
        error_reporting(E_ALL ^ E_NOTICE);
        ini_set('error_reporting', E_ALL ^ E_NOTICE);
    ?>
    <h1 id="Lh1">PLEASE ENTER YOUR EMAIL AND PASSWORD</h1>
    <form action="Login.php" method="post">
      <input type="text" name="email" id="email" placeholder="Email"><br>
      <input type="text" name="password" id="password" placeholder="Password"><br>

      <input type="submit" name="Register" value="Register" id="Register">
      <input type="submit" name="Login" value="Login" id="Login">

      <?php
          include_once 'dataBaseConnected.php';

          $Email = $_POST['email'];
          $Password = $_POST['password'];
          $check = "SELECT * FROM Login;";
          $result = mysqli_query($conn, $check);
          $resultCheck = mysqli_num_rows($result);

          if (isset($_POST["Register"])) {
            $str = $Email;
            $pattern = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/'; // CHECKS IF THE EMAIL FORMAT IS VALID
            if(preg_match($pattern, $str)){
              $SQL = "INSERT INTO Login (email, pass) VALUES('$Email', '$Password');";
              mysqli_query($conn, $SQL);
            }else{
              echo "<script type='text/javascript'>alert('Wrong format for email');</script>";
            }
          }elseif (isset($_POST["Login"])) {
            if($resultCheck > 0){
              while($row = mysqli_fetch_assoc($result)){
                if($row["email"] == $_POST['email'] and $row["pass"] == $_POST['password']){
                  echo "Successful";
                  header("Location: phpProject.php");
                }else{
                  echo '<script type=text/javascript>';
                  echo 'alert("Wrong email or password")';
                  echo '</script';
                }
              }
            }else{
              header("Location: phpProject.php");
              echo "No email registered";
            }
          }
       ?>
    </form>

  </body>
</html>

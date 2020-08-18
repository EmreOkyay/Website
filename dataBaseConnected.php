<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DataBaseConnection</title>
  </head>
  <body>

    <?php
        // CREATES A CONNECTION WITH THE SQL DATABASE
        $servername = "localhost";
        $username = "root";
        $password = "gfg56dg";
        $dbname = "giraffe";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if(!$conn){
          die("Connection failed: ". mysqli_connect_error());
        }

     ?>

  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="cssProject.css" />
    <script src="javaProject.js"></script>
    <title>My Project</title>
  </head>
  <body>
    <?php
        include_once 'dataBaseConnected.php';
        error_reporting(E_ALL ^ E_NOTICE);
        ini_set('error_reporting', E_ALL ^ E_NOTICE);
    ?>
    <h1 id="Main_H1">Electronics Store</h1>
    <hr>
    <form action="phpProject.php" method="post" enctype="multipart/form-data">
      <div class="theme" id="theme"> <!-- CHANGING THE THEME SO IT'S LESS OF AN EYESORE -->
      <input type="hidden" name="size" value="1000000">
      <input type="radio" id="light" name="theme" value="light" onclick="isChecked()">
      <label for="light">Light Theme</label><br>
      <input type="radio" id="dark" name="theme" value="dark" onclick="isChecked()">
      <label for="dark">Dark Theme</label><br><br><br>
      </div>
      <div>
        <input type="file" name="image">
      </div>
      <input type="text" name="Pname" id="pName" placeholder="Product Name"><br>
      <input type="number" name="price" id="pPrice" placeholder="Price"><br>
      <input type="number" name="stock" id="pStock" placeholder="Stock"><br>

      <input type="submit" name="Add" value="Add" id="Add" onclick="Added()">
      <input type="submit" name="Delete" value="Delete"id="Delete" onclick="Deleted()">
      <input type="submit" name="Order" value="Order" onclick="Ordered()" id="Order">
      <hr>

      <?php // ADDS ELEMENTS TO THE TABLE

          $pName = $_POST['Pname']; // GET THE ELEMENTS FROM THE FORM
          $pPrice = $_POST['price'];
          $pStock = $_POST['stock'];

        if(isset($_POST["Add"])){
          $image = $_FILES['image']['name'];
          $target = "images/".basename($image);
          $maybeSQL = "INSERT INTO Product (product_name, product_price, product_stock, product_image) VALUES('$pName', '$pPrice', '$pStock','$image');";

          mysqli_query($conn, $maybeSQL);
          move_uploaded_file($_FILES['image']['tmp_name'],$target);
        }
      ?>

      <?php // DELETES THE ELEMENTS FROM THE TABLE
        if(isset($_POST["Delete"])){
          $delSQL = "DELETE FROM Product WHERE product_name='$pName';";

          mysqli_query($conn, $delSQL);
        }
      ?>

      <?php
        if(isset($_POST["Order"])){  // ORDERS THE SELECTED AMOUNT OF A CERTAIN PRODUCT
          $delSQL = "UPDATE Product SET product_stock=product_stock-$pStock
          WHERE product_name='$pName';";

          mysqli_query($conn, $delSQL);
        }
       ?>
      <div class="divDisplay" id=divDisplay>

      <?php // DISPLAYS THE TABLE ON THE WEBSITE
          if(!$conn){
            die("Connection failed: ". mysqli_connect_error());
          }

          $sql = "SELECT * FROM Product;";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
              ?>
              <div class="realDisplay">
              <?php
              echo "<img src='images/".$row['product_image']."'<br><br><br><br><br><br><br><br><br>" . $row["product_name"]. "<br> Price: " . $row["product_price"]. "$<br> " . $row["product_stock"]. " in stock<br><br>";
              ?>
              </div>
              <?php
              if($row["product_stock"] == 1){
                $delSQL="DELETE FROM Product WHERE product_name='$pName';";
                mysqli_query($conn, $delSQL);
                }
              }
            }else{ // IF THE TABLE IS EMPTY, SHOW 0 RESULTS
              echo "0 results";
            }

      mysqli_close($conn);
      ?>
      </div>
    </form>

  </body>
</html>

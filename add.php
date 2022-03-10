<?php 
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'shopNow_werehouse' );


$errors = array('Reference'=>'' , 'Name'=>'', 'Category'=>'', 'quantity'=>'');

$sql = 'SELECT * FROM products';

//////////////////////

$result = mysqli_query($conn,$sql);

//////////////////////

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(isset($_SESSION['done'])) {
  echo"<div class='popUp' style='padding:20px;color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
  width:25%;
  margin:0 auto;
  position:absolute;
  top:100px;
  left:50%;
  text-align:center;
  transform:translate(-50%,0);
  transition:300ms;
  border-radius:5px;
  z-index:1;
  '><p style='font-size:20px;'>added successfully</p></div>";
  unset($_SESSION['done']);
}

  if(isset($_POST['submit'])) {
    
    //check Reference
    if(empty($_POST['Reference'])) {
      $errors['Reference'] = 'Reference is required <br/>';
    } else {
      $Reference =  $_POST['Reference'];
    }

    $check = 0;


    
    //check Name
    if(empty($_POST['Name'])) {
      $errors['Name'] = 'Name is required <br/>';
    } else {
      $Name =  $_POST['Name'];
    }

    //check Category
    if(empty($_POST['Category'])) {
      $errors['Category'] = 'Category is required <br/>';
    } else {
      $Category = $_POST['Category'];
    }

    //check quantity
    if(empty($_POST['quantity'])) {
      $errors['quantity'] = 'quantity is required <br/>';
    } else {
      $quantity = $_POST['quantity'];
    }  
    
    if(array_filter($errors)) {
      //error in form
    } else {

      //if no error in our form
      
      $Referece = mysqli_real_escape_string($conn, $_POST['Reference']);
      $Name = mysqli_real_escape_string($conn, $_POST['Name']);
      $Category = mysqli_real_escape_string($conn, $_POST['Category']);
      $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
      
      //create sql
      $sql = "INSERT INTO products(Reference,Name,Category,quantity) VALUES('$Referece', '$Name', '$Category', '$quantity')";

      $_SESSION['done'] = true;
      
      // save to dataBase
      if(mysqli_query($conn,$sql)) {
        //database added
        header('Location: add.php');
      } else {
         echo 'query error: ' . mysqli_error($conn); 
      }
  }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ShopNow | manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="addStyle.php" />
    <link rel="stylesheet" href="query.css" />
  </head>
  <body>
    <?php include('reusable/header.php'); ?>
    <!-- /////////////////////////////////////////// -->
    <main>
      <div class="cnt_of_main">
        <h1 class="head_one">add product</h1>
        <form action="add.php" method="POST">
          <div class="cnt_of_form">
            <label class="label" for="ref">Reference Number <span> *</span></label>
            <input  type="number" class="input" name="Reference" />
          </div> 
          <div class="errors_paragraph"> <?php echo $errors['Reference'] ?> </div>
          <div class="cnt_of_form">
            <label class="label" for="ref">Name<span> *</span></label>
            <input type="text" class="input" name="Name" />
          </div>
          <div class="errors_paragraph"> <?php echo $errors['Name'] ?> </div>
          <div class="cnt_of_form">
            <label class="label" for="ref">Category<span> *</span></label>
            <input type="text" class="input" name="Category" />
          </div>
          <div class="errors_paragraph"> <?php echo $errors['Category'] ?> </div>
          <div class="cnt_of_form">
            <label class="label" for="ref">quantity<span> *</span></label>
            <input type="number" class="input" name="quantity" />
          </div>
          <div class="errors_paragraph"> <?php echo $errors['quantity'] ?> </div>
          <div class="cnt_of_form special_margin_bottom">
              <input type="submit" name="submit" value="add" class="anchor_search">
          </div>
        </form>
      </div>
    </main>
    <!-- /////////////////////////////////////////// -->
    <footer class="footer">
      <p class="paragraph_of_footer">
        © 1996-2022, ShopNow.com, Inc. or its affiliates
      </p>
    </footer>
    <!-- /////////////////////////////////////////// -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script src="script.js"></script>
    <script>
    const myTimeout = setTimeout(moveAndDisappear, 1200);

    function moveAndDisappear() {
      document.querySelector(".popUp").style.opacity = '0';
      document.querySelector(".popUp").style.transform = "translate(5%,0)";
    }
  </script>
  </body>
</html>

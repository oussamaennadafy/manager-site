
<?php 

$conn = mysqli_connect('localhost', 'root', '', 'shopNow_werehouse' );

/////////////////////

$sql = 'SELECT * FROM products';

//////////////////////

$result = mysqli_query($conn,$sql);

//////////////////////

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

///////////////////////

mysqli_free_result($result);

///////////////////////

mysqli_close($conn);

///////////////////////
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
    <link rel="stylesheet" href="home-page/homeStyle.php" />
    <link rel="stylesheet" href="home-page/query.php" />
  </head>
  <body>
    <?php include('reusable/header.php'); ?>
    <!-- /////////////////////////////////////////// -->
  <main>

        <?php foreach($products as $product) { ?>
            <div id="goto" class="cnt_of_main">
            <h1 class="head_one">product</h1>
            <form action="#">
              <div class="cnt_of_form">
                <label class="label" for="ref">Reference Number</label>
                <p class="product_infos reference_number_paragraph"> <?php echo htmlspecialchars($product['Reference']) ?> </p>
              </div>
              <div class="cnt_of_form">
                <label class="label" for="ref">Name</label>
                <p class="product_infos Name_paragraph"><?php echo htmlspecialchars($product['Name']) ?></p>
              </div>
              <div class="cnt_of_form">
                <label class="label" for="ref">Category</label>
                <p class="product_infos Category_paragraph"><?php echo htmlspecialchars($product['Category']) ?></p>
              </div>
              <div class="cnt_of_form">
                <label class="label" for="ref">quantity</label>
                <p class="product_infos quantity_paragraph"><?php echo htmlspecialchars($product['quantity']) ?> pcs</p>
              </div>
            </form>
          </div>
          <?php } ?>
          <?php if($products == null) { ?>
            <p class="no_product_found"> we couldn't find any product </p>
          <?php } ?>
          

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
</body>
</html>
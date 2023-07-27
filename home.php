<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel ="icon" href = "uploaded_img/mainlogo.png">


   <link rel = "stylesheet" href = "css/slider.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css"> 

</head>
<body>
<?php include 'components/user_header.php'; ?>
 <body background="uploaded_img/back1.jpg"> 
<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <h3>Sweets and Hot Snacks</h3>
               <a href="menu.php" class="btn">Order Now</a>
            </div>
            <div class="image">
               <br><br><br>
               <img src="uploaded_img/home1.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide"> 
            <div class="content">
               <h3>Rich and Tasty Desserts</h3>
               <a href="menu.php" class="btn">Order Now</a>
            </div>
            <div class="image">
               <br><br><br>
               <img src="uploaded_img/home2.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide"> 
            <div class="content">
               <h3>Hot Murukku And Chips</h3>
               <a href="menu.php" class="btn">Order Now</a>
            </div>
            <div class="image">
               <br><br><br>
               <img src="uploaded_img/home3.png" alt="">
            </div>
         </div>
		
		   <div class="swiper-slide slide">
            <div class="content">
               <h3>Birthday and Wedding Cakes</h3>
               <a href="menu.php" class="btn">Order Now</a>
            </div>
            <div class="image">
               <br><br><br>
               <img src="uploaded_img/home4.png" alt="">
            </div>
         </div>
      </div>

      <div class="swiper-pagination">
</div>
      </div>

   </div>

</section>

<section class="category">

   <h1 class="title">food category</h1>

   <div class="box-container">

      <a href="category.php?category=Sweets" class="box">
         <img src="uploaded_img/sweet.png" alt="">
         <h3>Sweets</h3>
      </a>

      <a href="category.php?category=Murukkus" class="box">
         <img src="uploaded_img/cat-1.png" alt="">
         <h3>Murukku</h3>
      </a>

      <!-- <a href="category.php?category=drinks" class="box">
         <img src="images/cat-3.png" alt="">
         <h3>Drinks</h3>
      </a> -->

      <a href="category.php?category=desserts" class="box">
         <img src="images/cat-4.png" alt="">
         <h3>Desserts and Cakes</h3>
      </a>
   </div>

</section>




<section class="products">

   <h1 class="title">latest dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" target = "_blank"class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>Rs.</span><?= $fetch_products['price']; ?><span>(Per kg)</span></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">view all</a>
   </div>

</section>




<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>
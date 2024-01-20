<?php 

include_once("admin/class/function.php"); 

$obj = new blog_project();

$getcategory = $obj->category_display();

?>
<?php include_once("includes/head.php"); ?>

<body>

  

  <?php include_once("includes/header.php"); ?>

  <?php include_once("includes/banner.php"); ?>

  <?php include_once("includes/cta.php"); ?>

  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <?php include_once("includes/blog_post.php"); ?>
        <?php include_once("includes/side_post.php"); ?>
      </div>
    </div>
  </section>

  <?php include_once("includes/footer.php"); ?>

  <?php include_once("includes/script.php"); ?>
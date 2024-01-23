<?php 

include_once("admin/class/function.php"); 

$obj = new blog_project();

$getcategory = $obj->category_display();

if(isset($_GET['view'])){
  if($_GET['view']='singlePostview'){
    $id =$_GET['id'];
    $single_post = $obj->post_content_show($id);
  }
}
?>
<?php include_once("includes/head.php"); ?>

<body>

  

  <?php include_once("includes/header.php"); ?>

  <?php include_once("includes/banner.php"); ?>

  <?php include_once("includes/cta.php"); ?>

  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
        <div class="blog-post">
          <div class="blog-thumb">
            <img  src="upload/<?php echo $single_post['post_img']; ?>" alt="post img" style="height: 300px;" class="img-fluid">
          </div>
          <div class="down-content">
            <span><?php echo $single_post['post_tag']; ?></span>
              <h4><?php echo $single_post['post_title']; ?></h4>
            <ul class="post-info">
              <li><a href="#"><?php echo $single_post['post_author']; ?></a></li>
              <li><a href="#"><?php echo $single_post['post_date']; ?></a></li>
              <li><a href="#"><?php echo $single_post['post_comment_count']; ?> Comments</a></li>
            </ul>
            <p><?php echo $single_post['post_summery']; ?> </p>
            <div class="post-options">  
              <div class="row">
                <div class="col-6">
                  <ul class="post-tags">
                    <li><i class="fa fa-tags"></i></li>
                    <li><a href="#"><?php echo $single_post['post_tag']; ?></a>,</li>
                    
                  </ul>
                </div>
                <div class="col-6">
                  <ul class="post-share">
                    <li><i class="fa fa-share-alt"></i></li>
                    <li><a href="#">Facebook</a>,</li>
                    <li><a href="#"> Twitter</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php include_once("includes/side_post.php"); ?>
      </div>
    </div>
  </section>

  <?php include_once("includes/footer.php"); ?>

  <?php include_once("includes/script.php"); ?>
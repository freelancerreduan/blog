<?php
    include_once('class/function.php');
    $obj = new blog_project();

    if(isset($_GET['status'])){
        if($_GET['status']=='post_chang_img'){ 
            $id = $_GET['id'];
            $msg = $_GET['$id'];
        }
    }
    if(isset($_POST['chang_blog_img'])){
        $msg = $obj-> chang_img($_POST);
    }

?>
<div class="cotainer">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <?php if(isset($msg)){ echo "$msg"; } ?>
        <form action="" method="post" enctype="multipart/form-data"class="form" >

            <div class="form-group">
                <input type="text" value="<?php echo $id; ?>">
                <label for="text">Category Type</label>
                <input type="file" class="form-control" name="cat_des">
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="chang_blog_img">Change Img</button>

        </form>
    </div>
</div>
<?php
    include_once('class/function.php');
    $obj = new blog_project();
    $display_category = $obj->category_display();

    if(isset($_POST['add_post'])){
        $msg = $obj-> add_post($_POST);
    }

?>
<div class="cotainer">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <?php if(isset($msg)){ echo "$msg"; } ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h2 class="text-center text-success"> Blog Post</h2>
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" class="form-control" name="post_title" placeholder="Enter post_title ">
            </div>
            <div class="form-group">
                <label for="text">Post Thambunail</label>
                <input type="file" class=" form-control" name="post_img"/>   
            </div>
            <div class="form-group">
                <label for="text">Select Category</label>
                <select name="post_ctg" id="post_ctg" class="form-control">
                    <?php while($category = mysqli_fetch_assoc($display_category)){ ?>
                        <option value="<?php  echo $category['cat_id'];  ?>"> <?php  echo $category['cat_name'];  ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Post Summary</label>
                    <textarea name="post_summery" id="post_summery" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="text">Post Content</label>
                    <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10" placeholder="Enter Post Content"></textarea>
                </div>
                <div class="form-group">
                    <label for="post_tag">Post Tag</label>
                    <input type="text" class="form-control" name="post_tag">
                </div>
            
                <div class="form-group">
                    <label for="post_tag">Post Status</label>
                    <select name="post_status" id="post_status" class="form-control">
                        <option value="1">Publish  </option>
                        <option value="0">Unpublish  </option>
                    </select>
                </div>
                 <button type="submit" class="btn btn-primary btn-block" name="add_post">Add Post</button>
        </form>
    </div>
</div>
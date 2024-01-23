<?php
    include_once('class/function.php');
    $obj = new blog_project();
    $display_category = $obj->category_display();


    if(isset($_GET['status'])){
        if($_GET['status']='post_edite'){
            $id= $_GET['id'];
            $content = $obj->post_content_show($id);
        }
    }

    // this code for (Post Data Update) 
    if(isset($_POST['update_post'])){
        $msg = $obj->post_update($_POST);
    }

?>
<div class="cotainer">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <?php if(isset($msg)){ echo "$msg"; } ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h2 class="text-center text-success"> Post Updated Page</h2>
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" class="form-control" name="up_post_title" value="<?php echo $content['post_title']; ?>">
            </div>

            <div class="form-group">
                <label for="text">Select Category</label>
                <select name="up_post_ctg" id="post_ctg" class="form-control">
                    <?php while($post = mysqli_fetch_assoc($display_category)){  ?>
                        <option value="<?php echo $post['cat_id']; ?>"> <?php echo $post['cat_name']; ?> </option>
                    <?php } ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="text">Post Summary</label>
                    <textarea name="up_post_summery" id="post_summery" cols="30" rows="5" class="form-control"> <?php echo $content['post_summery']; ?>  </textarea>
                </div>
                <div class="form-group">
                    <label for="text">Post Content</label>
                    <textarea class="form-control" name="up_post_content" cols="30" rows="10">  <?php echo $content['post_content']; ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="post_tag">Post Tag</label>
                    <input type="text" class="form-control" name="up_post_tag" value="<?php echo $content['post_tag']; ?>">
                </div>
            
                <div class="form-group">
                    <label for="post_tag">Post Status</label>
                    <select name="up_post_status" id="post_status" class="form-control">
                        <option value="1">Publish  </option>
                        <option value="0">Unpublish  </option>
                    </select>
                </div>
                <input type="hidden" name="post_id_no" value="<?php echo $content['id']; ?>">
                 <button type="submit" class="btn btn-primary btn-block" name="update_post">Update Post</button>
        </form>
    </div>
</div>
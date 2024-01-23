<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'post_chang_img') {
        $id = $_GET['id'];
        $img_display = $obj->edite_page_img_display($id);
    }
}

// // this code for (post img updated) in database
if (isset($_POST['chang_img'])) {
    $msg = $obj->update_img($_POST);
}


?>



<div class="cotainer">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <?php if (isset($msg)) {
            echo "$msg";
        } ?>

        <form action="" method="post" enctype="multipart/form-data" class="form">
            <div class="form-group">
                <label for="text">Category Type</label>
                <input type="file" class="form-control" name="chang_post_img" required>
                <br>
                <img src="../upload/<?php echo $img_display['post_img']; ?>" alt="edite img" class="w-100 img-fluid my-3" style="width: 100%; height: 200px;">

                <input type="hidden" value="<?php echo $img_display['id']; ?>" name="post_id">
                <button type="submit" class="btn btn-primary btn-block" name="chang_img">Change Img</button>
            </div>
        </form>
    </div>
</div>
<?php  
include_once("class/function.php");  
$obj = new blog_project();

$post  = $obj-> post_display();

// this code for(post Delete) in database
if(isset($_GET['status'])){
    if($_GET['status']='postdelete'){
        $id = $_GET['id'];
        $msg = $obj-> post_delete($id);
    }
}

?>



<div class="container">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <?php if(isset($msg)){ echo $msg; } ?>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">AUTHOR</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">TAGE</th>
                        <th scope="col">CONTENT</th>
                        <!-- <th scope="col">SUMMARY</th> -->
                        <th scope="col">DATE</th>
                        <th scope="col">IMG</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($post_display = mysqli_fetch_assoc($post)){ ?>
                        <tr style="height: 20px !important;">
                            <th scope="row"><?php echo $post_display['id']?></th>
                            <td><?php echo $post_display['post_author']?></td>
                            <td><?php echo $post_display['post_title']?></td>
                            <td><?php echo $post_display['cat_name']?></td>
                            <td><?php echo $post_display['post_tag']?></td>
                            <td><?php echo $post_display['post_content']?></td>
                            <!-- <td><?php echo $post_display['post_summery']?></td> -->
                            <td><?php echo $post_display['post_date']?></td>
                            <td><img src="../upload/<?php echo $post_display['post_img']?>" alt="" class="img-fluid" style="height:auto; width:100%;" name="post_img">
                                <a href="blog_img_change.php?status=post_chang_img&&id=<?php echo $post_display['id']?>" class="btn btn-outline-primary btn-block">Change</a>
                            </td>
                            <td><?php if($post_display['post_status']==1){ echo "Publish"; }else{ echo "Unpublish"; } ?></td>
                            <td>
                                <a href="post_edite.php?status=post_edite&&id=<?php echo $post_display['id']?>" class="btn btn-primary btn-block">Edite</a>
                                <a href="?status=postdelete&&id=<?php echo $post_display['cat_id']; ?>" class="btn btn-danger btn-block">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



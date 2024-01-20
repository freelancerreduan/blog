<?php  
include_once("class/function.php");  
$obj = new blog_project();

$post  = $obj-> post_display();

// this code for (Category Delete )in database
// if(isset($_GET['status'])){
//     if($_GET['status']=='delete'){
//         $id = $_GET['id'];  
//         $msg = $obj-> post_delete($id);
//     }
// }
?>

<!-- <style>
    table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}
</style> -->

<div class="container">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <?php if(isset($msg)){ echo $msg; } ?>
        <table class="table">
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
                        <td><img src="../upload/<?php echo $post_display['post_img']?>" alt="" class="img-fluid" style="height:auto; width:100%;">
                            <a href="blog_img_change.php?status=post_chang_img&&post=<?php $post_display['id']; ?>" class="btn btn-outline-primary btn-block">Change</a>
                        </td>
                        <td><?php if($post_display['post_status']==1){ echo "Publish"; }else{ echo "Unpublish"; } ?></td>
                        <td>
                            <a href="" class="btn btn-primary btn-block">Edite</a>
                            <a href="?status=delete&&id=<?php echo $post_display['cat_id']; ?>" class="btn btn-danger btn-block">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65ab565d8d261e1b5f55aec2/1hkikinr2';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
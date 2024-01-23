<?php
class blog_project
{
    private $conn;
    public function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'blog_project';
        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$this->conn) {
            die("Connection Faild!");
        }
    }


    // it's function for admin login In website
    public function admin_login($data)
    {
        $email = $data['admin_email'];
        $pass = md5($data['admin_pass']);
        $query = "SELECT * FROM  admin_info WHERE admin_email='$email' && admin_pass='$pass'";

        if (mysqli_query($this->conn, $query)) {
            $admin_info = mysqli_query($this->conn, $query);
            if ($admin_info) {
                header("location:dashboard.php");
                $admin_login = mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION['adminId'] = $admin_login['id'];
                $_SESSION['adminEmail'] = $admin_login['admin_email'];
            }
        }
    }


    // it's function for admin (logout) from Dashboard
    public function logout()
    {
        unset($_SESSION['adminId']);
        unset($_SESSION['adminEmail']);
        header("location:index.php");
    }

    // ==============================================Admin System Done======================================================





    // ============================================== Website Fully Function hear ==========================================


    // it's function for (Category Add) in database
    public function add_category($data)
    {
        $cat_name = $data['cat_name'];
        $cat_des = $data['cat_des'];

        $query = "INSERT INTO category (cat_name,cat_des) VALUE ('$cat_name', '$cat_des')";
        if (mysqli_query($this->conn, $query)) {
            return "Category Added Successfully";
        }
    }


    // it's function for (Category Manage) in database
    // public function manage_category($data)
    // {
    //     $manage_cat_name = $data['manage_cat_name'];
    //     $manage_cat_des = $data['manage_cat_des'];

    //     $query = "INSERT INTO category (cat_name,cat_des) VALUE ('$manage_cat_name', '$manage_cat_des')";
    //     if (mysqli_query($this->conn, $query)) {
    //         return "Category Updated Successfully";
    //     }
    // }


    // it's function for (Category Display in Manage Category page ) from Database
    public function category_display()
    {
        $query = "SELECT * FROM category";
        if (mysqli_query($this->conn, $query)) {
            $category_display = mysqli_query($this->conn, $query);
            return $category_display;
        }
    }


    // it's function for ( Edite page Data Display) in database
    public function category_old_data_show($id)
    {
        $query = "SELECT * FROM category WHERE cat_id= $id";
        if (mysqli_query($this->conn, $query)) {
            $category_display = mysqli_query($this->conn, $query);
            $category_display = mysqli_fetch_assoc($category_display);
            return $category_display;
        }
    }


    // it's function for ( Category Update ) in database
    public function cat_updated($data)
    {
        $u_cat_name = $data['u_cat_name'];
        $u_cat_des = $data['u_cat_des'];
        $cat_idno = $data['idno'];
        $query = "UPDATE category SET cat_name='$u_cat_name', cat_des='$u_cat_des' WHERE cat_id = $cat_idno ";
        if (mysqli_query($this->conn, $query)) {
            return "New Data Updated Successfully";
        }
    }


    // it's function for (Category Delete ) in database
    public function category_delete($id)
    {
        $query = "DELETE FROM category WHERE cat_id = $id";
        if (mysqli_query($this->conn, $query)) {
            return "Category Deleted Successfully";
        }
    }





    // =======================================================Post display section =======================

    // it's function for (Add Post ) in Database
    public function add_post($data)
    {
        $post_title = $data["post_title"];
        $post_img = $_FILES['post_img']['name'];
        $post_tmp_name = $_FILES['post_img']['tmp_name'];
        $post_ctg = $data["post_ctg"];
        $post_summery = $data["post_summery"];
        $post_content = $data["post_content"];
        $post_tag = $data["post_tag"];
        $post_status = $data["post_status"];

        $query = "INSERT INTO post(post_title,post_content,post_img,post_ctg,post_author,post_date,post_comment_count,post_summery,post_tag,post_status) VALUE ('$post_title','$post_content','$post_img','$post_ctg','Admin',now(),10,'$post_summery','$post_tag',$post_status)";
        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($post_tmp_name, "../upload/" . $post_img);
            return "Post Add Successfully";
        }
    }


    // it's function for ( Post dispaly )in font-end page
    public function post_display()
    {
        $query = "SELECT * FROM post_with_category";
        if (mysqli_query($this->conn, $query)) {
            $post_info = mysqli_query($this->conn, $query);
            return $post_info;
        }
    }


    // it's function for (Just Publish Post diaplay ) in database
    public function post_display_by_publish()
    {
        $query = "SELECT * FROM post_with_category WHERE post_status=1";
        if (mysqli_query($this->conn, $query)) {
            $post_display = mysqli_query($this->conn, $query);
            return $post_display;
        }
    }


    // // it's function for (Change ar img show in Edite page ) in database
    public function edite_page_img_display($id)
    {
        $query = "SELECT * FROM post_with_category WHERE id='$id'";
        if (mysqli_query($this->conn, $query)) {
            $post = mysqli_query($this->conn, $query);
            $post_display = mysqli_fetch_assoc($post);
            return $post_display;
        }
    }


    // it's function for (img Update) in database 
    public function update_img($data)
    {
        $id_no = $data['post_id'];
        $blog_img = $_FILES['chang_post_img']['name'];
        $img_tmp_name = $_FILES['chang_post_img']['tmp_name'];

        $query = "UPDATE post_with_category SET post_img='$blog_img' WHERE id=$id_no";
        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($img_tmp_name,"../upload/".$blog_img);
            return "Img Updated Successfully";
        }else{
            return "Img Change Faild";
        }
    }

    // it's function for (post info show in Edite page) at database
    public function post_content_show($id){
        $query = "SELECT * FROM post_with_category WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
            $post = mysqli_query($this->conn, $query);
            $post_data = mysqli_fetch_assoc($post);
            return $post_data;
        }
    }


    // it's function for( Post Updated ) in database
    public function post_update($data){
        $id_no = $data["post_id_no"];
        $post_title = $data["up_post_title"];
        $post_summary = $data["up_post_summery"];
        $post_content = $data["up_post_content"];
        $post_tag =  $data['up_post_tag'];

        $query = "UPDATE post_with_category SET post_title='$post_title', post_summery='$post_summary',post_content='$post_content',post_tag='$post_tag' WHERE id=$id_no;";
        if(mysqli_query($this->conn, $query)){
            return "Post Data Updated Successfully";
        }else{
            return "Data Not Updated!";
        }
    }

    // it's function for ( Post Deleted ) in database
    public function post_delete($id){
        // $query ="SELECT * FROM post_with_category WHERE id= $id";
        // $post_info = mysqli_query($this->conn , $query);
        // $post =mysqli_fetch_assoc($post_info);
        // // $post_img = $post['post_img'];

        // $query = "DELETE FROM post WHERE id=$id";
        // if(mysqli_query($this->conn, $query)){
        //     // unlink('../upload/'.$post_img);
        //     return "Post Delete Successfully";
        // }
    }

}


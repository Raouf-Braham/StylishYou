<?php

include('config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_category_btn'])){

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($con,$_POST['meta_title']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query = "INSERT INTO categories (name,slug,description,status,popular,image,meta_title,meta_description,meta_keywords) 
    VALUES ('$name','$slug','$description','$status','$popular','$filename','$meta_title','$meta_description','$meta_keywords')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("add-category.php", "Category Added Successfully !");
    }

    else{
        redirect("add-category.php", "Something Went Wrong...");
    }
}

else if(isset($_POST['update_category_btn'])) {

    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($con,$_POST['meta_title']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != ""){
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    
    }

    else 
    {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_query = "UPDATE categories SET name='$name', slug = '$slug', description='$description', 
    meta_description='$meta_description',meta_title= '$meta_title', meta_keywords='$meta_keywords', 
    status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run){
        if($_FILES['image']['name'] != ""){

            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);

            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }

        redirect("edit-category.php?id=$category_id", "Category Updated Successfully...");
    }

    else{
        redirect("edit-category.php?id=$category_id", "Something Went Wrong !");
    }
}

else if(isset($_POST['delete_category_btn'])){

    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {

        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }
        
        //redirect("category.php", "Category deleted successfully...");
        echo 200;
    }

    else
    {

        echo 500;
        //redirect("category.php", "Something Went Wrong !");

    }

}

else if(isset($_POST['add_product_btn'])){

    $category_id = $_POST['category-id'];
    $category_gender = $_POST['category-gender'];

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    $small_description = mysqli_real_escape_string($con, $_POST['small_description']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $original_price = mysqli_real_escape_string($con, $_POST['original_price']);
    $selling_price = mysqli_real_escape_string($con, $_POST['selling_price']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($con,$_POST['meta_title']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $path = "../uploads";

    if($name != "" && $slug != "" && $description != "")
    {
        // Process and upload image2
        $image1 = $_FILES['image']['name'];
        if($image1 != "")
        {
            $image_ext1 = pathinfo($image1, PATHINFO_EXTENSION);
            $filename1 = time() . '_1.' . $image_ext1;
            
        }

        // Process and upload image2
        $image2 = $_FILES['image2']['name'];
        if($image2 != "")
        {
            $image_ext2 = pathinfo($image2, PATHINFO_EXTENSION);
            $filename2 = time() . '_2.' . $image_ext2;
            
        }

        // Process and upload image3
        $image3 = $_FILES['image3']['name'];
        if($image3 != "")
        {
            $image_ext3 = pathinfo($image3, PATHINFO_EXTENSION);
            $filename3 = time() . '_3.' . $image_ext3;
            
        }

        $product_query = "INSERT INTO products (category_id,name,gender,slug,brand,rate,small_description,description,original_price,selling_price,qty,status,trending,image,image2,image3,meta_title,meta_description,meta_keywords) 
        VALUES ('$category_id','$name','$category_gender','$slug','$brand','$rate','$small_description','$description','$original_price','$selling_price','$qty','$status','$trending','$filename','$filename2','$filename3','$meta_title','$meta_description','$meta_keywords')";

        $product_query_run = mysqli_query($con, $product_query);

        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename1);
            move_uploaded_file($_FILES['image2']['tmp_name'], $path.'/'.$filename2);
            move_uploaded_file($_FILES['image3']['tmp_name'], $path.'/'.$filename3);

            redirect("add-product.php", "Product Added Successfully !");
        }

        else{
            redirect("add-product.php", "Something Went Wrong...");
        }

    }

    else{
        redirect("add-product.php", "All Fields Are Required !");
    }
}

else if(isset($_POST['update_product_btn'])){

    $product_id = $_POST['product_id'];
    $category_id = $_POST['category-id'];
    $category_gender = $_POST['category-gender'];

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    $small_description = mysqli_real_escape_string($con, $_POST['small_description']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $original_price = mysqli_real_escape_string($con, $_POST['original_price']);
    $selling_price = mysqli_real_escape_string($con, $_POST['selling_price']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_title = mysqli_real_escape_string($con,$_POST['meta_title']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $path = "../uploads";

    // Process and upload new image1
    $new_image1 = $_FILES['image']['name'];
    $update_filename1 = "";
    if($new_image1 != "")
    {
        $image_ext1 = pathinfo($new_image1, PATHINFO_EXTENSION);
        $update_filename1 = time() . '_1.' . $image_ext1;
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename1);
    }

    // Process and upload new image2
    $new_image2 = $_FILES['image2']['name'];
    $update_filename2 = "";
    if($new_image2 != "")
    {
        $image_ext2 = pathinfo($new_image2, PATHINFO_EXTENSION);
        $update_filename2 = time() . '_2.' . $image_ext2;
        move_uploaded_file($_FILES['image2']['tmp_name'], $path.'/'.$update_filename2);
    }

    // Process and upload new image3
    $new_image3 = $_FILES['image3']['name'];
    $update_filename3 = "";
    if($new_image3 != "")
    {
        $image_ext3 = pathinfo($new_image3, PATHINFO_EXTENSION);
        $update_filename3 = time() . '_3.' . $image_ext3;
        move_uploaded_file($_FILES['image3']['tmp_name'], $path.'/'.$update_filename3);
    }

    $update_product_query = "UPDATE products SET category_id='$category_id',name='$name',gender='$category_gender',slug='$slug',
    brand='$brand',rate='$rate',small_description='$small_description',description='$description',original_price='$original_price',
    selling_price='$selling_price',qty='$qty',status='$status',trending='$trending',meta_title='$meta_title',
    meta_description='$meta_description',meta_keywords='$meta_keywords'";

    // Update image fields if new images were uploaded
    if($update_filename1 != "") $update_product_query .= ",image='$update_filename1'";
    if($update_filename2 != "") $update_product_query .= ",image2='$update_filename2'";
    if($update_filename3 != "") $update_product_query .= ",image3='$update_filename3'";

    $update_product_query .= " WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run)
    {

        redirect("edit-product.php?id=$product_id", "Product Updated Successfully");
    }

    else
    {
        redirect("edit-product.php?id=$product_id", "Something Went Wrong !");
    }

}

else if (isset($_POST['delete_product_btn'])) {

    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];
    $image2 = $product_data['image2'];
    $image3 = $product_data['image3'];

    $delete_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {

        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }

        if(file_exists("../uploads/".$image2))
        {
            unlink("../uploads/".$image2);
        }

        if(file_exists("../uploads/".$image3))
        {
            unlink("../uploads/".$image3);
        }
        
        //redirect("product.php", "Product Deleted Successfully...");
        echo 200;
    }

    else
    {

        //redirect("product.php", "Something Went Wrong !");
        echo 500;

    }
}

else
{
    header('Location: ../index.php');
}

?>
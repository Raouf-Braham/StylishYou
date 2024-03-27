<?php

    include('functions/getSlugActive.php');
    include('Admin_dashboard/includes/header.php');

    if (isset($_GET['product'])) 
    {
        $product_slug = $_GET['product'];
        $product_data = getSlugActive("products", $product_slug);
        $product = mysqli_fetch_array($product_data);

        if ($product) 
        {
            
        }

        else 
        {
            echo "Product Not Found !";

        }

    }

    else 
    {
        echo "Something Went Wrong !";
    }
?>
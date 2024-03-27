<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>

                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-12">

                                <label class="mb-0">
                                    Select Category
                                </label>

                                <select name="category-id" class="form-select mb-2">
                                    <option selected>Select Category</option>
                                    <?php 

                                        $categories = getAll("categories");

                                        if(mysqli_num_rows($categories) > 0){

                                            foreach($categories as $item){
                                                ?>
                                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                <?php
                                            }

                                        }

                                        else{
                                            echo "No Category Available...";
                                        }

                                    ?>      

                                </select>

                                <label class="mb-0">
                                    Select Gender
                                </label>

                                <select name="category-gender" class="form-select mb-2">
                                <option selected>Select Product Gender</option>
                                    <option value="Men">Men</option>
                                    <option value="Women">Women</option>
                                    <option value="Both">Both</option>
                                </select>
                                                             
                            </div>
                            
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" required name="name" placeholder="Enter Product Name" class="form-control mb-2">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" required name="slug" placeholder="Enter Slug" class="form-control mb-2"> 
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Brand</label>
                                <input type="text" required name="brand" placeholder="Enter Product Brand" class="form-control mb-2"> 
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Rating</label>
                                <input type="number" step="0.01" required name="rate" placeholder="Enter Rating" class="form-control mb-2"> 
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" required name="small_description" placeholder="Enter Small Description" class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" required name="description" placeholder="Enter Description" class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Original Price</label>
                                <input type="number" step="0.01" required name="original_price" placeholder="Enter Original Price" class="form-control mb-2">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="number" step="0.01" required name="selling_price" placeholder="Enter Selling Price" class="form-control mb-2"> 
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Upload Image 1</label>
                                <input type="file" required name="image" class="form-control mb-2"> 
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Upload Image 2</label>
                                <input type="file" required name="image2" class="form-control mb-2"> 
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Upload Image 3</label>
                                <input type="file" required name="image3" class="form-control mb-2"> 
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" required name="qty" placeholder="Enter Quantity" class="form-control mb-2"> 
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Status</label><br>
                                    <input type="checkbox" name="status"> 
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Popular</label><br>
                                    <input type="checkbox" name="trending"> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" required name="meta_title" placeholder="Enter Meta Title" class="form-control mb-2"> 
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" required name="meta_description" placeholder="Enter Meta Description" class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" required name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">ADD</button>
                            </div>


                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>

<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

<style>
.table td,
.table th {
    border: 1.5px solid #dee2e6 !important;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center my-4">
            <div class="card" id="category_table">
                <div class="card-header">
                    <h4>CATEGORIES</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $category = getAll("categories");

                                if(mysqli_num_rows($category) > 0 ){
                                    foreach($category as $item){
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $item['id']; ?></th>

                                                <td><?= $item['name']; ?></td>
                                                
                                                <td>
                                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                </td>

                                                <td>
                                                    <?= $item['status'] == '0'? "Visible":"Hidden" ?>
                                                </td>

                                                <td>
                                                    <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    
                                                    <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id']; ?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }

                                else {
                                    echo "No records found";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>

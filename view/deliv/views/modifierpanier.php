<?php
session_start();
include('config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>Edit & Update Your Cart Details</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit & Update Your Cart Details
                            <a href="affp.php" class="btn btn-danger float-end">BACK</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $tbl_product_id = $_GET['id'];

                            $query = "SELECT * FROM tbl_product WHERE id=:tbl_product_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':tbl_product_id' => $tbl_product_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        }
                        ?>
                        <form action="codep.php" method="POST">

                            <input type="hidden" name="tbl_product_id" value="<?=$result->id?>" />

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $result->name; ?>" class="form-control" />
                            </div>
                          
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="number" name="price" value="<?= $result->price; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_panier_btn" class="btn btn-primary">Update Cart</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
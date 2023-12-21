<?php 
include('config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Data</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                
                    <div class="card-header">
                        <h3>Cart Data 
                          <a href="ajouterpanier.php" class="btn btn-primary float-end">
                            Add Menu To Cart
                          </a>
                        </h3>
                    </div>
                        
                    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Price</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                    $sort_option = "";
                                    if(isset($_GET['sort_alphabet']))
                                    {

                                        if($_GET['sort_alphabet'] == "a-z")
                                            {
                                                $sort_option = "ASC";
                                            }
                                        else if($_GET['sort_alphabet'] == "z-a")
                                        {
                                            $sort_option = "DESC";
                                        }
                                    }

                                    $query = "SELECT * FROM tbl_product";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();

                                    $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                                    $result = $statement->fetchAll();
                                    if($result)
                                    {
                                        foreach($result as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row->id; ?></td>
                                                <td><?= $row->name; ?></td>
                                                <td><?= $row->price; ?></td>
                                                <td><a href="modifierpanier.php?id=<?= $row->id; ?>" class="btn btn-primary"> Edit</a></td>
                                                <td> 
                                                 <form action="supprimerpanier.php" method="POST">
                                                    <button type="submit" name="delete_panier" value="<?=$row->id;?>" class="btn btn-danger">Delete
                                                    </button>
                                                 </form>
                                                </td>
                                            </tr>
                      
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
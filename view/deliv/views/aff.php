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

    <form action="" method="GET">
        
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                <select name="sort_alphabet">--Select Option</option>
                              <option value="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z"){ echo "selected";} ?> > A-Z (Ascending Order)</option>
                              <option value="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a"){ echo "selected";} ?> >Z-A (Descending Order)</option>
                        </select> 
                        <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                            
                         Sort
                        </button>
</form>
                        <div class="card-header">
                        <h3>Order Data 
                         <a href="ajoutercommande.php" class="btn btn-primary float-end">
                            Add Order
                         </a>
                        </h3>

                        
                    </div>
                        
                    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Number</th>
                                    <th>Address</th>
                                    <th>Date Of Order</th>
                                    <th>Email</th>
                                    <th>Payment</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Pin</th>

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

                                    $query = "SELECT * FROM command ORDER by name $sort_option";
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
                                                <td><?= $row->number; ?></td>
                                                <td><?= $row->address; ?></td>
                                                <td><?= $row->dateoford; ?></td>
                                                <td><?= $row->email; ?></td>
                                                <td><?= $row->pay; ?></td>
                                                <td><?= $row->city; ?></td>
                                                <td><?= $row->state; ?></td>
                                                <td><?= $row->pin; ?></td>
                                                <td><a href="modifiercommande.php?id=<?= $row->id; ?>" class="btn btn-primary"> Edit</a></td>
                                                <td> 
                                                 <form action="supprimercommande.php" method="POST">
                                                    <button type="submit" name="delete_command" value="<?=$row->id;?>" class="btn btn-danger">Delete
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
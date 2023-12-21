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

    <title>Edit & Update Your Order Details</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit & Update Your Order Details
                            <a href="aff.php" class="btn btn-danger float-end">BACK</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $command_id = $_GET['id'];

                            $query = "SELECT * FROM command WHERE id=:command_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':command_id' => $command_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        }
                        ?>
                        <form action="code.php" method="POST">

                            <input type="hidden" name="command_id" value="<?=$result->id?>" />

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $result->name; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Number</label>
                                <input type="text" name="number" value="<?= $result->number; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" value="<?= $result->address; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Date Of Birth</label>
                                <input type="datetime-local" name="dateoford" value="<?= $result->dateoford; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_command_btn" class="btn btn-primary">Update Commande</button>
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
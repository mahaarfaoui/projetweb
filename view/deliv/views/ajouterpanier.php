<?php 
    session_start(); ?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Cart Details</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">

                 <div class="card">
                            <div class="card-header">
                                <h3>Add New Menu To Cart
                                <a href="affp.php" class="btn btn-danger float-end">BACK</a>

                             </h3>
                            </div>
                    <div class="card-body">
                        
                        
                        <form action="codep.php" method="POST">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                           
                          
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" />
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_panier_btn" class="btn btn-primary">Add New Menu </button>
                                
                            </div>
                            
                        </form>
                            
                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
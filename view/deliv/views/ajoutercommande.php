<?php 
    session_start(); 
    
    ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Insert Your Order Details</title>
</head>
<body>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
               
            
                 <div class="card">
                            <div class="card-header">
                                <h3>Add Your Order Details
                                 <a href="aff.php" class="btn btn-danger float-end">BACK</a>
                             </h3>
                            </div>
                    <div class="card-body">
                        
                        
                        <form action="code.php" method="POST">
          
                        
                        <div class="mb-3">
                               <b> <label>Full Name</label></b>
                                <input type="text" name="name" id="name" class="form-control" required />
                            </div>
                           
                            <div class="mb-3">
                            <b> <label>Number</label></b>
                                <input type="text" name="number" id="number" class="form-control" required />
                            </div>
                            <div class="mb-3">
                            <b> <label>Address</label></b>
                                <input type="text" name="address" class="form-control" required />
                            </div>
                            <div class="mb-3">
                            <b> <label>Email</label></b>
                                <input type="text" name="email" class="form-control" required />
                            </div>
                            <div class="mb-3">
                            <b> <label>Payment Method</label></b>
                                <input type="text" name="pay" class="form-control" required />
                            </div>
                            <div class="mb-3">
                            <b> <label>City</label></b>
                                <input type="text" name="city" class="form-control" required />
                            </div>
                            <div class="mb-3">
                            <b> <label>State</label></b>
                                <input type="text" name="state" class="form-control" required />
                            </div>
                            <div class="mb-3">
                            <b> <label>Pin Code</label></b>
                                <input type="text" name="pin" class="form-control" required />
                            </div>
                            
                            
                            <div class="mb-3">
                                <button type="submit" name="save_commande_btn" class="btn btn-primary" onclick="forms()">Save Command</button>
                            </div>
                           
                        </form>
        <div id="set" >
        <i id="see" onclick="see()" ></i>
         </div>
           <div id="check0">
                <i class="far fa-check-circle"></i>  <span> Name Length Should Be More Than 5.</span>
           </div>
           <div id="check1">
                <i class="far fa-check-circle"></i>  <span> Phone Number Should Be Atleast 8 Digits.</span>
           </div>
           <div id="check2">
                <i class="far fa-check-circle"></i>  <span> Contains numerical character.</span>
           </div>
                        <script defer src="val.js"></script>



                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Insert Your Order Details</title>
</head>

<div class="bg">
  <img src="backg.jpg" alt="">
</div>
<style>
    .bg {
  position: fixed; 
  top: -50%; 
  left: -50%; 
  width: 200%; 
  height: 200%;
}
.bg img {
  position: absolute; 
  top: 0; 
  left: 0; 
  right: 0; 
  bottom: 0; 
  margin: auto; 
  min-width: 50%;
  min-height: 50%;
}
</style>
<body>
<body background ="backg.jpg"> 
   
   </body>
   
    <div class="container ">
        <div class="row align-items-center ">
            <div class="col-md-8 mt-4 align-items-center">
            
<style>
	

 body{
    text-align:center

 }

 p {
 	font-size: 30px;
 }
 form {
    margin-left: 15%;
    margin-right:15%;
    width: 70%;
}
.mt-4 {
    margin-top: 18.5rem!important;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 19px;
    word-wrap: break-word;
    background-color: grey
    ;
    background-clip: border-box;
    /* border: 1px solid rgba(0,0,3,.125); */
    border-radius: 2.25rem;
}
.col-md-8 {
    flex: 1 0 auto;
    width: 66.66666667%;
}
	
</style>

                 <div class="card">
                            <div class="card-header">
                                <h3>Add Your Order Details
                                 <a href="../panier.php" class="btn btn-danger float-end">BACK</a>
                             </h3>
                            </div>
                    <div class="card-body ">
                        
                        
                        <form action="../../../index.php" method="POST">
          
                        
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
         <b> <div id="check0">
                <i class="far fa-check-circle"></i>  <span> 1-Name Length Should Be More Than 5.</span>
           </div>
           <div id="check1">
                <i class="far fa-check-circle"></i>  <span> 2-Phone Number Should Be Atleast 8 Digits.</span>
           </div>
          
                        <script defer src="val.js"></script>



                    </div></b>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
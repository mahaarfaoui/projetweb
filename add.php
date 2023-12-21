<?php
 
 session_start();
 $servername = "localhost" ; 
     $username = "root" ;
     $password = "" ; 
     $db = "projetweb" ;
     $conn = null ; 
     try {
         $conn = new PDO("mysql:host=$servername;dbname=$db", $username , $password) ; 
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //echo "Connected successfully <br/>";
         } catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
         }
 
         
       
            


    if (!isset($_POST["first_name"]) || !isset($_POST["last_name"]) || !isset($_POST["email"]) || !isset($_POST["table"]) || !isset($_POST["date"])) {
        die(" hott l datas! ");
    }

    $name = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $email = $_POST["email"];
    //$gender = $_POST["gender"];
    $table = $_POST["table"];
    $phone = $_POST["phone"] ; 
    $date = $_POST["date"];

    try{

        $check = "SELECT * FROM reservations WHERE tawla ='$table' AND theDate='$date'" ; 
        $statement = $conn -> query($check) ; 
        $data = $statement -> fetch() ; 
        if ($data) {
            die("Table is already reserved ! ") ; 
        }
        else {
            $req = "INSERT INTO reservations VALUES('', '$name.' '.$lname' , '$email' , '$phone' ,'$date', '$table' , '', 'Virtual User ! ')"; 
        
            try{
                $conn -> exec($req) ; 
                print("<main style='width : 100%;
                height : 100vh ; 
                display :flex ; 
                align-items : center ; 
                justify-content : center ; '>
        
            <div style='width : 600px ; 
                height : auto ; 
                padding : 10px ; 
                background:rgb(29, 28, 28) ; '>
                <p style='color : white ;
                text-align:center; 
                font-weight : bold ; font-family : arial ;'>
                    Thanks for your reservation , we will call to confirm your reservation soon.
                    You will be redirected back in 5 seconds. If not, <a href='index.php'>Click here</a>
                    
                
                    
                </p>
                
            </div>
            </main>");
            header("refresh:5;location::index.php");
             
            }
            catch(PDOException $e) {
                die($e -> getMessage()) ; 
            } 
            
        }
    }
    catch(PDOException $e) {
        die($e -> getMessage()) ;
    }
    
    
    
    //to check if the datas are set and  valid 
    
    //storing the datas coming from the form to make it easier on the sql code so 
    
    
    
    
    
    //checking the existence of an already reserved table
    
    
    /*
    try{
        $change = "UPDATE TABLE tawla SET status WHERE id = '$table'" ; 
        $conn-> exec($change) ; 
        print("Done Changing the datas ! ") ; 
    }
    catch(PDOException $l){
        die($l -> getMessage()) ;
    }



    //sql request 
    $req = "INSERT INTO reserations VALUES('','$name','$lname' , '$email' , '$gender' , '$table', '$date')";

//checking the connecion response 
//verifying if it is saved or nah ! 
if ($conn->query($req)) {

    
    print("Done saving the datas :')! ");
} else {
    die("error saving the datas :'(");
}

$check = "SELECT * FROM reservations where tawla='$table' and theDate='$date'";
$stmt = $conn -> query($check) ;
if ($result = $conn->query($check)) {
    if ($result->num_rows > 0) {

        die("This table is already reserved ! choose for another day ! ");
    }
}

<html><head><style>

    main {
        width : 100%;
        height : 100vh ; 
        display :flex ; 
        align-items : center ; 
        justify-content : center ; 
        
        
    }
    .msg_container{
        width : 300px ; 
        height : auto ; 
        padding : 10px ; 
        background:black ; 
        
        
    }
    .msg_container p {
        color : white ;
        text-align:center; 
        font-weight : bold ; 
        
    }
</style>


</head><body><main style='width : 100%;
        height : 100vh ; 
        display :flex ; 
        align-items : center ; 
        justify-content : center ; '>

    <div style='width : 300px ; 
        height : auto ; 
        padding : 10px ; 
        background:black ; '>
        <p style='color : white ;
        text-align:center; 
        font-weight : bold ; '>
            
        </p>
        
    </div></main>
*/
<?php

/*

    function connect($db) {
        $servername = "localhost" ; 
        $username = "root" ;
        $password = "" ; 

        $conn = null ; 
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username , $password) ; 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br/>";
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }

            return $conn ; 
        }


        function conn() {
            return connect("restau") ; 
        }
        print(connect("restau")) ; 

function connect ($dbname) {
    
    $servername = "localhost" ; 
    $username = "root" ;
    $password = "" ; 
    $conn = new mysqli($servername , $username, $password , $dbname) ; 
    return $conn ; 
}

//function that will connect to the krustykrabs db so we don't have to type it 
function conn () {
   return connect("restau")  ; 
}
   

   */
?>
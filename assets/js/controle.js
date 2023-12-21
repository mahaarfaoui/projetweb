function passValidation(){
    var a,b,c,d,f,s;
    c=document.getElementById("usern").value;
    d=document.getElementById("emai").value;
    a=document.getElementById("pass").value; //a=document.quereySelector("#pass1").value;
    b=document.getElementById("cpass").value;
    f=document.getElementById("f").value;
    s=document.getElementById("ch").value;
    
    if (a =="" || b ==""|| c==""|| d=="") {alert("Please fill in the form!");}
    else if(a!=b){ alert("Passwords don't match!");} 
    else {alert("Account successfully created!");}
    
    }
    var myf =document.getElementById("myf");
            
    myf.addEventListener("keyup", function(e) { 
    e.preventDefault();
    var error1,error2;
    var correct1,correct2;
    
    var username=document.getElementById("usern");
    var mdp=document.getElementById("pass");
    var cmdp=document.getElementById("cpass");
    
    
    if (username.value.length<4&&mdp.value.length>=4){
        if (username.value.length!=0){
        error1="The username should contain 4+ characters";
    
        document.getElementById("error1").innerHTML=error1;
        document.getElementById("error2").innerHTML="<p style='color:green'> Correct </p>";
       
        }
        else { document.getElementById("error1").innerHTML="";}
    document.getElementById("error2").innerHTML="<p style='color:green'> Correct </p>";
    e.preventDefault();
        return false;
    }
    else if (username.value.length>=4&&mdp.value.length<4){
        if (mdp.value.length!=0){ 
            document.getElementById("error2").innerHTML="<p style='color:red'> Weak </p>";
            document.getElementById("error1").innerHTML="<p style='color:green'> Correct </p>";
        }  
       else { document.getElementById("error2").innerHTML=""; 
       document.getElementById("error1").innerHTML="<p style='color:green'> Correct </p>";}
        
    
    document.getElementById("error1").innerHTML="<p style='color:green'> Correct </p>";
    e.preventDefault();
    return false ;
    }
    else if (username.value.length<4 && mdp.value.length<4){
        error1="The username should contain 4+ characters";
   

       if(username.value.length!=0 && mdp.value.length!=0){
       
        document.getElementById("error1").innerHTML=error1;
        document.getElementById("error2").innerHTML="<p style='color:red'> Weak</p>";}
    
        else if (mdp.value.length!=0 && username.value.length==0) { document.getElementById("error1").innerHTML="";
        document.getElementById("error2").innerHTML="<p style='color:red'> Weak</p>";}
    
    else if (mdp.value.length==0 && username.value.length!=0){document.getElementById("error1").innerHTML=error1;
    document.getElementById("error2").innerHTML="";}
    
    else {document.getElementById("error1").innerHTML="";
          document.getElementById("error2").innerHTML="";}
        
       
        e.preventDefault();
    
            return false;
    }
    else {
    document.getElementById("error1").innerHTML="<p style='color:green'> Correct </p>";
    document.getElementById("error2").innerHTML="<p style='color:green'> Correct </p>";
    return true;
    }
    
    
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*function control(){
        let myError=document.getElementById("error");
        if (document.getElementById("prenom").length<4){
            myError.innerHTML="Le nom doit compter au minimum 3 caractères."
            myError.style.color='red';  
     
        }
    }*/
    
    
    
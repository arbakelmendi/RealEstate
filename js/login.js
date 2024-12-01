//function to check if user exists and has typed correct password
function validateUser(){
    let username = document.getElementById("username").value; 
    let password = document.getElementById("password").value; 
    
    //validate 
    if(username=="Admin" & password == "Admin123" ) {
        alert("Bravo o KING!")
    }
    else {
        alert("Gabim!")
    }
}


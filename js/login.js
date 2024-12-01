//function to check if user exists and has typed correct password
function validateUser(){
    let username = document.getElementById("username").value; // Arba
    let password = document.getElementById("password").value; // Password123
    
    //validate 
    if(username=="Arba" & password == "Password123" ) {
        alert("Bravo o KING!")
    }
    else {
        alert("Lem Rahaat aaabi")
    }
}


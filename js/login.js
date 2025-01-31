// Make a post request to send email and user to the PHP-server


const myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

const response = fetch("http://localhost/login.php", {
  method: "POST",
  body: JSON.stringify({ username: "example", password: "Admin" }),
  headers: myHeaders,
});




/*
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
*/

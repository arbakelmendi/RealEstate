const inputs=document.querySelectorAll(".contact-input");
const form = document.querySelector(".contact-form");

inputs.forEach((ipt) =>{
    ipt.addEventListener("focus", () =>{
        ipt.parentNode.classList.add("focus");
        ipt.parentNode.classList.add("not-empty");
    })
} )
inputs.forEach((ipt)=>{
    ipt.addEventListener("blur", () =>{
        if(ipt.value==""){
            ipt.parentNode.classList.remove("not-empty");
        }
        ipt.parentNode.classList.remove("focus");
    })
} )



//------------------------------------------------------------------------------------------------------


function submitForm(event) {
    event.preventDefault();
    
    let isValid = true;
    const formData = {};

    inputs.forEach((ipt) => {
        const value = ipt.value.trim();
        const name = ipt.getAttribute("name");

        if (!value) {
            alert(`${name} nevojitet emri`);
            ipt.focus();
            isValid = false;
            return;
        }

        if (name === "Email" && !validateEmail(value)) {
            alert("Ju kerkojme te shkruani nje email te perdorueshem");
            ipt.focus();
            isValid = false;
            return;
        }

        formData[name] = value;
    });

    if (isValid) {
        const myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        fetch("http://localhost/contactUs.php", {
            method: "POST",
            headers: myHeaders,
            body: JSON.stringify(formData)
        })
        .then(response => response.text())
        .then(data => {
            console.log('Success:', data);
            alert("Forma eshte plotesuar me sukses");
            form.reset();
        })
        .catch((error) => {
            console.error('Error:', error);
            alert("Ndodhi nje gabim, ju lutem provoni perseri");
        });
    }
}
//----------------------------------------------------------------------------------------------------------------








/*
form.addEventListener("submit", (event) => {
    event.preventDefault(); 

    let isValid = true;

    inputs.forEach((ipt) => {
        const value = ipt.value.trim();
        const name = ipt.getAttribute("name");

        
        if (!value) {
            alert(`${name} nevojitet emri`);
            ipt.focus();
            isValid = false;
            return;
        }

        
        if (name === "Email" && !validateEmail(value)) {
            alert("Ju kerkojme te shkruani nje email te perdorueshem");
            ipt.focus();
            isValid = false;
            return;
        }
    });

    
    if (isValid) {
        alert("Forma eshte plotesuar me sukses");
        form.submit();
    }
});
*/

function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}


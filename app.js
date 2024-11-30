const inputs=document.querySelectorAll(".contact-input");

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
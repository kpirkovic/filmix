//Sidebar
const nav = document.querySelector('nav');
const collapseBTN = document.querySelector('.collapse-nav');
const navLinks = document.querySelectorAll('nav span');
const logo = document.querySelector('.logo');
const fullLogo = logo.textContent;

let clickCounter = 0;

if(localStorage.getItem("nav")){
    collapseNav();
    clickCounter = 1;
    document.body.style.display = 'flex';
} else {
    document.body.style.display = 'flex';
}

collapseBTN.addEventListener('click', ()=> {
    clickCounter++;
    if(clickCounter == 1){
        collapseNav();
        localStorage.setItem("nav", "true");
    } else {
        openNav();
        localStorage.removeItem("nav");
    }
})

function collapseNav(){
    logo.textContent = logo.textContent.substring(1, fullLogo);
    nav.style.width = '5rem';
    collapseBTN.style.transform = 'rotateZ(180deg)';
    navLinks.forEach(element => {
        element.style.display = 'none';
    });
}
function openNav(){
    logo.textContent = fullLogo;
    clickCounter = 0;
    nav.style.width = '12rem';
    collapseBTN.style.transform = 'rotateZ(0deg)';
    navLinks.forEach(element => {
        element.style.display = 'flex';
    });
}
//Upload Picture
const img = document.getElementById('file_upload_img');
const fileInput = document.getElementById('directors_img');

fileInput.addEventListener('change', ()=>{
    const reader = new FileReader();
    reader.addEventListener('load', ()=> {
        img.src = reader.result;
        img.alt = fileInput.files[0].name;
    });
    reader.readAsDataURL(fileInput.files[0]);
});

//Form Validation
const inputs = document.querySelectorAll("input:not(input[type='submit'], input[type='file']), textarea, select");
console.log(inputs)
const submitForm = document.querySelector("input[type='submit']");
//Creating a Eror Message Element
const popUp = document.createElement('span');
popUp.classList.add('popup-box', 'alert', 'alert-danger');
popUp.textContent = 'Please fill the inputs';
popUp.style.animationDuration = '1s';

submitForm.addEventListener('click', (e)=>{
    inputs.forEach(i => {
        if(!i.value){
            e.preventDefault();
            i.style.border = '1px solid var(--bs-danger)';
            document.body.appendChild(popUp);
        } else {
            i.style.boxShadow = '0px 0px 5px var(--bs-ifno)';
        }
    })
});
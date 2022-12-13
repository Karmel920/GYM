console.log("HEY");

const closeButton = document.querySelector(".close-nav");
const nav = document.querySelector(".nav");
const openButton = document.querySelector(".open-nav");
const sex = document.querySelector("#sex");
const age = document.querySelector("#age");
const height = document.querySelector("#height");
const weight = document.querySelector("#weight");
const aim = document.querySelector("#aim");
const saveButton = document.querySelector(".button-save");
const allFields = [sex, age, height, weight, aim];

console.log(age.value);

allFields.forEach(item=>{
    item.addEventListener("keyup", e=>{
        const check = age.value!=='' && height.value!=='' && weight.value!=='';
        console.log(check);
        saveButton.disabled = !check;
    })
})

saveButton.addEventListener("click", e=>{
    console.log('hellooo');
    location.href='/settings';
    alert('jestes kocur, udalo ci sie wpisac poprawne dane');
})

closeButton.addEventListener("click", ()=>{
    nav.classList.toggle("hidden");
});

openButton.addEventListener("click", ()=>{
    nav.classList.toggle("hidden");
});

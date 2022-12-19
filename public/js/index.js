const sex = document.querySelector("#sex");
const age = document.querySelector("#age");
const height = document.querySelector("#height");
const weight = document.querySelector("#weight");
const aim = document.querySelector("#aim");
const saveButton = document.querySelector(".button-save");
const allInputs = [age, height, weight];
const allSelects = [sex, aim];

allInputs.forEach(item=>{
    item.addEventListener("keyup", e=>{
        const check = age.value!=='' && height.value!=='' && weight.value!=='' && sex.value!=='' && aim.value!=='';
        saveButton.disabled = !check;
    })
})

allSelects.forEach(item=>{
    item.addEventListener("change", e=>{
        const check = age.value!=='' && height.value!=='' && weight.value!=='' && sex.value!=='' && aim.value!=='';
        saveButton.disabled = !check;
    })
})

saveButton.addEventListener("click", e=>{
    console.log('hellooo');
    location.href='/settings';
    alert('jestes kocur, udalo ci sie wpisac poprawne dane');
})

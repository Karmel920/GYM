const saveButton = document.querySelector(".button-save");
const name = document.querySelector("#name");
const kcal = document.querySelector("#kcal");
const proteins = document.querySelector("#proteins");
const fats = document.querySelector("#fats");
const carbs = document.querySelector("#carbs");
const allInputs = [name, kcal, proteins, fats, carbs];
console.log(saveButton);

allInputs.forEach(item=>{
    item.addEventListener("keyup", e=>{
        const check = name.value!=='' && kcal.value!=='' && proteins.value!=='' && fats.value!=='' && carbs.value!=='';
        saveButton.disabled = !check;
    })
})


const saveButton = document.querySelector(".button-save");
const name = document.querySelector("#name");
const kcal = document.querySelector("#kcal");
const proteins = document.querySelector("#proteins");
const fats = document.querySelector("#fats");
const carbs = document.querySelector("#carbs");
const allInputs = [name, kcal, proteins, fats, carbs];
const mess = document.querySelector(".message");

allInputs.forEach(item=>{
    item.addEventListener("keyup", e=>{
        const check = name.value!=='' && kcal.value!=='' && proteins.value!=='' && fats.value!=='' && carbs.value!=='';
        saveButton.disabled = !check;
    })
})

saveButton.addEventListener('click', addNewMeal);

function addNewMeal() {
    const data = {date: document.querySelector(".date-day").innerText, name: name.value, kcal: kcal.value,
                  proteins: proteins.value, fats: fats.value, carbs: carbs.value};
    fetch("/addNewMeal", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (message) {
        if(message['message'] === 'added') {
            mess.innerText = "Meal successfully added!";
        }
    });
}



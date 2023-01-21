const showMealsButton = document.querySelector(".button-day-meals");
const mealsContainer = document.querySelector(".meals");
const macroContainer = document.querySelector(".sum-container");

showMealsButton.addEventListener('click', evt => {
    evt.preventDefault();
    showMeals();
    showSumMacros();
    showUserMacros();
})

function showMeals() {
    const data = {date: document.querySelector(".date-day").innerText}
    fetch("/getMealByDay", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response){
        return response.json();
    }).then(function (meals){
        mealsContainer.innerHTML = "";
        loadMeals(meals);
    });
}

function loadMeals(meals) {
    meals.forEach(meal =>{
        createMeal(meal);
    });
}

function createMeal(meal) {
    const template = document.querySelector("#meal-template");

    const clone = template.content.cloneNode(true);

    const name = clone.querySelector("h2");
    name.innerHTML = meal.name;
    const kcal = clone.querySelector(".meal-kcal");
    kcal.innerHTML = `kcal: ${meal.kcal}`;
    const proteins = clone.querySelector(".meal-proteins");
    proteins.innerHTML = `proteins: ${meal.proteins}g`;
    const fats = clone.querySelector(".meal-fats");
    fats.innerHTML = `fats: ${meal.fats}g`;
    const carbs = clone.querySelector(".meal-carbs");
    carbs.innerHTML = `carbs: ${meal.carbs}g`;
    
    mealsContainer.appendChild(clone);
}



function showSumMacros() {
    const data = {date: document.querySelector(".date-day").innerText}
    fetch("/getSumMacros", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response){
        return response.json();
    }).then(function (sumMacros){
        macroContainer.innerHTML = "";
        createSumMacros(sumMacros);
    });
}

function createSumMacros(sumMacros)
{
    const template = document.querySelector("#summarise-template");

    const clone = template.content.cloneNode(true);

    const skcal = clone.querySelector(".macro-kcal");
    skcal.innerHTML = `kcal: ${sumMacros[0].skcal}`;
    const sproteins = clone.querySelector(".macro-proteins");
    sproteins.innerHTML = `proteins: ${sumMacros[0].sproteins}g`;
    const sfats = clone.querySelector(".macro-fats");
    sfats.innerHTML = `fats: ${sumMacros[0].sfats}g`;
    const scarbs = clone.querySelector(".macro-carbs");
    scarbs.innerHTML = `carbs: ${sumMacros[0].scarbs}g`;

    macroContainer.appendChild(clone);
}



function showUserMacros()
{
    fetch("/getUserMacros").then(function (response){
        return response.json();
    }).then(function (userMacros){
        // macroContainer.innerHTML = "";
        createUserMacros(userMacros);
    });
}

function createUserMacros(userMacros)
{
    const template = document.querySelector("#user-macro-template");

    const clone = template.content.cloneNode(true);

    const kcal = clone.querySelector(".user-kcal");
    kcal.innerHTML += `${userMacros.kcal}`;
    const proteins = clone.querySelector(".user-proteins");
    proteins.innerHTML += `${userMacros.proteins}g`;
    const fats = clone.querySelector(".user-fats");
    fats.innerHTML += `${userMacros.fats}g`;
    const carbs = clone.querySelector(".user-carbs");
    carbs.innerHTML += `${userMacros.carbs}g`;

    macroContainer.appendChild(clone);
}

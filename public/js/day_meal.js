import { showMeals, showSumMacros, showUserMacros } from './show_day_meals.js';

const overlay = document.querySelector(".overlay");
const buttonNewMeal = document.querySelector(".button-new-meal");
const buttonAddMeal = document.querySelector(".button-add-meal");
const dateHeader = document.querySelector(".date-day");
const mealName = document.querySelector(".meal-name");
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const dayDate = urlParams.get('day');
const date = new Date(dayDate);

dateHeader.innerHTML = date.toLocaleDateString('en-CA');

showInfo();

buttonAddMeal.addEventListener('click', evt => {
    evt.preventDefault();
    addMealToDay();
    sleep(500).then(() => {
        showInfo();
    });
})

buttonNewMeal.addEventListener('click', evt => {
    evt.preventDefault();
    overlay.classList.add("visible");
})

mealName.addEventListener("keyup", evt => {
    const check = mealName.value!=='';
    buttonAddMeal.disabled = !check;
})

document.addEventListener('click', e=>{
    const pop = e.target.closest(".close-menu");
    if(pop){
        let mess = document.querySelector(".message");
        mess.innerText = "";
        overlay.classList.remove("visible");
    }
});

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function showInfo() {
    sleep(500).then(() => {
        showMeals();
    });
    sleep(500).then(() => {
        showSumMacros();
    });
    sleep(500).then(() => {
        showUserMacros();
    });
}

function addMealToDay() {
    const data = {date: document.querySelector(".date-day").innerText, name: mealName.value};
    fetch("/addMealToDay", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (message) {
        if(message['message'] === 'failed') {
            document.getElementById('name-input').value='';
            alert('There is no such meal in the database! Type correct name');
        }
        if(message['message'] === 'success') {
            document.getElementById('name-input').value='';
            alert('Meal added to day!');
        }
    });
}

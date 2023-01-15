const overlay = document.querySelector(".overlay");
const buttonNewMeal = document.querySelector(".button-new-meal");
const buttonAddMeal = document.querySelector(".button-add-meal");
const dateHeader = document.querySelector(".date-day");
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const dayDate = urlParams.get('day');
const date = new Date(dayDate);
dateHeader.innerHTML = date.toLocaleDateString('en-CA');

buttonAddMeal.addEventListener('click', evt => {
    evt.preventDefault();
})

buttonNewMeal.addEventListener('click', evt => {
    evt.preventDefault();
    overlay.classList.add("visible");
})

document.addEventListener('click', e=>{
    const pop = e.target.closest(".close-menu");
    if(pop){
        overlay.classList.remove("visible");
    }
});


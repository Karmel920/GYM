const overlay = document.querySelector(".overlay");
const buttonNewMeal = document.querySelector(".button-new-meal");
const dateHeader = document.querySelector(".date-day");
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const dayDate = urlParams.get('day');
const date = new Date(dayDate);
console.log(date.toLocaleDateString('en-CA'));

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

dateHeader.innerHTML = date.toLocaleDateString('en-CA');

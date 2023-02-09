const currentDate = document.querySelector(".current-date");
const daysTag = document.querySelector(".days");
const prevNextIcon = document.querySelectorAll(".icons span");

let date = new Date();
let currYear = date.getFullYear();
let currMonth = date.getMonth();

const months = ["January","February","March","April","May","June","July",
                "August","September","October","November","December"];
const renderCalendar = () => {
    const firstDayofMonth = new Date(currYear, currMonth, 1).getDay();
    const lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate();
    const lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay();
    const lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
    let spanTag = "";

    for (let i = firstDayofMonth; i > 0; i--) {
        spanTag += `<span class="inactive">${lastDateofLastMonth - i + 1}</span>`;
    }
    
    for (let i = 1; i <= lastDateofMonth; i++) {
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
        const id = [(currMonth + 1).toString(), i.toString(), currYear.toString()];
        const idString = id.join('-');
        spanTag += `<span data-id="${i}-${currMonth + 1}-${currYear}" onclick="handleDay('${idString}')" class="${isToday} current-month">${i}</span>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) {
        spanTag += `<span class="inactive">${i - lastDayofMonth + 1}</span>`
    }

    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = spanTag;
}

renderCalendar();

prevNextIcon.forEach(icon => {
    icon.addEventListener("click", ()=>{
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) {
            date = new Date(currYear, currMonth);
            currYear = date.getFullYear();
            currMonth = date.getMonth();
        } else{
            date = new Date();
        }
        renderCalendar();
    });
});

function handleDay(day){
   location.href=`/day_meals?day=${day}`;
}

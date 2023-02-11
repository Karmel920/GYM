const searchInput = document.querySelector(".meal-name");
const searchBar = document.querySelector(".search-bar");

searchInput.addEventListener("keydown", evt => {
    sleep(500).then(() => {
        if(!searchInput.value) {
            searchBar.innerHTML = "";
            searchBar.classList.add("hide");
            return;
        }
        getSearchMeals();
    });
})

function getSearchMeals() {
    const data = {search: searchInput.value};
    fetch("/getSearchMeals", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (searchMeals) {
        printMeals(searchMeals);
    });
}

function completeForm(mealName) {
    searchInput.value = mealName;
    searchBar.innerHTML = "";
    searchBar.classList.add("hide");
}

function printMeals(searchMeals) {
    searchBar.classList.remove("hide");
    searchBar.innerHTML = "";
    if(searchMeals.length >= 1){
        searchMeals.forEach(meal =>{
            searchBar.insertAdjacentHTML("afterbegin", `<p class="p-click" onclick="completeForm('${meal.name}')">${meal.name}</p>`);
        });
    } else {
        searchBar.classList.add("hide");
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


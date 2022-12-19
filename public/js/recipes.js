"use strict";
const searchButton = document.querySelector(".button-search");
const inputSearch = document.querySelector(".input-search-recipes");
const recipesContainer = document.querySelector(".recipes");
let recipeButtons = document.querySelectorAll(".button-recipe");
const allRecipesContainer = document.querySelector(".recipes");
const overlay = document.querySelector(".overlay");

allRecipesContainer.addEventListener('click', e=>{
    console.log(e.target);
    const box = e.target.closest(".button-recipe");
    if(box){
        const recipe_id = e.target.closest('.recipe-box').dataset.id;
        overlay.classList.add("visible");
        console.log(recipe_id);
    //     function to show recipe
    }
});
document.addEventListener('click', e=>{
    const pop = e.target.closest(".close-recipe")
    if(pop){
        overlay.classList.remove("visible");
    }
})

searchButton.addEventListener("click", async ()=>{
    const valueSearch = inputSearch.value;
    const response = await fetch(`https://api.spoonacular.com/recipes/complexSearch?apiKey=${API_KEY}query=${valueSearch}`);
    const data = await response.json();
    const recipes = data.results; //[{},{}]
    let displayedMeals =[];
    console.log(recipes);

    recipesContainer.innerHTML = "";

    recipes.forEach(item=>{

        fetch(`https://api.spoonacular.com/recipes/${item.id}/nutritionWidget.json?apiKey=1977bd4b82df465682b7937d2ccf4b0d&`).then(response=>{
            return response.json();
        }).then(data=>{
            // console.log(data);
            const meal = {
                id: item.id,
                name: item.title,
                image: item.image,
                kcal: data.calories,
                carbs: data.carbs,
                fat: data.fat,
                protein: data.protein
            };
            displayedMeals.push(meal);
            generatePreview(meal);

        })
    });


console.log("hej");

    console.log(displayedMeals);

})
const getView = function (){
    const recipesButtons = document.querySelectorAll(".button-recipe");
    console.log(recipesButtons);
}

const generatePreview =function(meal){
    const html =`<div class="recipe-box" data-id="${meal.id}">
                            <div class="img-container">
                                <img src=${meal.image}>
                            </div>
                            <h2>${meal.name}</h2>
                            <a href="#" class="button button-recipe">Show recipe</a>
                  </div>`;
    recipesContainer.insertAdjacentHTML("afterbegin", html);
    recipeButtons = document.querySelectorAll(".button-recipe");
    console.log(recipeButtons);
}
//
// const showDetailRecipe = function()


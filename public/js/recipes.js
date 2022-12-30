"use strict";
const searchButton = document.querySelector(".button-search");
const inputSearch = document.querySelector(".input-search-recipes");
const recipesContainer = document.querySelector(".recipes");
let recipeButtons = document.querySelectorAll(".button-recipe");
const allRecipesContainer = document.querySelector(".recipes");
const overlay = document.querySelector(".overlay");

// allRecipesContainer.addEventListener('click', e=>{
//     console.log(e.target);
//     const box = e.target.closest(".button-recipe");
//     if(box){
//         const recipe_id = e.target.closest('.recipe-box').dataset.id;
//         overlay.classList.add("visible");
//         console.log(recipe_id);
//     //     function to show recipe
//     }
// });

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
    console.log(data);

    recipesContainer.innerHTML = "";

    recipes.forEach(item=>{

        fetch(`https://api.spoonacular.com/recipes/${item.id}/nutritionWidget.json?apiKey=${API_KEY}`).then(response=>{
            return response.json();
        }).then(macros=>{
            console.log(macros);
            const meal = {
                id: item.id,
                name: item.title,
                image: item.image,
                kcal: macros.calories,
                carbs: macros.carbs,
                fat: macros.fat,
                protein: macros.protein
            };
            displayedMeals.push(meal);
            console.log(meal);
            generatePreview(meal);

        })
    });

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
                            <div class="macro-container">
                                <span class="kcal">calories: ${meal.kcal}</span>
                                <div class="macros">
                                    <span>protein: ${meal.protein}</span>
                                    <span>fats: ${meal.fat}</span>
                                    <span>carbs: ${meal.carbs}</span>
                                </div>
                            </div>
                            <a href="#" onclick="showRecipe(${meal.id}, '${meal.name}')" class="button button-recipe">Show recipe</a>
                 </div>`;
    recipesContainer.insertAdjacentHTML("afterbegin", html);
    recipeButtons = document.querySelectorAll(".button-recipe");
    console.log(recipeButtons);
}
//
// const showDetailRecipe = function()

const showRecipe = async(id, name='czosnek')=>{
    overlay.classList.add("visible");
    const guide = await getRecipeGuide(id);
    const stepHtml = guide.map(item=>{
        return `<p>${item.number} ${item.step}</p>`
    }).join('');

    const ingHtml = guide.map(item=>{
        return item.ingredients.map(ing=>{
            return `<span>${ing.name}</span>`
        }).join(', ');
    }).join(' ');

    const html=`
        <div class="popup">
             <div class="close-container"><i class="fa-solid fa-xmark close-recipe"></i></div>
             <h1>${name}</h1>
             <div class="recipe-info">
                <h2>Ingredients:</h2>
                ${ingHtml}
                <h2>Recipe Guide:</h2>
                ${stepHtml}
             </div>
        </div>
    `
    overlay.innerHTML = html;
}

//get recipe guide from API
const getRecipeGuide = async (id)=>{
    const response = await fetch(`https://api.spoonacular.com/recipes/${id}/analyzedInstructions?apiKey=${API_KEY}`);
    const data = await response.json();
    return data[0].steps;
}
import data from "./menus.json" assert {type: "json"};
const overlay = document.querySelector(".overlay");
const allMenus = document.querySelectorAll(".menu-box");

allMenus.forEach(item => {
    item.addEventListener("click", e => {
        const menuType = e.target.closest(".menu-box");
        const type = menuType.dataset.type;
        console.log(type);
        const box = e.target.closest(".button-menu");
        if (box) {
            overlay.classList.add("visible");
            displayMenu(type);
        }
    })
});

const displayMenu = (type)=>{
    const componentsList = data[type].components.map(item=>{
        return `<p>${item}</p>`
    }).join("");

    const html = `<div class="popup">
                    <div class="close-container"><i class="fa-solid fa-xmark close-menu"></i></div>
                    <h1>${data[type].title}</h1>
                    ${componentsList}
                </div>`;
    overlay.innerHTML = html;
}

document.addEventListener('click', e=>{
    const pop = e.target.closest(".close-menu");
    if(pop){
        overlay.classList.remove("visible");
    }
});

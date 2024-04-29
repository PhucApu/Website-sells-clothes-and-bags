const itemMenu = document.querySelectorAll(".sub-menu > ul > li ");
const itemSubMenu = document.querySelectorAll(".sub-menu > ul > li > ul > li");
const arrow = document.querySelectorAll(".nav > li > a > i")
itemMenu.forEach((current, i) =>{

    current.addEventListener("click", () =>{
        if (i==0){
            checkFlag();
            current.firstElementChild.classList.add("active");
            checkDisplayItem();
        }
        else if (current.lastElementChild.classList.contains("ele-sub")){
            current.lastElementChild.classList.remove("ele-sub");
            if (!current.firstElementChild.classList.contains("active")){
                current.firstElementChild.classList.add("active-sub");
            }
            arrow[i-1].style.transform = "rotate(-91deg)";
        } else {
            current.lastElementChild.classList.add("ele-sub");
            arrow[i-1].style.transform = "rotate(0)";

        }
    });
    const child = current.lastElementChild.querySelectorAll("ul > li");
    child.forEach((currentChild, i) =>{  
        currentChild.addEventListener("click", () =>{
            checkFlag();
            current.firstElementChild.classList.add("active");
            current.firstElementChild.classList.remove("active-sub");
            checkDisplayItem();
        });
    });
});

function checkFlag () {
    itemMenu.forEach((item, i) =>{
        if (item.firstElementChild.classList.contains("active")){
            item.firstElementChild.classList.remove("active");
        }
        if (item.firstElementChild.classList.contains("active-sub")){
            item.firstElementChild.classList.remove("active-sub");
        }
    });
}

function checkDisplayItem() {
    itemMenu.forEach((item, i) =>{
        if (i==0){
        }
        else if(!item.lastElementChild.classList.contains("ele-sub")){
            item.lastElementChild.classList.add("ele-sub");
        }
    });
}



// JS HEADERRRRRRR 


const infoHeader = document.querySelector(".info-header");
const menuHeader = document.querySelector(".menu-header");



let i = 0;


infoHeader.addEventListener("click",() =>{
    i++;
    if (i%2==0){
        menuHeader.classList.remove("show");

    } else {
        menuHeader.classList.add("show");
    }
});


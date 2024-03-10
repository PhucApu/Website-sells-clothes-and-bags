const imgProductDetailList = document.querySelectorAll(".list-img img");
const imgProductDetail = document.querySelector(".show-img");

const currentImgCount = document.querySelector(".current-img");
const totalImgCount = document.querySelector(".total-img");

// Fulll screen
let myDocument = document.documentElement;
let btnFull = document.getElementById("fullscreen");
let btnExit = document.getElementById("exitfullscreen");

imgProductDetailList.forEach((item, index) => {
    item.addEventListener("click", () => {
        imgProductDetailList.forEach((item, index) => {
            item.classList.remove("opacity");
        });
        imgProductDetail.innerHTML = `<img src="${item.src}" alt="">`;
        item.classList.add("opacity");
    });
});

const selectDR = document.querySelectorAll(".title  h4");
const desc = document.querySelector(".content-desc");
const rev = document.querySelector(".content-rev");
selectDR.forEach((item, index) => {
    item.addEventListener("click", () => {
        if (index === 0) {
            document.querySelector(".desc").classList.add("selected");
            document.querySelector(".rev").classList.remove("selected");
            rev.classList.add("hiddenP");
            desc.classList.remove("hiddenP");
            console.log("1");
        } else if (index === 1) {
            document.querySelector(".desc").classList.remove("selected");
            document.querySelector(".rev").classList.add("selected");
            desc.classList.add("hiddenP");
            rev.classList.remove("hiddenP");
        }
    });
});

const starList = document.querySelectorAll(".fa-star");
starList.forEach((star, index) => {
    star.addEventListener("click", () => {
        for (let i = 0; i < index + 1; i++) {
            starList[i].classList.remove("far");
            starList[i].classList.add("fas");
        }
        for (let i = index + 1; i < starList.length; i++) {
            starList[i].classList.remove("fas");
            starList[i].classList.add("far");
        }
    });
});

const imgShow = document.querySelector(".show-img");
const backgroundIMG = document.querySelector(".action-img");

imgShow.addEventListener("click", () => {
    backgroundIMG.classList.remove("disappear");
    document.querySelector("body").classList.add("no-scroll");
    backgroundIMG.lastElementChild.src = imgShow.firstElementChild.currentSrc;
    let flag;
    for (let i = 0; i < imgProductDetailList.length; i++) {
        if (
            imgProductDetailList[i].src === backgroundIMG.lastElementChild.src
        ) {
            flag = i;
        }
    }
    currentImgCount.innerHTML = flag + 1;
    totalImgCount.innerHTML = imgProductDetailList.length;
});

const close = document.querySelector(".fa-times");
close.addEventListener("click", () => {
    backgroundIMG.classList.add("disappear");
    document.querySelector("body").classList.remove("no-scroll");
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.msexitFullscreen) {
        document.msexitFullscreen();
    } else if (document.mozexitFullscreen) {
        document.mozexitFullscreen();
    } else if (document.webkitexitFullscreen) {
        document.webkitexitFullscreen();
    }
    btnExit.classList.add("disappear");
    btnFull.classList.remove("disappear");
});

const arrowLeft = document.querySelector(".fa-arrow-left");
arrowLeft.addEventListener("click", () => {
    let flag;
    for (let i = 0; i < imgProductDetailList.length; i++) {
        if (
            imgProductDetailList[i].src === backgroundIMG.lastElementChild.src
        ) {
            flag = i;
        }
    }
    if (flag === 0) {
        backgroundIMG.lastElementChild.src =
            imgProductDetailList[imgProductDetailList.length - 1].src;
        currentImgCount.innerHTML = imgProductDetailList.length;
    } else {
        backgroundIMG.lastElementChild.src = imgProductDetailList[flag - 1].src;
        currentImgCount.innerHTML = flag;
    }
});

const arrowRight = document.querySelector(".fa-arrow-right");
arrowRight.addEventListener("click", () => {
    let flag;
    for (let i = 0; i < imgProductDetailList.length; i++) {
        if (
            imgProductDetailList[i].src === backgroundIMG.lastElementChild.src
        ) {
            flag = i;
        }
    }
    if (flag === imgProductDetailList.length - 1) {
        backgroundIMG.lastElementChild.src = imgProductDetailList[0].src;
        currentImgCount.innerHTML = 1;
    } else {
        backgroundIMG.lastElementChild.src = imgProductDetailList[flag + 1].src;
        currentImgCount.innerHTML = flag + 2;
    }
});

btnFull.addEventListener("click", () => {
    if (myDocument.requestFullscreen) {
        myDocument.requestFullscreen();
    } else if (myDocument.msRequestFullscreen) {
        myDocument.msRequestFullscreen();
    } else if (myDocument.mozRequestFullScreen) {
        myDocument.mozRequestFullScreen();
    } else if (myDocument.webkitRequestFullscreen) {
        myDocument.webkitRequestFullscreen();
    }
    btnExit.classList.remove("disappear");
    btnFull.classList.add("disappear");
});
btnExit.addEventListener("click", () => {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.msexitFullscreen) {
        document.msexitFullscreen();
    } else if (document.mozexitFullscreen) {
        document.mozexitFullscreen();
    } else if (document.webkitexitFullscreen) {
        document.webkitexitFullscreen();
    }
    btnExit.classList.add("disappear");
    btnFull.classList.remove("disappear");
});
// else {
//     if (document.exitFullscreen) {
//         document.exitFullscreen();
//     } else if (document.msexitFullscreen) {
//         document.msexitFullscreen();
//     } else if (document.mozexitFullscreen) {
//         document.mozexitFullscreen();
//     } else if (document.webkitexitFullscreen) {
//         document.webkitexitFullscreen();
//     }
//     btn.textContent = "Go Fullscreen";
// }

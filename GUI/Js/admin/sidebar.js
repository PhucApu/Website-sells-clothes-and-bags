// ------------------------------------------- AJAX kiểm tra đăng nhập -----------------------------------------------
async function checkLogin() {
       try {
              const response = await fetch('../../../BLL/AccountBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('checkLogin')
              });
              const data = await response.json();
              console.log(data);
              let result = data[0];
              if (result.result == 'success') {
                     setLogin(result.userName);
              } else {
                     setLogin('');
              }
              // for (let i of data) {
              //        console.log(i);
              // }
              // showProductItem(data);
       } catch (error) {
              console.error('Error:', error);
       }
}
// checkLogin();

function setLogin(username) {
       let loginContainer1 = document.getElementById('info');
       let loginContainer2 = document.getElementById('info-header');
       if (username != '') {
              let string = `
                     <img src="../../image/avt.jpg" alt="" class="avt">
                     <span class="name">${username}</span>
              `;
              loginContainer1.innerHTML = string;
              let string2 = `
                     <i class="far fa-user fa-sm"></i>
                     <span>Hi, ${username}</span>
              `;
              loginContainer2.innerHTML = string2;
       } else {
              let string = `
                     <img src="../../image/avt.jpg" alt="" class="avt">
                     <span class="name"> Admin</span>
                     `;
              loginContainer1.innerHTML = string;
              let string2 = `<i class="far fa-user fa-sm"></i>`;
              loginContainer2.innerHTML = string2;
              window.location.href = "../../../GUI/view/login.php";
       }
}

// hàm tự động xóa thông tin đăng nhập khi thoát trang bất ngờ và đăng xuất.

async function logOutWhenExitingPage() {
       try {
              const response = await fetch('../../../BLL/AccountBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body: 'function=' + encodeURIComponent('logout_whenExitPage')
              });
              const data = await response.json();
              console.log(data);
       } catch (error) {
              console.error('Error:', error);
       }
}

window.addEventListener('unload', function (event) {
       logOutWhenExitingPage();
});
document.getElementById('logout').onclick = function (event){
       logOutWhenExitingPage();
       setLogin('');
}


// --------------------------------
function action() {
       const itemMenu = document.querySelectorAll(".sub-menu > ul > li ");
       const itemSubMenu = document.querySelectorAll(".sub-menu > ul > li > ul > li");
       const arrow = document.querySelectorAll(".nav > li > a > i")
       itemMenu.forEach((current, i) => {

              current.addEventListener("click", () => {
                     if (i == 0) {
                            checkFlag();
                            current.firstElementChild.classList.add("active");
                            checkDisplayItem();
                     }
                     else if (current.lastElementChild.classList.contains("ele-sub")) {
                            current.lastElementChild.classList.remove("ele-sub");
                            if (!current.firstElementChild.classList.contains("active")) {
                                   current.firstElementChild.classList.add("active-sub");
                            }
                            arrow[i - 1].style.transform = "rotate(-91deg)";
                     } else {
                            current.lastElementChild.classList.add("ele-sub");
                            arrow[i - 1].style.transform = "rotate(0)";

                     }
              });
              const child = current.lastElementChild.querySelectorAll("ul > li");
              child.forEach((currentChild, i) => {
                     currentChild.addEventListener("click", () => {
                            checkFlag();
                            current.firstElementChild.classList.add("active");
                            current.firstElementChild.classList.remove("active-sub");
                            checkDisplayItem();
                     });
              });
       });

       function checkFlag() {
              itemMenu.forEach((item, i) => {
                     if (item.firstElementChild.classList.contains("active")) {
                            item.firstElementChild.classList.remove("active");
                     }
                     if (item.firstElementChild.classList.contains("active-sub")) {
                            item.firstElementChild.classList.remove("active-sub");
                     }
              });
       }

       function checkDisplayItem() {
              itemMenu.forEach((item, i) => {
                     if (i == 0) {
                     }
                     else if (!item.lastElementChild.classList.contains("ele-sub")) {
                            item.lastElementChild.classList.add("ele-sub");
                     }
              });
       }



       // JS HEADERRRRRRR 


       const infoHeader = document.querySelector(".info-header");
       const menuHeader = document.querySelector(".menu-header");



       let i = 0;


       infoHeader.addEventListener("click", () => {
              i++;
              if (i % 2 == 0) {
                     menuHeader.classList.remove("show");

              } else {
                     menuHeader.classList.add("show");
              }
       });


}


window.addEventListener('load', async function () {
       console.log('sidebar da load xong');
       await checkLogin();


       action();
})

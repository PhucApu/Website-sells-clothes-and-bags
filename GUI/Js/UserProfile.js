// ----------------------------- AJAX load du lieu len
async function getInfor() {
    try {
        const response = await fetch('../../BLL/AccountBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:
                'function=' + encodeURIComponent('checkLogin')
        });
        const data = await response.json();
        let result = data[0];
        console.log(result);

        if (result.result == 'success') {
            
            showInfor(result.userName, result.passWord, result.name, result.email, result.address, result.phoneNumber, result.dateCreate, result.sex);
            await getArrOrder(result.userName);
            // return result.userName;
        } else {
            window.location.href = "../../GUI/view/Login.php";
        }
    } catch (error) {
        console.error('Error:', error);
    }
}


function showInfor(username, password, name, email, address, phone, dateCreate, sex) {
    console.log(username);
    // username
    let userNameElement = document.getElementById('user-name');
    if (userNameElement !== null) {
        userNameElement.innerHTML = `Hi, ${username}`;
    }

    let usernameInput = document.getElementById('username');
    if (usernameInput !== null) {
        usernameInput.value = `${username}`;
    }

    // name
    let nameInput = document.getElementById('name');
    if (nameInput !== null) {
        nameInput.value = `${name}`;
    }

    // email
    let emailInput = document.getElementById('email');
    if (emailInput !== null) {
        emailInput.value = `${email}`;
    }

    // address
    let addressInput = document.getElementById('address');
    if (addressInput !== null) {
        addressInput.value = `${address}`;
    }

    // phone
    let phoneInput = document.getElementById('phonenumber');
    if (phoneInput !== null) {
        phoneInput.value = `${phone}`;
    }

    // date create
    let dateCreateInput = document.getElementById('datecreate');
    if (dateCreateInput !== null) {
        console.log(dateCreate);
        dateCreateInput.value = `${dateCreate}`;
    }

    // sex
    let sexSelectElement = document.getElementById('sex-select');
    if (sexSelectElement !== null) {
        if (sex == "Female") {
            sexSelectElement.innerHTML = `
                        <div class="male-sex">
                            <input type="radio" id="male" name="sex">
                            <label for="male">Male</label>
                        </div>
                        <div class="female-sex">
                            <input type="radio" id="female" name="sex" checked>
                            <label for="female">Female</label>
                        </div>
            `;
        } else {
            sexSelectElement.innerHTML = `
                    <div class="male-sex">
                        <input type="radio" id="male" name="sex" checked>
                        <label for="male">Male</label>
                    </div>
                    <div class="female-sex">
                        <input type="radio" id="female" name="sex" >
                        <label for="female">Female</label>
                    </div>
            `;
        }
    }

    // current password
    let currentPasswordInput = document.getElementById('currentpassword');
    if (currentPasswordInput !== null) {
        currentPasswordInput.value = password;
    }
}

// // hàm thoát đăng nhập khi tắt web
// window.addEventListener('unload', async function (event) {
//     try {
//         const response = await fetch('../../BLL/AccountBLL.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded'
//             },
//             body: 'function=' + encodeURIComponent('logout_whenExitPage')
//         });
//         const data = await response.json();
//         console.log(data);
//     } catch (error) {
//         console.error('Error:', error);
//     }
// });

// get hóa đơn của người dùng đó
async function getArrOrder(username) {
    try {
        const response = await fetch('../../BLL/OrderBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'function=' + encodeURIComponent('getArrOrder_by_Username') + '&username=' + encodeURIComponent(username)
        });
        const data = await response.json();
        if(data.length > 0){
            
            for(let i of data){
                console.log(data);
                await getArrOrderDetail(i.orderCode,data);
            }    
            return data;
        }else{
            return null;
        }
        
        
    } catch (error) {
        console.error('Error:', error);
    }
}

async function getArrOrderDetail(orderCode,dataOrders) {
    try {
        const response = await fetch('../../BLL/OrderBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'function=' + encodeURIComponent('getArrOrderDetail_by_orderCode') + '&orderCode=' + encodeURIComponent(orderCode)
        });
        const data = await response.json();
        if(data.length > 0){
            for(let i of data){
                console.log(data);
                await getProductDetail(i.productCode,dataOrders,data);
            }  
            // return data;
        }else{
            return null;
        }
    } catch (error) {
        console.error('Error:', error);
    }
}
async function getProductDetail(productCode,dataOrders,dataOrderDetails){
    try {
        const response = await fetch('../../BLL/ProductBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'function=' + encodeURIComponent('getArrObjProduct_by_ArrCodeProduct') + '&code=' + encodeURIComponent(productCode)
        });
        const data = await response.json();
        
        if(data != null){
            console.log(data);
            showOrder(dataOrders,dataOrderDetails,data);
            // return data;
        }else {
            return null
        }


    } catch (error) {
        console.error('Error:', error);
    }
}

function showOrder(dataOrders,dataOrderDetails,dataProducts) {

    let container = document.getElementById('content-order');
    let result = '';
    for(let order of dataOrders){
        let orderCode = order.orderCode;
        let status = order.status;
        let totalMoney = order.totalMoney;
        let dateCreate = order.dateCreated;
        let dataFinish = order.dateFinish;
        let first_orderDetail_productCode = '';
        let first_orderDetail_quantity = '';
        for(let orderDetail of dataOrderDetails){
            if(orderDetail.orderCode == orderCode){
                first_orderDetail_productCode = orderDetail.productCode;
                first_orderDetail_quantity = orderDetail.quantity;
                break;
            }
        }
        let nameProduct = '';
        let img = '';
        let price = '';
        let promotion = '';
        for(let product of dataProducts){
            if(product.productCode == first_orderDetail_productCode){
                nameProduct = product.nameProduct;
                let stringImg = product.imgProduct;
                let arrImg = stringImg.split(' ');
                img = arrImg[0];
                price = product.price;
                promotion = product.promotion;
                break;
            }
        }
        if(promotion > 0){
            let string = `
                    <div class="item-order">
                    <div class="order-start">
                        <div class="head-order">
                                <p>#${orderCode}</p>
                                <p>${status}</p>
                        </div>
                        <hr>
                        <div class="box-order">
                                <img src="${img}" alt="">
                                <div class="product-name-and-quantity">
                                        <p>${nameProduct}</p>
                                        <span>X${first_orderDetail_quantity}</span>
                                </div>
                                <div class="price-product">
                                        <span>${price}$</span>
                                        <span>${(price * promotion / 100).toFixed(2)}$</span>
                                </div>
                        </div>
                    </div>

                    <div class="order-end">
                        <div class="detail">
                                <p>Total: <span>${totalMoney}$</span></p>
                                <div>
                                        <p>Order date: <span>${dateCreate}</span>
                                        </p>
                                        <p><a href="./OrderDetail.php?orderCode=${orderCode}&status=${status}">Detail</a></p>
                                </div>
                        </div>
                    </div>
                </div>
                `;
                result += string;
        }else{
            let string = `
                    <div class="item-order">
                    <div class="order-start">
                        <div class="head-order">
                                <p>#${orderCode}</p>
                                <p>${status}</p>
                        </div>
                        <hr>
                        <div class="box-order">
                                <img src="${img}" alt="">
                                <div class="product-name-and-quantity">
                                        <p>${nameProduct}</p>
                                        <span>X${first_orderDetail_quantity}</span>
                                </div>
                                <div class="price-product">
                                        <span></span>
                                        <span>${price}$</span>
                                </div>
                        </div>
                    </div>

                    <div class="order-end">
                        <div class="detail">
                                <p>Total: <span>${totalMoney}$</span></p>
                                <div>
                                        <p>Order date: <span>${dateCreate}</span>
                                        </p>
                                        <p><a href="./OrderDetail.php?orderCode=${orderCode}&status=${status}">Detail</a></p>
                                </div>
                        </div>
                    </div>
                </div>
                `;
                result += string;
        }
        
    }
    container.innerHTML = result;
}













function action() {

    const list_menu = document.querySelectorAll('.user-menu-main li');

    const rightContent = document.querySelectorAll('.content-right');
    function hideContentRight() {
        rightContent.forEach((current, i) => {
            current.classList.add('display_none');
        })
    }
    function activeMenu() {
        list_menu.forEach((current, i) => {
            if (current.classList.contains('menu-active')) {
                current.classList.remove('menu-active');
            }
        })
    }

    list_menu.forEach((current, i) => {
        current.addEventListener('click', () => {
            activeMenu();
            hideContentRight();
            if (i == 0) {
                list_menu[i].classList.add('menu-active');
                rightContent[i].classList.remove('display_none');
            }
            else if (i == 1) {
                list_menu[i].classList.add('menu-active');
                rightContent[i].classList.remove('display_none');
            }
            else if (i == 2) {
                list_menu[i].classList.add('menu-active');
                rightContent[i].classList.remove('display_none');
            }
        })
    })

}



window.addEventListener('load', async function () {
    // Thực hiện các hàm bạn muốn sau khi trang web đã tải hoàn toàn, bao gồm tất cả các tài nguyên như hình ảnh, stylesheet, v.v.
    console.log('Trang User Profile đã load hoàn toàn');
    await getInfor();
    action();
});


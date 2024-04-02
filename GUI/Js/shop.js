// ---------------------------------- DÙNG AJAX LẤY DỮ LIỆU LÊN ---------------------------------------
async function getProduct() {
    try {
        const response1 = await fetch('../../BLL/ProductBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:
                'function=' + encodeURIComponent('transHandbagProductToJson')
        });
        const response2 = await fetch('../../BLL/ProductBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:
                'function=' + encodeURIComponent('transShirtProductToJson')
        });
        const data2 = await response2.json();
        const data1 = await response1.json();
        let lengthProduct = data1.length + data2.length;

        console.log(data1);
        console.log(data2);

        // loadItemonHTML(data1, data2);
        // Pagination(1);
        Pagination_2(1, 12, lengthProduct);         // phân trang
        // showProductItem(data);
    } catch (error) {
        console.error('Error:', error);
    }
}
getProduct();

// async function getShirtProduct() {
//     try {
//         const response = await fetch('../../BLL/ProductBLL.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded'
//             },
//             body:
//                 'function=' + encodeURIComponent('transShirtProductToJson')
//         });
//         const data = await response.json();
//         console.log(data);


//     } catch (error) {
//         console.error('Error:', error);
//     }
// }
// getShirtProduct();

let string = `

<div class="product-container">
                                    <!--khung chứa ảnh-->
                                    <div class="image">
                                        <a href="" class="">
                                            <img src="../image/product/product7/product-detail-1.png" alt="">
                                        </a>
                                        <!-- discount -->
                                        <div class="discount">
                                            <span>25%</span>
                                        </div>
                                        <!--cart và xem chi tiết sp trong ảnh-->
                                        <div class="action-custom">
                                            <!--cart-->
                                            <div class="add-to-cart">
                                                <a href="" class="" title="add cart">
                                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <!--read-more-->
                                            <div class="readmore">
                                                <a href="" title="Detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- thong tin san pham -->
                                    <div class="product-meta">
                                        <div class="name">
                                            <a href="">Printed T-shirt</a>
                                        </div>

                                    </div>
                                    <!-- thong tin gia san pham -->
                                    <div class="price">
                                        <div itemprop="offers" class="pricelist"></div>
                                        <ins class="giamoi"><span class="price-sale">$20.00</span> $14.99</ins>
                                    </div>
                                </div>


`;

function loadItemonHTML(data1, data2) {

    let result = '';
    let containerListProduct = document.querySelector('.container-path .product-list');
    console.log(containerListProduct);

    // sản phẩm áo
    for (let i of data2) {

        // ma product
        let productCode = i.productCode;
        let type = 'shirtProduct';
        // ma hoa
        let mahoaProductCode = btoa(productCode);
        let mahoaType = btoa(type);
        // name
        let nameProduct = i.nameProduct;
        // anh
        let imgString = i.imgProduct;
        let arrImg = imgString.split(' ');
        let firstImg = arrImg[0];
        // giam gia
        let promotionPrice;
        if (i.promotion != 0) {
            promotionPrice = i.price - (i.price * i.promotion / 100);
            promotionPrice = promotionPrice.toFixed(2);
        }

        // path chi tiet san pham
        let pathDetailProdutc = `./ProductDetail.php?code=${mahoaProductCode}&type=${mahoaType}`;

        // format HTML
        if (i.promotion != 0) {
            let temp = `
            <div class="product-container">
                <!--khung chứa ảnh-->
                <div class="image">
                    <a href="${pathDetailProdutc}" class="">
                        <img src="${firstImg}" alt="">
                    </a>
                    <!-- discount -->
                    <div class="discount">
                        <span>${i.promotion}%</span>
                    </div>
                    <!--cart và xem chi tiết sp trong ảnh-->
                    <div class="action-custom">
                        <!--cart-->
                        <div class="add-to-cart">
                            <a href="./Cart.php" class="" title="add cart">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!--read-more-->
                        <div class="readmore">
                            <a href="${pathDetailProdutc}" title="Detail">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- thong tin san pham -->
                <div class="product-meta">
                    <div class="name">
                        <a href="">${nameProduct}</a>
                    </div>
            
                </div>
                <!-- thong tin gia san pham -->
                <div class="price">
                    <div itemprop="offers" class="pricelist"></div>
                    <ins class="giamoi"><span class="price-sale">$${i.price}</span> $${promotionPrice}</ins>
                </div>
            </div>
            
            `;
            result += temp;
        } else {
            let temp = `
            <div class="product-container">
                <!--khung chứa ảnh-->
                <div class="image">
                    <a href="${pathDetailProdutc}" class="">
                        <img src="${firstImg}" alt="">
                    </a>
                    <!--cart và xem chi tiết sp trong ảnh-->
                    <div class="action-custom">
                        <!--cart-->
                        <div class="add-to-cart">
                            <a href="./Cart.php" class="" title="add cart">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!--read-more-->
                        <div class="readmore">
                            <a href="${pathDetailProdutc}" title="Detail">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- thong tin san pham -->
                <div class="product-meta">
                    <div class="name">
                        <a href="">${nameProduct}</a>
                    </div>
            
                </div>
                <!-- thong tin gia san pham -->
                <div class="price">
                    <div itemprop="offers" class="pricelist"></div>
                    <ins class="giamoi">$${i.price}</ins>
                </div>
            </div>
            
            `;
            result += temp;
        }

    }

    // sản phẩm túi
    for (let i of data1) {

        // ma product
        let productCode = i.productCode;
        let type = 'handbagProduct';
        // ma hoa
        let mahoaProductCode = btoa(productCode);
        let mahoaType = btoa(type);
        // name
        let nameProduct = i.nameProduct;
        // anh
        let imgString = i.imgProduct;
        let arrImg = imgString.split(' ');
        let firstImg = arrImg[0];
        // giam gia
        let promotionPrice;
        if (i.promotion != 0) {
            promotionPrice = i.price - (i.price * i.promotion / 100);
            promotionPrice = promotionPrice.toFixed(2);
        }

        // path chi tiet san pham
        let pathDetailProdutc = `./ProductDetail.php?code=${mahoaProductCode}&type=${mahoaType}`;

        // format HTML
        if (i.promotion != 0) {
            let temp = `
            <div class="product-container">
                <!--khung chứa ảnh-->
                <div class="image">
                    <a href="${pathDetailProdutc}" class="">
                        <img src="${firstImg}" alt="">
                    </a>
                    <!-- discount -->
                    <div class="discount">
                        <span>${i.promotion}%</span>
                    </div>
                    <!--cart và xem chi tiết sp trong ảnh-->
                    <div class="action-custom">
                        <!--cart-->
                        <div class="add-to-cart">
                            <a href="./Cart.php" class="" title="add cart">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!--read-more-->
                        <div class="readmore">
                            <a href="${pathDetailProdutc}" title="Detail">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- thong tin san pham -->
                <div class="product-meta">
                    <div class="name">
                        <a href="">${nameProduct}</a>
                    </div>
            
                </div>
                <!-- thong tin gia san pham -->
                <div class="price">
                    <div itemprop="offers" class="pricelist"></div>
                    <ins class="giamoi"><span class="price-sale">$${i.price}</span> $${promotionPrice}</ins>
                </div>
            </div>
            
            `;
            result += temp;
        } else {
            let temp = `
            <div class="product-container">
                <!--khung chứa ảnh-->
                <div class="image">
                    <a href="${pathDetailProdutc}" class="">
                        <img src="${firstImg}" alt="">
                    </a>
                    <!--cart và xem chi tiết sp trong ảnh-->
                    <div class="action-custom">
                        <!--cart-->
                        <div class="add-to-cart">
                            <a href="./Cart.php" class="" title="add cart">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!--read-more-->
                        <div class="readmore">
                            <a href="${pathDetailProdutc}" title="Detail">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- thong tin san pham -->
                <div class="product-meta">
                    <div class="name">
                        <a href="">${nameProduct}</a>
                    </div>
            
                </div>
                <!-- thong tin gia san pham -->
                <div class="price">
                    <div itemprop="offers" class="pricelist"></div>
                    <ins class="giamoi">$${i.price}</ins>
                </div>
            </div>
            
            `;
            result += temp;
        }
    }
    containerListProduct.innerHTML = result;
}

// phân trang
function Pagination(thisPage) {
    // cong thuc
    // giả sử số sản phẩm ta muốn xuất hiện mỗi trang là Limit 6;

    // Page 1:0-> 5

    // Page 2:6 -> 11

    // Page 3: 12 -> 17

    // cộng thức tổng quát
    // BeginGet= limit* (page - 1); I
    // endGet: limit * page-1;
    let limit = 12;
    let listProduct = document.querySelectorAll('.container-path .product-list .product-container');



    // load item
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;

    listProduct.forEach((item, key) => {
        if (key >= beginGet && key <= endGet) {
            item.style.display = 'block';
        }
        else {
            item.style.display = 'none';
        }
    });
    listPage(listProduct, limit, thisPage);
}
function listPage(listProduct, limit, thisPage) {
    let count = Math.ceil(listProduct.length / limit);
    console.log(count);
    document.querySelector('.container-path .list-page').innerHTML = '';
    console.log(document.querySelector('.container-path .list-page'));
    for (let i = 1; i <= count; i++) {
        let newPage = document.createElement('div');
        newPage.innerText = i;
        if (i == thisPage) {
            newPage.classList.add('item-active');
        }
        newPage.setAttribute('onclick', "changePage(" + i + ")");
        document.querySelector('.container-path .list-page').appendChild(newPage);

    }

}
function changePage(i) {
    Pagination(i)
}

async function Pagination_2(page, limit, lengthProduct) {
    try {
        const response = await fetch('../../BLL/ProductBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:
                'function=' + encodeURIComponent('Pagination') + '&page=' + encodeURIComponent(page) + '&limit=' + encodeURIComponent(limit)
        });
        const data = await response.json();

        console.log(data);
        loadItemonHTML_forPagination_2(data);
        listPage_2(lengthProduct, limit, page);

    } catch (error) {
        console.error('Error:', error);
    }
}
function listPage_2(lengthProduct, limit, thisPage) {
    let count = Math.ceil(lengthProduct / limit);
    console.log(count);
    document.querySelector('.container-path .list-page').innerHTML = '';
    console.log(document.querySelector('.container-path .list-page'));
    for (let i = 1; i <= count; i++) {
        let newPage = document.createElement('div');
        newPage.innerText = i;
        if (i == thisPage) {
            newPage.classList.add('item-active');
        }
        newPage.setAttribute('onclick', "changePage_2(" + i + "," + limit + "," + lengthProduct + ")");
        document.querySelector('.container-path .list-page').appendChild(newPage);

    }
}
function changePage_2(i,limit,lengthProduct) {
    Pagination_2(i,limit,lengthProduct);
}



function loadItemonHTML_forPagination_2(data) {

    let result = '';
    let containerListProduct = document.querySelector('.container-path .product-list');
    // console.log(containerListProduct);
    containerListProduct.innerHTML = '';

    // sản phẩm 
    for (let i of data) {

        // ma product
        let productCode = i.productCode;
        let type = i.type;
        // ma hoa
        let mahoaProductCode = btoa(productCode);
        let mahoaType = btoa(type);
        // name
        let nameProduct = i.nameProduct;
        // anh
        let imgString = i.imgProduct;
        let arrImg = imgString.split(' ');
        let firstImg = arrImg[0];
        // giam gia
        let promotionPrice;
        if (i.promotion != 0) {
            promotionPrice = i.price - (i.price * i.promotion / 100);
            promotionPrice = promotionPrice.toFixed(2);
        }

        // path chi tiet san pham
        let pathDetailProdutc = `./ProductDetail.php?code=${mahoaProductCode}&type=${mahoaType}`;

        // format HTML
        if (i.promotion != 0) {
            let temp = `
            <div class="product-container">
                <!--khung chứa ảnh-->
                <div class="image">
                    <a href="${pathDetailProdutc}" class="">
                        <img src="${firstImg}" alt="">
                    </a>
                    <!-- discount -->
                    <div class="discount">
                        <span>${i.promotion}%</span>
                    </div>
                    <!--cart và xem chi tiết sp trong ảnh-->
                    <div class="action-custom">
                        <!--cart-->
                        <div class="add-to-cart">
                            <a href="./Cart.php" class="" title="add cart">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!--read-more-->
                        <div class="readmore">
                            <a href="${pathDetailProdutc}" title="Detail">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- thong tin san pham -->
                <div class="product-meta">
                    <div class="name">
                        <a href="">${nameProduct}</a>
                    </div>
            
                </div>
                <!-- thong tin gia san pham -->
                <div class="price">
                    <div itemprop="offers" class="pricelist"></div>
                    <ins class="giamoi"><span class="price-sale">$${i.price}</span> $${promotionPrice}</ins>
                </div>
            </div>
            
            `;
            result += temp;
        } else {
            let temp = `
            <div class="product-container">
                <!--khung chứa ảnh-->
                <div class="image">
                    <a href="${pathDetailProdutc}" class="">
                        <img src="${firstImg}" alt="">
                    </a>
                    <!--cart và xem chi tiết sp trong ảnh-->
                    <div class="action-custom">
                        <!--cart-->
                        <div class="add-to-cart">
                            <a href="./Cart.php" class="" title="add cart">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!--read-more-->
                        <div class="readmore">
                            <a href="${pathDetailProdutc}" title="Detail">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- thong tin san pham -->
                <div class="product-meta">
                    <div class="name">
                        <a href="">${nameProduct}</a>
                    </div>
            
                </div>
                <!-- thong tin gia san pham -->
                <div class="price">
                    <div itemprop="offers" class="pricelist"></div>
                    <ins class="giamoi">$${i.price}</ins>
                </div>
            </div>
            
            `;
            result += temp;
        }

    }
    containerListProduct.innerHTML = result;
}











// ----------------------------------------- THỰC HIỆN CÁC HIỆU ỨNG ----------------------------------------
const priceSlider = document.getElementById("price-slider");
const priceLabel = document.getElementById("price-label");

priceSlider.addEventListener("input", () => {
    const price = priceSlider.value;
    priceLabel.textContent = `$${price}`;
});

const productListCont = document.querySelector(".product-list");
let stringProductList = "";

const buttonClick = document.querySelector(".item");
buttonClick.addEventListener("click", () => {
    for (let i = 0; i < 12; i++) {
        stringProductList += `<div class="product-container">
    <!--khung chứa ảnh-->
    <div class="image">
        <a href="" class="">
            <img src="../image/shop-image/${i + 1}.png" alt="">
        </a>
        <!--cart và xem chi tiết sp trong ảnh-->
        <div class="action-custom">
            <!--cart-->
            <div class="add-to-cart">
                <a href="" class="" title="add cart">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
            </div>
            <!--read-more-->
            <div class="readmore">
                <a href="" title="Detail">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- thong tin san pham -->
    <div class="product-meta">
        <div class="name">
            <a href="">Super-soft wrap jumpsuit</a>
        </div>

    </div>
    <!-- thong tin gia san pham -->
    <div class="price">
        <div itemprop="offers" class="pricelist"></div>
        <ins class="giamoi">$39.99</ins>
    </div>
</div>`;
    }
    productListCont.innerHTML = stringProductList;
});



const buttonClick2 = document.querySelector(".item 2");
buttonClick2.addEventListener("click", () => {
    for (let i = 0; i < 5; i++) {
        stringProductList += `<div class="product-container">
    <!--khung chứa ảnh-->
    <div class="image">
        <a href="" class="">
            <img src="../image/shop-image/${i + 1}.png" alt="">
        </a>
        <!--cart và xem chi tiết sp trong ảnh-->
        <div class="action-custom">
            <!--cart-->
            <div class="add-to-cart">
                <a href="" class="" title="add cart">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
            </div>
            <!--read-more-->
            <div class="readmore">
                <a href="" title="Detail">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- thong tin san pham -->
    <div class="product-meta">
        <div class="name">
            <a href="">Super-soft wrap jumpsuit</a>
        </div>

    </div>
    <!-- thong tin gia san pham -->
    <div class="price">
        <div itemprop="offers" class="pricelist"></div>
        <ins class="giamoi">$39.99</ins>
    </div>
</div>`;
    }
    productListCont.innerHTML = stringProductList;
});

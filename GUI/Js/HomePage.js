
// ------------------------------------------- AJAX nạp dữ liệu ------------------------------------------------
async function getHandbagProduct() {
       try {
              const response = await fetch('../../BLL/ProductBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('transHandbagProductToJson')
              });
              const data = await response.json();

              for (let i of data) {
                     console.log(i);
              }
              // showProductItem(data);
       } catch (error) {
              console.error('Error:', error);
       }
}
getHandbagProduct();

async function getShirtProduct() {
       try {
              const response = await fetch('../../BLL/ProductBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('transShirtProductToJson')
              });
              const data = await response.json();

              for (let i of data) {
                     console.log(i);
              }
              showProductItem(data);
              slideProduct();

       } catch (error) {
              console.error('Error:', error);
       }
}
getShirtProduct();

// ------------------------------------------ show dữ liệu lên phần slide product

let string = `
<div class="product-item">
       <div class="image-item">
              <a href='./ProductDetail.php'>
                     <img src="../image/product/product1/product-detail-1.png" alt="">
                     <a href="./Cart.php">
                            <div class="add-to-cart">
                                   <span><i class="fas fa-shopping-bag"></i></span>
                            </div>
                     </a>
                     <a href="./ProductDetail.php">
                            <div class="see-more">
                                   <span><i class="far fa-eye"></i></span>
                            </div>
                     </a>
                     <div class="discount">
                            <span>20%</span>
                     </div>
              </a>
       </div>
       <div class="name-item">
              <a href="">
                     <span>Conton T-shirt</span>
              </a>
       </div>
       <div class="price-item">
              <span>$ 9.99</span>
       </div>
</div>

`;

function showProductItem(data) {
       if (data != null) {
              let container = document.querySelector('.content-product .product');
              let result = '';
              for (let i of data) {
                     // trích suất từng giá trị thuôc tính product

                     let productCode = i.productCode;
                     console.log(productCode);
                     // mã hóa
                     let mahoaProduct = btoa(productCode);

                     // xử lý mảng ảnh
                     let imgProduct = i.imgProduct;
                     let ArrimgProduct = imgProduct.split(' ');
                     let firstImgProduct = ArrimgProduct[0];

                     let nameProduct = i.nameProduct;

                     let price = i.price;
                     let promotion = i.promotion;

                     let type = '';
                     // phân loại sản phẩm
                     if (i.bagMaterial == null) {
                            type = 'shirtProduct';
                     } else {
                            type = 'handbagProduct';
                     }

                     // mã hóa
                     let mahoatype = btoa(type);
                     let cardProduct = templateHTMLCartProduct(mahoaProduct, firstImgProduct, nameProduct, price, promotion, mahoatype);
                     result += cardProduct;
              }
              container.innerHTML = result;
       }
}

function templateHTMLCartProduct(productCode, imgProduct, nameProduct, price, promotion, type) {
       if (promotion == 0) {
              let string = `
                     <div class="product-item">
                            <div class="image-item">
                                   <a href='./ProductDetail.php?code=${productCode}&type=${type}'>
                                          <img src="${imgProduct}" alt="">
                                          <a href="./Cart.php">
                                                 <div class="add-to-cart">
                                                        <span><i class="fas fa-shopping-bag"></i></span>
                                                 </div>
                                          </a>
                                          <a href="./ProductDetail.php?code=${productCode}&type=${type}">
                                                 <div class="see-more">
                                                        <span><i class="far fa-eye"></i></span>
                                                 </div>
                                          </a>
                                   </a>
                            </div>
                            <div class="name-item">
                                   <a href="">
                                          <span>${nameProduct}</span>
                                   </a>
                            </div>
                            <div class="price-item">
                                   <span>$ ${price}</span>
                            </div>
                     </div>
                     `;
              return string;
       } else {
              let string = `
                     <div class="product-item">
                            <div class="image-item">
                                   <a href='./ProductDetail.php?code=${productCode}&type=${type}'>
                                          <img src="${imgProduct}" alt="">
                                          <a href="./Cart.php">
                                                 <div class="add-to-cart">
                                                        <span><i class="fas fa-shopping-bag"></i></span>
                                                 </div>
                                          </a>
                                          <a href="./ProductDetail.php?code=${productCode}&type=${type}">
                                                 <div class="see-more">
                                                        <span><i class="far fa-eye"></i></span>
                                                 </div>
                                          </a>
                                          <div class="discount">
                                                 <span>${promotion}%</span>
                                          </div>
                                   </a>
                            </div>
                            <div class="name-item">
                                   <a href="">
                                          <span>${nameProduct}</span>
                                   </a>
                            </div>
                            <div class="price-item">
                                   <span>$ ${price}</span>
                            </div>
                     </div>
                     `;
              return string;
       }
}


// ----------------------------show dữ liệu lên phần "NEW ARRIVAL - SALE PRODUCT - BEST SELLING PRODUCTS"

// NEW ARRIVAL



// -------------------------------------------------------xử lý các hành động trên web ------------------------------------------------------

// slide sản phẩm
function slideProduct() {
       let products = document.querySelectorAll('body .content-product .product-feature .product .product-item');
       let product_position = []
       let width_product_item = 293;      // chiều width
       let numberNext = products.length - 4;     // số lượt next
       let numberPrevious = 0;          // số lượt pre

       for (let i = 0; i < products.length; i++) {
              product_position.push(0);
       }

       document.querySelector('.content-product .pre-button').onclick = function () {
              if (numberPrevious != 0) {
                     for (let i = 0; i < products.length; i++) {
                            console.log(i);
                            // console.log(products.item(i));
                            let item = products.item(i);
                            // Lấy vi tri phần tử cần di chuyển
                            let positionItem_current = product_position[i];

                            let positionItem_new = positionItem_current + width_product_item;

                            // Thiết lập giá trị translate
                            var translateValue = `translate(${positionItem_new}px, 0px)`;

                            // Áp dụng giá trị translate vào thuộc tính style.transform của phần tử
                            item.style.transform = translateValue;

                            // cap nhat lai vi tri item
                            product_position[i] = positionItem_new;
                            console.log(positionItem_new);
                     }
                     numberNext += 1;
                     numberPrevious -= 1;
              }
       }
       document.querySelector('.content-product .next-button').onclick = function () {
              if (numberNext != 0) {
                     for (let i = 0; i < products.length; i++) {
                            console.log(i);
                            // console.log(products.item(i));
                            let item = products.item(i);
                            // Lấy vi tri phần tử cần di chuyển
                            let positionItem_current = product_position[i];

                            let positionItem_new = positionItem_current - width_product_item;

                            // Thiết lập giá trị translate
                            var translateValue = `translate(${positionItem_new}px, 0px)`;

                            // Áp dụng giá trị translate vào thuộc tính style.transform của phần tử
                            item.style.transform = translateValue;

                            // cap nhat lai vi tri item
                            product_position[i] = positionItem_new;
                            console.log(positionItem_new);
                     }
                     numberNext -= 1;
                     numberPrevious += 1;
              }
       }


}

// function slideProduct() {
//        document.querySelector('.content-product .pre-button').onclick = function () {
//               let lists = document.querySelectorAll('.content-product .product .product-item');
//               console.log(lists);
//               document.querySelector('.content-product .product').appendChild(lists[0]);
//        }
//        document.querySelector('.content-product .next-button').onclick = function () {
//               let lists = document.querySelectorAll('.content-product .product .product-item');
//               console.log(lists);
//               document.querySelector('.content-product .product').prepend(lists[lists.length - 1]);
//        }
// }



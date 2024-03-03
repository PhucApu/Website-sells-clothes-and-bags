
// slide sản phẩm
let products = document.querySelectorAll('body .content-product .product-feature .product .product-item');
let product_position = []
let width_product_item = 293;      // chiều width
let numberNext = products.length - 4;     // số lượt next
let numberPrevious = 0;          // số lượt pre

function setPosition() {
       for (let i = 0; i < products.length; i++) {
              product_position.push(0);
       }
}
setPosition();
function preButton() {
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
function nextButton() {
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


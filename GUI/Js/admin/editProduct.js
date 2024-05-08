async function getData() {

       // Tạo một đối tượng URLSearchParams từ đường dẫn URL hiện tại
       let urlParams = new URLSearchParams(window.location.search);

       // Lấy giá trị của tham số 'code' từ URL hiện tại
       let producCode = urlParams.get('productCode');
       let typeValue = urlParams.get('type');

       // kiem tra

       try {
              const response = await fetch('../../../BLL/ProductBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('getProductByCode_transToJson') + '&code=' + encodeURIComponent(producCode) + '&type=' + encodeURIComponent(typeValue)
              });


              const data = await response.json();
              console.log(data);
              showData(data);

       } catch (error) {
              console.error('Error:', error);
       }
}
getData();

let imgProduct = '';

function showData(data) {
       let producCode = data.productCode;

       let stringSize = data.quantitySize;
       let arrSize = stringSize.split(' ');
       let result = ``;
       for (let item of arrSize) {
              let arrObj = item.split('-');

              let string = `CodeSize: ${arrObj[0]} - Name: ${arrObj[1]} - Quantity: ${arrObj[2]} <br>`;
              result += string;
       }

       // xu ly anh chi tiet
       // console.log(data.imgProduct);

       imgProduct = data.imgProduct;

       let arrImg = data.imgProduct.split(' ');
       console.log(arrImg);
       let result_img = ``;
       for (let item of arrImg) {
              let string = `
               <img src="../${item}" id="${producCode}-${item}" width="200px"> 
               <button onclick = "deleteImg('${item}')">Xoa</button>
               <button onclick = "addImg('${item}')">Xoa</button>
           `;
              result_img += string;
       }

       document.getElementById('container').innerHTML = `ProductCode: ${producCode} <br> ${result} <br> ${result_img}`;
}

function deleteImg(linkImg) {

       let arrImg = imgProduct.split(' ');
       // Tạo một mảng mới không bao gồm phần tử có giá trị là 3
       var newArr = arrImg.filter(item => item !== linkImg);

       let newStringImg = newArr.join(' ');

       imgProduct = newStringImg;


       console.log(imgProduct);

       // let arr = [];


       // return newArr;
}

function addImg(linkImg) {

       let arrImg = imgProduct.split(' ');
       // Tạo một mảng mới không bao gồm phần tử có giá trị là 3
       arrImg.push(linkImg);

       let newStringImg = newArr.join(' ');

       imgProduct = newStringImg;


       console.log(imgProduct);

       // let arr = [];


       // return newArr;
}



// quantitySize = "S001-Small-14 S002-Medium-16 S003-Large-16"
// quantitySIzeArr = quantitySize.split(' ');           //   ['S001-Small-14', 'S002-Medium-16', 'S003-Large-16']
// 

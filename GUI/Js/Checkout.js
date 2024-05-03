// lấy thông tin người đăng nhập
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
                     return result;
              } else {
                     window.location.href = "../../GUI/view/Login.php";
              }
       } catch (error) {
              console.error('Error:', error);
       }
}
// lấy dữ liệu payment
async function getPayment() {
       try {
              const response = await fetch('../../BLL/PaymentBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('getArrObj')
              });
              const data = await response.json();
              console.log(data);

              if (data != null) {
                     return data;
              }
       } catch (error) {
              console.error('Error:', error);
       }
}
// lấy dữ liệu transport
async function getTransport() {
       try {
              const response = await fetch('../../BLL/TransportBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('getArrObj')
              });
              const data = await response.json();
              console.log(data);
              if (data != null) {
                     return data;
              }

       } catch (error) {
              console.error('Error:', error);
       }
}

// lấy các sản phẩm có trong giỏ hàng
async function getCart() {
       try {
              const response = await fetch('../../BLL/OrderBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('getArrCart')
              });
              const data = await response.json();
              console.log(data);
              if (data != null) {
                     return data;
              }

       } catch (error) {
              console.error('Error:', error);
       }
}

async function showData() {
       let dataUser = await getInfor();
       let dataPayment = await getPayment();
       let dataTransport = await getTransport();
       let dataCart = await getCart();

       // set dữ liệu
       // set tên
       document.getElementById('fullname').value = dataUser.userName;

       // bảng chi tiết hóa đơn
       let containerOrderDetail = document.getElementById('container-order-detail');
       let count = 0;
       let result = '';
       let sumMoney = 0;
       for (let item of dataCart) {
              count++;
              let nameProduct = item.nameProduct;
              let quantityBuy = item.quantityBuy;
              let price = item.price;
              let promotion = item.promotion;

              // tính giảm giá nếu có
              if (promotion > 0) {
                     price = (price - (price * promotion / 100)).toFixed(2);
              }

              let total = price * quantityBuy;
              sumMoney += total;
              let string = `
                     <div class="item-order">
                            <p>${count}</p>
                            <p>${nameProduct}</p>
                            <p>${quantityBuy}</p>
                            <p>${price}$</p>
                            <p>${total}$</p>
                     </div>
              `;
              result += string;
       }
       containerOrderDetail.innerHTML = result;

       // set tong tien hoa don
       document.getElementById('total-money').innerHTML = '$ '+sumMoney;

       // set du lieu payment
       let result1 = '';
       for(let item of dataPayment){
              let codePayments = item.codePayments;
              let namePayment = item.namePayment;
              
              let string = `<option value="${codePayments}">${namePayment}</option>`;
              result1 += string;
       }
       document.getElementById('payment').innerHTML = result1;

       // set du lieu transport
       let result2 = '';
       for(let item of dataTransport){
              let codeTransport = item.codeTransport;
              let nameTransport = item.nameTransport;
              
              let string = `<option value="${codeTransport}">${nameTransport}</option>`;
              result2 += string;
       }
       document.getElementById('transport').innerHTML = result2;
}
showData();

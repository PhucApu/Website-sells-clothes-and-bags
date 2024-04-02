// location.reload();
// ------------------------------------- AJAX LOGIN ---------------------------------------------
async function Login() {
       try {
              let userName = document.getElementById('userNameInput').value;
              let passWord = document.getElementById('passWordInput').value;

              if (userName == '') {
                     userName = ' ';
              }
              if (passWord == '') {
                     passWord = ' ';
              }
              const response = await fetch('../../BLL/AccountBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('login') + '&userName=' + encodeURIComponent(userName) + '&passWord=' + encodeURIComponent(passWord)
              });
              const data = await response.json();

              for (let i of data) {
                     console.log(i);
              }
              let user = data[0];

              // dang nhap thanh cong
              if (user.result == 'success') {
                     alert('đăng nhập thành công');
                     window.location.href = "../../GUI/view/HomePage.php";
              }
              else if (user.result == 'block') {
                     alert('Tài khoản của bạn bị khóa, vui lòng liên hệ với quản trị viên để mở khóa');
              }
              else if (user.result == 'wrongPass') {
                     alert('Sai mật khẩu');
              }
              else if (user.result == 'notFound') {
                     alert('Không tìm thấy tài khoản');
              }

              // showProductItem(data);
       } catch (error) {
              console.error('Error:', error);
       }
}
window.addEventListener('load', function () {
       // Xử lý khi toàn bộ trang đã được tải xong
       console.log('Toàn bộ trang đã được tải xong');
       checkLogin();
});
// ------------------------------------------- AJAX kiểm tra đăng nhập -----------------------------------------------
async function checkLogin() {
       // location.reload();
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
              console.log(data);
              let result = data[0];
              if (result.result == 'success') {
                     window.location.href = "../../GUI/view/HomePage.php";
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

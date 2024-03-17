function showStep1() {
       document.getElementById('step1').style.display = 'block';
       document.getElementById('step2').style.display = 'none';
   }
   
   // Include regex for step 1
   function showStep2() {
       // Get form values
       var username = document.getElementById('username').value;
       var password = document.getElementById('password').value;
       var repeatPassword = document.getElementById('repeat-password').value;
     
       // Regular expressions for validation
       var usernameRegex = /^[a-zA-Z\d]{5,16}$/;
       var passwordRegex = /^[a-zA-Z\d@_-]{6,20}$/;
     
       // Check if the fields are filled correctly
       if (!usernameRegex.test(username)) {
         alert('Vui lòng điền tên đăng nhập hợp lệ từ 5 đến 16 ký tự');
         return false; // Stop the function if the username is not valid
       }
       if (!passwordRegex.test(password)) {
         alert('Vui lòng điền mật khẩu hợp lệ');
         return false; // Stop the function if the password is not valid
       }
       if (password !== repeatPassword) {
         alert('Mật khẩu không trùng khớp! Vui lòng nhập lại');
         return false; // Stop the function if the passwords do not match
       }
     
       // If all checks pass, hide step 1 and show step 2
       document.getElementById('step1').style.display = 'none';
       document.getElementById('step2').style.display = 'block';
     }
   
   // Regex for step 2
   document.addEventListener("DOMContentLoaded", function() {
       var form = document.getElementById('registrationForm');
       form.addEventListener('submit', function(event) {
         // Prevent form submission
         event.preventDefault();
     
         // Validation logic
         var name = document.getElementById('name').value;
         var email = document.getElementById('email').value;
         var phone = document.getElementById('phone').value;
     
         // Regular expressions
         var nameRegex = /^[a-zA-Z\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/u
         var emailRegex = /^[A-Za-z0-9._%+-]+@gmail\.com$/
         var phoneRegex = /^\d{10}$/;
     
         // Validation checks
         if (!nameRegex.test(name)) {
           alert('Tên không hợp lệ');
           return false;
         }
         if (!emailRegex.test(email)) {
           alert('Email không hợp lệ');
           return false;
         }
         if (!phoneRegex.test(phone)) {
           alert('Số điện thoại không hợp lệ');
           return false;
         }
         // If all validations pass
         alert('Đăng ký thành công');
         // Here you can proceed to form submission or further logic
       });
     });
   
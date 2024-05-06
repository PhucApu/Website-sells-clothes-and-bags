// lấy danh sách đối tượng
async function getArr() {
       try {
              // gọi AJAX để kiểm tra

              let response = await fetch("../../../BLL/PaymentBLL.php", {
                     method: "POSt",
                     headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                     },
                     body: "function=" + encodeURIComponent("getArrObj"),
              });

              let data = await response.json();
              console.log(data);
              await loadData(data);
              loadPage();
       } catch (error) {
              console.error(error);
       }
}

//lấy dữ liệu từ kết quả  rearch
function searchPayment() {
       document.getElementById("input-search-payment").oninput = async function () {
              try {
                     // Gọi AJAX để xóa payment
                     let str = document
                            .getElementById("input-search-payment")
                            .value.trim()
                            .toLowerCase();
                     let response = await fetch("../../../BLL/PaymentBLL.php", {
                            method: "POST",
                            headers: {
                                   "Content-Type": "application/x-www-form-urlencoded",
                            },
                            body:
                                   "function=" +
                                   encodeURIComponent("searchPayment") +
                                   "&str=" +
                                   encodeURIComponent(str),
                     });

                     let data = await response.json();
                     console.log(data);
                     if (data.length == 0) {
                            console.log("Không có dữ liệu");

                            document.querySelector("#Pagination").style.display = "none";
                            loadData(data);
                     } else {
                            loadData(data);
                            document.querySelector("#Pagination").style.display = "flex";
                            loadItem(1, 4);
                     }

                     loadPage();
              } catch (error) {
                     console.error(error);
              }
       };
}

async function loadData(data) {
       let container = document.getElementById("table-payment");
       let container1 = document.getElementById("table-delete-payment");
       let container2 = document.getElementById("table-edit-payment");
       let result = ``;
       let result1 = ``;
       let result2 = ``;

       for (let i of data) {
              let namePayment = i.namePayment;
              let codePayments = i.codePayments;
              let affiliatedBank = i.affiliatedBank;
              let String = `
         <tr>
             <td>${codePayments}</td>
             <td>${namePayment}</td>
             <td>${affiliatedBank}</td>
             <td>
                 <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPayment-${i.codePayments}"><i class="fa fa-edit"></i> Sửa</a>
                 <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePayment-${i.codePayments}"><i class="fa fa-trash"></i> Xóa</a>
             </td>
         </tr>
         
         `;

              let String1 = `
       <div class="modal fade" id="deletePayment-${i.codePayments}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteModalLabel">Xóa hình thức thanh toán</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     Bạn có chắc muốn xóa hình thức thanh toán này?
                     <br>
                     Mã hình thức thanh toán: ${i.codePayments}
     
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                     <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-confirm-delete" onclick="delete_PaymentsById('${i.codePayments}')">Xóa</button>
                 </div>
             </div>
         </div>
     </div>
         
         `;
              let String2 = `
         <div class="modal fade" id="editPayment-${i.codePayments}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="editModalLabel">Cập nhật thông tin hình thức thanh toán</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <form id="editForm">
                                 <div class="mb-3">
                                     <label for="codePayments" class="form-label">Mã hình thức thanh toán</label>
                                     <input type="text" class="form-control" id="${i.codePayments}" name="codePayments" value="${i.codePayments}" disabled>
                                 </div>
                                 <div class="mb-3">
                                     <label for="namePayment" class="form-label">Tên hình thức thanh toán</label>
                                     <input type="text" class="form-control" id="${i.codePayments}-${i.namePayment}" name="namePayment" value="${i.namePayment}">
                                 </div>
                                 <div class="mb-3">
                                     <label for="affiliatedBank" class="form-label">Công ty liên kết</label>
                                     <input type="text" class="form-control" id="${i.codePayments}-${i.affiliatedBank}" name="affiliatedBank" value="${i.affiliatedBank}">
                                 </div>
                                 <div style="text-align:right;">
                                     <button type="submit" data-bs-dismiss="modal" class="btn btn-primary" onclick="update_PaymentsObj('${i.codePayments}', '${i.codePayments}-${i.namePayment}', '${i.codePayments}-${i.affiliatedBank}', event)">Cập nhật hình thức thanh toán</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         
         `;
              // console.log(String);
              result += String;
              result1 += String1;
              result2 += String2;
       }
       // console.log(result);
       container.innerHTML = result;
       container1.innerHTML = result1;
       // console.log(result1);
       container2.innerHTML = result2;
       // console.log(result2);
}

async function getObj($code) {
       try {
              // gọi AJAX để kiểm tra

              let response = await fetch("../../../BLL/PaymentBLL.php", {
                     method: "POSt",
                     headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                     },
                     body:
                            "function=" +
                            encodeURIComponent("getObj") +
                            "&codePayments=" +
                            encodeURIComponent(codePayments),
              });

              let data = await response.json();
              console.log(data);
       } catch (error) {
              console.error(error);
       }
}

// xoá payment bởi mã đối tượng
async function delete_PaymentsById(code) {
       try {
              // Gọi AJAX để xóa payment

              let response = await fetch("../../../BLL/PaymentBLL.php", {
                     method: "POST",
                     headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                     },
                     body:
                            "function=" +
                            encodeURIComponent("deletObjById") +
                            "&codePayments=" +
                            encodeURIComponent(code),
              });

              let data = await response.json();
              console.log(data);
              if (data.mess === "success") {
                     Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Đã xóa phương thức thanh toán thành công",
                            showConfirmButton: false,
                            timer: 1500,
                     });
                     await getArr();
              } else {
                     Swal.fire({
                            icon: "error",
                            title: "Xóa không thành công",
                            text: "Bị ràng buộc dữ liệu",
                            footer: '<a href="#"></a>',
                     });
              }
       } catch (error) {
              console.error(error);
       }
}

// Xóa payment bằng cách truyền một đối tượng
async function delete_PaymentsByObj(obj) {
       try {
              // Gửi AJAX request để xóa payment
              let response = await fetch("../../../BLL/PaymentBLL.php", {
                     method: "POST",
                     headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                     },
                     body:
                            "function=" +
                            encodeURIComponent("deleteObj") +
                            "&namePayment=" +
                            encodeURIComponent(obj.namePayment) +
                            "&codePayments=" +
                            encodeURIComponent(obj.codePayments) +
                            "&affiliatedBank=" +
                            encodeURIComponent(obj.affiliatedBank),
              });

              // Nhận và xử lý dữ liệu trả về từ server
              let data = await response.json();
              console.log(data);
       } catch (error) {
              console.error(error);
       }
}

// Sửa payment bằng cách truyền một đối tượng
async function update_PaymentsObj(
       codePayments,
       namePayment,
       affiliatedBank,
       event
) {
       event.preventDefault();
       let codePaymentsValue = document.getElementById(codePayments).value.trim();
       let namePaymentValue = document.getElementById(namePayment).value.trim();
       let affiliatedBankValue = document
              .getElementById(affiliatedBank)
              .value.trim();
       console.log(codePaymentsValue);
       console.log(namePaymentValue);

       // Kiểm tra xem có bất kỳ trường nào để trống không
       if (!codePaymentsValue || !namePaymentValue || !affiliatedBankValue) {
              Swal.fire({
                     icon: "error",
                     title: "Lỗi",
                     text: "Vui lòng điền đầy đủ thông tin",
                     footer: '<a href="#">Need help?</a>',
              });
              await getArr();
              return;
       }
       try {
              // Gọi AJAX để xóa payment

              let response = await fetch("../../../BLL/PaymentBLL.php", {
                     method: "POST",
                     headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                     },
                     body:
                            "function=" +
                            encodeURIComponent("updatePaymentByObj") +
                            "&namePayment=" +
                            encodeURIComponent(namePaymentValue) +
                            "&codePayments=" +
                            encodeURIComponent(codePaymentsValue) +
                            "&affiliatedBank=" +
                            encodeURIComponent(affiliatedBankValue),
              });
              let data = await response.json();
              console.log(data);
              if (data.mess === "success") {
                     Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Sửa phương thức thanh toán thành công",
                            showConfirmButton: false,
                            timer: 1500,
                     });
                     await getArr();
              }
       } catch (error) {
              console.error(error);
       }
}

//phần phân trang
function loadItem(thisPage, limit) {
       // tính vị trí bắt đầu và kêt thúc
       let beginGet = limit * (thisPage - 1);
       let endGet = limit * thisPage - 1;

       // lấy tất cả các dòng dữ liệu có trong bảng
       let all_data_rows = document.querySelectorAll("#table-payment > tr");

       all_data_rows.forEach((item, index) => {
              if (index >= beginGet && index <= endGet) {
                     item.style.display = "table-row";
              } else {
                     item.style.display = "none";
              }
       });

       // hàm tính có bao nhieu nút chuyển trang
       listPage(thisPage, limit, all_data_rows);
       // loadPage();
}

function listPage(thisPage, limit, all_data_rows) {
       let result = "";
       let count = Math.ceil(all_data_rows.length / limit);
       // thêm nút prev

       if (thisPage != 1) {
              let string = `<li class="page-item" onclick="loadItem(${Number(thisPage) - 1
                     },${limit})"><a class="page-link">Previous</a></li>`;
              result += string;
       } else if (thisPage == 1) {
              let string = `<li class="page-item disabled" style="cursor: default;"><a class="page-link">Previous</a></li>`;
              result += string;
       }

       // tính xem có bao nhieu nút

       // lấy container chứa nút phân trang
       let container = document.getElementById("Pagination");

       for (let i = 1; i <= count; i++) {
              let string = `<li class="page-item" onclick="loadItem(${i},${limit})"><a class="page-link">${i}</a></li>`;
              if (i == thisPage) {
                     string = `<li class="page-item active" onclick="loadItem(${i},${limit})"><a class="page-link">${i}</a></li>`;
              }
              result += string;
       }

       // thêm nút next

       if (thisPage != count) {
              let string1 = `<li class="page-item" onclick="loadItem(${Number(thisPage) + 1
                     },${limit})"><a class="page-link">Next</a></li>`;
              result += string1;
       } else if (thisPage == count) {
              let string1 = `<li class="page-item disabled" style="cursor: default;"><a class="page-link">Next</a></li>`;
              result += string1;
       }

       container.innerHTML = result;
}

function loadPage() {
       // Lấy danh sách tất cả các thẻ <li> trong <ul> có id là "Panigation"
       var listItems = document.querySelectorAll("#Pagination li");

       // Duyệt qua từng phần tử trong danh sách
       listItems.forEach(function (item) {
              // Kiểm tra xem phần tử hiện tại có class là "active" hay không
              if (item.classList.contains("active")) {
                     // Nếu có, lấy nội dung trong thẻ <a> bên trong và chuyển thành số
                     var activePageText = item.querySelector("a").textContent.trim();
                     var activePageNumber = parseInt(activePageText);
                     console.log("Trang đang active: " + activePageNumber);
                     loadItem(activePageNumber, 4);
              }
       });
}

window.addEventListener("load", async function () {
       // Thực hiện các hàm bạn muốn sau khi trang web đã tải hoàn toàn, bao gồm tất cả các tài nguyên như hình ảnh, stylesheet, v.v.
       console.log("Trang quản lý hình thức thanh toán cấp đã load hoàn toàn");
       await getArr();
       loadItem(1, 4);
       searchPayment();
});

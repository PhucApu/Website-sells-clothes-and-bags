// --------------- AJAX
async function loadData(dateStart, dateEnd, keyword, stateNeed) {
       try {
              // gọi AJAX để kiểm tra
              const response = await fetch('../../../BLL/OrderBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body: 'function=' + encodeURIComponent('getArrOrder_by_Date_State_UserName') + '&dateStart=' + encodeURIComponent(dateStart) + '&dateEnd=' + encodeURIComponent(dateEnd) + '&keyword=' + encodeURIComponent(keyword) + '&stateNeed=' + encodeURIComponent(stateNeed)
              });

              const data = await response.json();
              console.log(data);

              showDataTable(data);

       } catch (error) {
              console.error('Error:', error);
       }
}

// show data table
function showDataTable(data) {
       let container = document.getElementById('data-table');
       container.innerHTML = `
              <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
              </div>
       `;
       let container_modal_fix = document.getElementById('modal-fix-order');
       if (data.length > 0) {
              let result = '';
              let result_2 = '';
              for (let item of data) {
                     let orderCode = item.orderCode;
                     let userName = item.userName;
                     let deliveryAddress = item.deliveryAddress;
                     let note = item.note;
                     let totalMoney = item.totalMoney;
                     let status = item.status;
                     let dateCreated = item.dateCreated;

                     let string = `
                            <tr>
                                   <td>${orderCode}</td>
                                   <td>${userName}</td>
                                   <td>${deliveryAddress}</td>
                                   <td>${note}</td>
                                   <td>${totalMoney}</td>
                                   <td>${status}</td>
                                   <td>${dateCreated}</td>

                                   <td><a href="./bill_list_detail.php?orderCode=${orderCode}" class="btn-table-billDetail"> <i class="fa-solid fa-eye"></i> Chi tiết</a></td>
                                   <td>
                                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#${orderCode}">
                                                 <i class="fa-solid fa-wrench"></i> Sửa
                                          </button>
                                   </td>
                            </tr>
                     `;
                     result += string;

                     let string_1 = `
                     <div class="modal fade" id="${orderCode}" tabindex="-1" aria-labelledby="${orderCode}" aria-hidden="true">
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h1 class="modal-title fs-5" id="${orderCode}">Modal title</h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                           <span>Trạng thái đơn hàng: </span> 
                           <select id="${orderCode}-status" class="form-select" aria-label="Default select example">
                                   <option value="${status}" selected>${status}</option>
                                   <option value="completed">Completed</option>
                                   <option value="processing">Processing</option>
                                   <option value="cancelled">Cancelled</option>
                            </select>
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button onclick="updateStatus('${orderCode}','${orderCode}-status')" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                         </div>
                       </div>
                     </div>
                   </div>
                     `;
                     result_2 += string_1;

              }
              container.innerHTML = result;
              container_modal_fix.innerHTML = result_2;
       } else {
              Swal.fire({
                     position: "center",
                     icon: "error",
                     title: "Không có dữ liệu trong khoảng thời gian này !!",
              });
       }
}

async function TimKiem() {
       let dateStart = document.getElementById('date-start').value;
       let dateEnd = document.getElementById('date-end').value;
       let state = document.getElementById('state-order').value;
       let keyword = document.getElementById('keyword-search').value;

       if (dateStart == '') {
              dateStart = '2000-01-01';
       }
       if (dateEnd == '') {
              let currentDate = new Date();
              // Lấy ngày, tháng và năm hiện tại
              var ngay = currentDate.getDate();
              var thang = currentDate.getMonth() + 1; // Tháng bắt đầu từ 0, cần cộng thêm 1
              var nam = currentDate.getFullYear();

              // Định dạng lại ngày tháng năm thành chuỗi "dd/mm/yyyy"
              dateEnd = nam + "-" + thang + "-" + ngay;
       }

       if (keyword == '') {
              keyword = 'empty';
       }

       console.log(dateStart, dateEnd, state, keyword);

       await loadData(dateStart, dateEnd, keyword, state);
}

async function updateStatus(orderCode, id) {
       let state = document.getElementById(id).value;
       console.log(orderCode, state);

       try {
              // gọi AJAX để kiểm tra
              const response = await fetch('../../../BLL/OrderBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body: 'function=' + encodeURIComponent('updateStateOrder') + '&orderCode=' + encodeURIComponent(orderCode) + '&state=' + encodeURIComponent(state)
              });

              const data = await response.json();
              console.log(data);

              if(data.mess == 'success'){
                     await Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Cập nhật thành công !",
                            showConfirmButton: false,
                            timer: 2000
                     });
                     await TimKiem();
              }else{
                     await Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Cập nhật thất bại !",
                            showConfirmButton: false,
                            timer: 2000
                     });
              }

       } catch (error) {
              console.error('Error:', error);
       }

}








window.addEventListener('load', async function () {
       console.log('Trang list order đã load hoàn toàn');
       await TimKiem();
});














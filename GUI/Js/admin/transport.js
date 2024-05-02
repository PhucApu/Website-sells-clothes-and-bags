
async function getArr() {
       try {
              // gọi AJAX để kiểm tra
              const response = await fetch('../../../BLL/TransportBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body: 'function=' + encodeURIComponent('getArrObj')
              });
              
              const data = await response.json();
              console.log(data);
              console.log(data[0].codeTransport);
              
              //     Display Transport
              showTransport(data);
              
              
       } catch (error) {
              console.error('Error:', error);
       }
}

async function getObj(code) {
       let codeTransport = code;
       try {
              // gọi AJAX để kiểm tra
              const response = await fetch('../../../BLL/TransportBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body: 'function=' + encodeURIComponent('getObj') + '&codeTransport=' + encodeURIComponent(codeTransport)
              });
              
              const data = await response.json();
              console.log(data);

       } catch (error) {
              console.error('Error:', error);
       }
}




function showTransport(data){
       let container = document.getElementById('transportList');
       let container1 = document.getElementById('edit-transport');
       let container2 = document.getElementById('delete-transport');


       let result1 = ``;
       let result = ``;
       let result2 = ``;

       for(let i of data){
              let str = `
              <tr>
                     <td>${i.nameTransport}</td>
                     <td>${i.codeTransport}</td>
                     <td>${i.affiliatedCompany}</td>
                     <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTransport-${i.codeTransport}"><i class="fa fa-edit"></i> Sửa</a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTransport-${i.codeTransport}"><i class="fa fa-trash"></i> Xóa</a>
                     </td>
              </tr>
              `;
              
              // Str sửa
              let str1 = `
                     <div class="modal fade" id="editTransport-${i.codeTransport}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                   <div class="modal-header">
                                   <h5 class="modal-title" id="editModalLabel">Cập nhật thông tin hình thức vận chuyển</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                   <form id="editForm">
                                          <div class="mb-3">
                                          <label for="codeTransport" class="form-label">Mã hình thức vận chuyển</label>
                                          <input type="text" class="form-control" id="${i.codeTransport}" name="codeTransport" value="${i.codeTransport}" disabled>
                                          </div>
                                          <div class="mb-3">
                                          <label for="nameTransport" class="form-label">Tên hình thức vận chuyển</label>
                                          <input type="text" class="form-control" id="${i.codeTransport}-${i.nameTransport}" name="nameTransport" value="${i.nameTransport}">
                                          </div>
                                          <div class="mb-3">
                                          <label for="affiliatedCompany" class="form-label">Công ty liên kết</label>
                                          <input type="text" class="form-control" id="${i.codeTransport}-${i.affiliatedCompany}" name="affiliatedCompany" value="${i.affiliatedCompany}">
                                          </div>
                                          <div style="text-align:right;">
                                                 <button data-bs-dismiss="modal" class="btn btn-primary" id="btn-update" onclick="updateTransport('${i.codeTransport}','${i.codeTransport}-${i.nameTransport}','${i.codeTransport}-${i.affiliatedCompany}',event)">Cập nhật</button>
                                          </div>   
                                   </form>
                                   </div>
                            </div>
                            </div>
                     </div>
              `;

              // str xóa
              let str2 = `
                            <div class="modal fade" id="deleteTransport-${i.codeTransport}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                          <div class="modal-content">
                                                 <div class="modal-header">
                                                 <h5 class="modal-title" id="deleteModalLabel">Xóa hình thức vận chuyển</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                 Bạn có chắc muốn xóa hình thức vận chuyển này?
                                                 <br>
                                                 Mã hình thức vận chuyển: ${i.codeTransport}
                                                 
                                                 </div>
                                                 <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                 <button data-bs-dismiss="modal" type="button" class="btn btn-danger btn-confirm-delete" onclick="deleteTransport('${i.codeTransport}')">Xóa</button>
                                                 </div>
                                          </div>
                                   </div>
                            </div>
              `;



              result += str;
              result1 += str1;
              result2 += str2;
       }
       container.innerHTML = result;
       container1.innerHTML = result1;
       container2.innerHTML = result2;
}

function searchTransports(){
       document.getElementById("input-search").oninput = async function(){
              try {
                     let str = document.getElementById("input-search").value;
                     // gọi AJAX để kiểm tra
                     const response = await fetch('../../../BLL/TransportBLL.php', {
                            method: 'POST',
                            headers: {
                                   'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'function=' + encodeURIComponent('searchTransports')+'&str=' + encodeURIComponent(str)
                     });
                     
                     const data = await response.json();
                     console.log(data);
                     
                 // Display Transport
                     showTransport(data);
                     
                     
              } catch (error) {
                     console.error('Error:', error);
              }
              
       };
}

       async function updateTransport(code,name,company,event){
              event.preventDefault();
              let codeTransportValue = document.getElementById(code).value;
              let nameTransportValue = document.getElementById(name).value;
              let affiliatedCompanyValue = document.getElementById(company).value;
              try{
                     const response = await fetch('../../../BLL/TransportBLL.php', {
                            method: 'POST',
                            headers: {
                                   'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'function=' + encodeURIComponent('updateObj')+'&codeTransport=' + encodeURIComponent(codeTransportValue)+
                            '&nameTransport=' + encodeURIComponent(nameTransportValue)+ '&affiliatedCompany=' + encodeURIComponent(affiliatedCompanyValue)
                     });
                     
                     const data = await response.json();
                     console.log(data);
                     if(data.mess === "success"){
                            await Swal.fire({
                                   position: "center",
                                   icon: "success",
                                   title: "Cập nhật thành công",
                                   showConfirmButton: false,
                                   timer: 1500
                                 });
                            await getArr();
                     }
                     
                     
              } catch (error) {
                     console.error('Error:', error);
              };      
       }

       //Xóa transport
       async function deleteTransport(code){
       
              try {
              // gọi AJAX để kiểm tra
              const response = await fetch('../../../BLL/TransportBLL.php', {
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body: 'function=' + encodeURIComponent('deleteObjByID')+'&codeTransport=' + encodeURIComponent(code)
              });
              
              const data1 = await response.json();
              console.log(data1);
              if(data1.mess === "success"){
                     await Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Xóa hình thức vận chuyển thành công",
                            showConfirmButton: false,
                            timer: 1500
                          });
                     await getArr();
              }


              } catch (error) {
                     console.error('Error:', error);
              }

       }

window.addEventListener("load", async function () {
       // Thực hiện các hàm bạn muốn sau khi trang web đã tải hoàn toàn, bao gồm tất cả các tài nguyên như hình ảnh, stylesheet, v.v.
       console.log("Trang transport đã load hoàn toàn");
       await getArr();
       searchTransports();
});


// async function getTransportByCode(data){
//        try {
              
//        } catch (error) {
//               console.error('Error:', error);
//        }
// }


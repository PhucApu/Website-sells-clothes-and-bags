
async function getArr() {

       try {
              // gọi AJAX để kiểm tra


              let response = await fetch('../../../BLL/SizeBLL.php', {
                     method: 'POSt',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('getArrObj')
              });

              let data = await response.json();
              console.log(data);
              console.log(1);
              // console.log(data[0].nameSize);
              showData(data);

       } catch (error) {
              console.error(error);
       }

}
getArr();

function showData(data) {

       let container = document.getElementById('container-table');
       let editSizeContainer = document.getElementById('editSize-container');
       let result = ``;
       let result2 = ``;
       for (let i of data) {
              let nameSize = i.sizeName;
              let codeSize = i.sizeCode;

              let string = `
              <tr>
                                <td>${codeSize}</td>
                                <td>${nameSize}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editSize-${codeSize}"><i class="fa fa-edit"></i> Sửa</a>
                                </td>
              </tr>
       
              `;

              let string2 = `
                     <div class="modal fade" id="editSize-${codeSize}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                   <div class="modal-header">
                                   <h5 class="modal-title" id="editModalLabel">Cập nhật thông tin Size</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                   <form id="editForm">
                                          <div class="mb-3">
                                          <label for="sizeCode" class="form-label">Mã size</label>
                                          <input type="text" class="form-control" id="${codeSize}" name="sizeCode" value="${codeSize}" disabled>
                                          </div>
                                          <div class="mb-3">
                                          <label for="sizeName" class="form-label">Tên kích thước</label>
                                          <input type="text" class="form-control" id="${codeSize}-${nameSize}" name="sizeName" value="${nameSize}">
                                          </div>
                                          <div style="text-align:right;">
                                                 <button data-bs-dismiss="modal" class="btn btn-primary" id="btn-update" onclick="updateSize('${codeSize}','${codeSize}-${nameSize}',event)">Cập nhật</button>
                                          </div>   
                                   </form>
                                   </div>
                            </div>
                            </div>
                     </div>

              `;
              result += string;
              result2 += string2;
       }
       container.innerHTML = result;
       // console.log(result);
       editSizeContainer.innerHTML = result2;
       // console.log(result2);

}

function searchSizes() {

       document.getElementById('inputSearch').oninput = async function () {
              try {
                     // gọi AJAX để kiểm tra


                     let str = document.getElementById('inputSearch').value.trim();
                     let response = await fetch('../../../BLL/SizeBLL.php', {
                            method: 'POST',
                            headers: {
                                   'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'function=' + encodeURIComponent('searchSizes') + '&str=' + encodeURIComponent(str)
                     });

                     const data = await response.json();

                     console.log(data);
                     showData(data);

              } catch (error) {
                     console.error(error);
              }
       };


}


async function updateSize(code, name, event) {
       event.preventDefault();
       let codeSize = document.getElementById(code).value.trim();
       let nameSize = document.getElementById(name).value.trim();
       if (codeSize === '' || nameSize === '') {
              await Swal.fire({
                     position: "center",
                     icon: "error",
                     title: "Sửa Thất Bại",
                     showConfirmButton: false,
                     timer: 1500
              });
       }
       else {
              try {
                     const response = await fetch('../../../BLL/SizeBLL.php', {
                            method: 'POST',
                            headers: {
                                   'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'function=' + encodeURIComponent('updateSize') + '&nameSize=' + encodeURIComponent(nameSize) +
                                   '&sizeCode=' + encodeURIComponent(codeSize)
                     });

                     const data = await response.json();
                     console.log(data);
                     if (data.mess === "success") {
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

              }
              console.error('Error:', error);
       };
}

window.addEventListener('load', async function () {
       // Thực hiện các hàm bạn muốn sau khi trang web đã tải hoàn toàn, bao gồm tất cả các tài nguyên như hình ảnh, stylesheet, v.v.

       await getArr();
       searchSizes();

});
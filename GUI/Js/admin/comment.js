async function getArr() {
    try {
        // gọi AJAX để kiểm tra
        const response = await fetch('../../../BLL/CommentBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'function=' + encodeURIComponent('getArrObj')
        });

        const data = await response.json();
        console.log(data);
        showComment(data);

    } catch (error) {
        console.error('Error:', error);
    }
}

async function showComment(data) {
    let container = document.getElementById('listComment');
    let container1 = document.getElementById('editState');
    let result = ``;
    let result1 = ``;
    for (let i of data) {

        //Check trạng thái
        let strStt = '';
        if(i.state == '1'){
            strStt = `<td><a class="btn btn-sm btn-primary fa fa-eye" title="Click để ẩn bình luận" onclick="updateStateComment('${i.codeComment}','${i.state}',event)"> Hiện</a></td>`;
        }
        else {
            strStt = `<td><a class="btn btn-sm btn-danger fa fa-eye-slash" title="Click để hiện bình luận" onclick="updateStateComment('${i.codeComment}','${i.state}',event)"> Ẩn</a></td>`;
        }

        //str container
        let str = `
            <tr>
                <td>${i.codeComment}</td>
                <td>${i.userNameComment}</td>
                <td>${i.productCode}</td>
                <td>${i.likeNumber}</td>
                <td>${i.content}</td>
                <td>${i.sentDate}</td>
                ${strStt}
                <td><a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteComment-${i.codeComment}"><i class="fa fa-trash"></i> Xóa</a></td>
            </tr>
        `;

        // str xóa
        let str1 = `
            <div class="modal fade" id="deleteComment-${i.codeComment}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Xóa bình luận</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Bạn có chắc muốn xóa bình luận này?
                                <br>
                                Mã bình luận: <b>${i.codeComment}</b>
                                <br>
                                Tài khoản bình luận: <b>${i.userNameComment}</b>
                                <br>
                                Nội dung bình luận: <b>${i.content}</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button data-bs-dismiss="modal" type="button" class="btn btn-danger btn-confirm-delete" onclick="deleteComment('${i.codeComment}')">Xóa</button>
                                </div>
                        </div>
                </div>
            </div>
        `;

        result += str;
        result1 += str1;
    }
    container.innerHTML = result;
    container1.innerHTML = result1;
}



// Hàm tìm kiếm
function searchComments(){
    document.getElementById("input-search").oninput = async function(){
           try {
                  let str = document.getElementById("input-search").value;
                  // gọi AJAX để kiểm tra
                  const response = await fetch('../../../BLL/CommentBLL.php', {
                         method: 'POST',
                         headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                         },
                         body: 'function=' + encodeURIComponent('searchComments')+'&str=' + encodeURIComponent(str)
                  });
                  
                  const data = await response.json();
                  console.log(data);
                  
              // Load lại cmt sau khi nhập ký tự
                  showComment(data);
                  
                  
           } catch (error) {
                  console.error('Error:', error);
           }
           
    };
}


// Hàm xóa bình luận
async function deleteComment(code){
    try {
        // gọi AJAX để kiểm tra
        const response = await fetch('../../../BLL/CommentBLL.php', {
               method: 'POST',
               headers: {
                      'Content-Type': 'application/x-www-form-urlencoded'
               },
               body: 'function=' + encodeURIComponent('deleteObjByID')+'&codeComment=' + encodeURIComponent(code)
        });
        
        const data1 = await response.json();
        console.log(data1);
        if(data1.mess === "success"){
               await Swal.fire({
                      position: "center",
                      icon: "success",
                      title: "Xóa bình luận thành công",
                      showConfirmButton: false,
                      timer: 1500
                    });
               await getArr();
        }


        } catch (error) {
               console.error('Error:', error);
        }

}


//Hàm thay đổi trạng thái
async function updateStateComment(code,state,event){
    event.preventDefault();
    
    try{
           const response = await fetch('../../../BLL/CommentBLL.php', {
                  method: 'POST',
                  headers: {
                         'Content-Type': 'application/x-www-form-urlencoded'
                  },
                  body: 'function=' + encodeURIComponent('updateStateObj')+'&codeComment=' + encodeURIComponent(code)+
                  '&state=' + encodeURIComponent(state)
           });
           
           const data = await response.json();
           console.log(data);
           if(data.mess === "success"){
                  await getArr();
           }
           
           
    } catch (error) {
           console.error('Error:', error);
    };      
}

window.addEventListener("load", async function () {
       // Thực hiện các hàm bạn muốn sau khi trang web đã tải hoàn toàn, bao gồm tất cả các tài nguyên như hình ảnh, stylesheet, v.v.
       console.log("Trang Comment đã load hoàn toàn");
       await getArr();
       searchComments();
});
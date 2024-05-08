//---------- AJAX
async function Search(page, limit) {

    // lấy các thông tin search



    // goi ajax
    try {
        const response = await fetch('../../../BLL/ProductBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:
                'function=' + encodeURIComponent('Pagination_Search') + '&page=' + encodeURIComponent(page) + '&limit=' + encodeURIComponent(limit) + '&keyword=' + encodeURIComponent('empty') + '&type=' + encodeURIComponent('empty')
        });
        const data = await response.json();
        console.log(data);

        if (data != null) {
            let dataLength = 0;
            for (let i of data) {
                if (i.lengthProduct !== undefined) {
                    dataLength = i.lengthProduct;
                }
            }
            listPage(page, limit, dataLength);
            let conatiner = document.getElementById('listProduct');
            

            conatiner.innerHTML = `
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            `;
            
            await showDataTable(data)
        }

    } catch (error) {
        console.error('Error:', error);
    }
}

// size
async function getDataSize(productCode) {
    // goi ajax
    try {
        const response = await fetch('../../../BLL/ProductBLL.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:
                'function=' + encodeURIComponent('getArrSizeCodeByProductCode') + '&code=' + encodeURIComponent(productCode)
        });
        const data = await response.json();
        console.log(data);

        return data;


    } catch (error) {
        console.error('Error:', error);
    }
}


function listPage(thisPage, limit, all_data_rows) {
    let result = '';
    let count = Math.ceil(all_data_rows / limit);
    // thêm nút prev
    if (thisPage != 1) {
        let string = `<li class="page-item" onclick="Search(${Number(thisPage) - 1},${limit})"><a class="page-link">Previous</a></li>`;
        result += string;
    } else if (thisPage == 1) {
        let string1 = `<li class="page-item disabled" style="cursor: default;"><a class="page-link">Previous</a></li>`;
        result += string1;
    }

    // tính xem có bao nhieu nút

    // lấy container chứa nút phân trang
    let container = document.getElementById('Pagination');

    for (let i = 1; i <= count; i++) {

        let string = `<li class="page-item" onclick="Search(${i},${limit})"><a class="page-link">${i}</a></li>`;
        if (i == thisPage) {
            string = `<li class="page-item active" onclick="Search(${i},${limit})"><a class="page-link">${i}</a></li>`;
        }
        result += string;
    }

    // thêm nút next
    if (thisPage != count) {
        let string = `<li class="page-item" onclick="Search(${Number(thisPage) + 1},${limit})"><a class="page-link">Next</a></li>`;
        result += string;
    } else if (thisPage == count) {
        let string = `<li class="page-item disabled" style="cursor: default;"><a class="page-link">Next</a></li>`;
        result += string;
    }

    container.innerHTML = result;
}

// function loadPage() {
//     // Lấy danh sách tất cả các thẻ <li> trong <ul> có id là "Panigation"
//     var listItems = document.querySelectorAll('#Pagination li');

//     // Duyệt qua từng phần tử trong danh sách
//     listItems.forEach(function (item) {
//            // Kiểm tra xem phần tử hiện tại có class là "active" hay không
//            if (item.classList.contains('active')) {
//                   // Nếu có, lấy nội dung trong thẻ <a> bên trong và chuyển thành số
//                   var activePageText = item.querySelector('a').textContent.trim();
//                   var activePageNumber = parseInt(activePageText);
//                   console.log("Trang đang active: " + activePageNumber);
//                   Search(activePageNumber, 5);
//            }
//     });

// }

// show dữ liệu lên bảng
async function showDataTable(data) {
    let conatiner = document.getElementById('listProduct');
    let containerDetail = document.getElementById('content-product-detail');
    if (data != null) {
        let result_table = '';
        let result_modal_detail = '';
        for (let item of data) {
            if (item.lengthProduct === undefined) {
                let productCode = item.productCode;
                let nameProduct = item.nameProduct;
                let stringImg = item.imgProduct;
                let arrImg = stringImg.split(' ');
                let firstImg = arrImg[0];
                let supplierCode = item.supplierCode;
                let targetGender = item.targetGender;
                let describeProduct = item.describeProduct;
                let state = item.status;
                let quantity = item.quantity;
                let price = item.price;
                let type = item.type;

                // show chung
                let stringTable = `
                    <tr>
                        <td>${nameProduct}</td>
                        <td>${productCode}</td>
                        <td><img src="../${firstImg}" width="50px"></td>
                        <td>${quantity}</td>
                        <td>${price}$</td>
                        <td>${state}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i>Sửa</a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa fa-trash"> </i>Xóa</a>
                            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#${productCode}"><i class="fa fa-eye"> </i>Xem</a>
                        </td>
                    </tr>
                `;

                if (item.type == "shirtProduct") {
                    // lấy thông tin size
                    // let container_detail = document.getElementById('');
                    let dataSize = await getDataSize(productCode);
                    let shirtMaterial = item.shirtMaterial;
                    let shirtStyle = item.shirtStyle;
                    let promotion = item.promotion;
                    let descriptionMaterial = item.descriptionMaterial;

                    // xu ly size

                    let resultSize = '';
                    for (let item of dataSize) {
                        let nameSize = item.sizeName;
                        let quantitySize = item.quantitySize;

                        let string = `
                            <tr>
                                <td>${nameSize}</td>
                                <td>${quantitySize}</td>
                            </tr>
                        `;
                        resultSize += string;
                    }

                    // xu ly anh chi tiet
                    let result_img = ``;
                    for (let item of arrImg) {
                        let string = `
                            <img src="../${item}" id="imgProduct" width="50px">
                        `;
                        result_img += string;
                    }

                    let string_final = `
                    
                    <div class="modal fade" id="${productCode}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel">Chi tiết sản phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div id="content-picture-product" class="col-md-4">
                                        <div id="main-picture-product">
                                            <img src="../${firstImg}" id="imgProduct" width="210px">
                                        </div>
                                        <div id="detail-picture-product" class="img-category mt-2">
                                            ${result_img}
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <!-- Field chung -->
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <td id="nameProduct">${nameProduct}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mã sản phẩm</th>
                                                    <td id="productCode">${productCode}</td>
                                                </tr>
                                                <tr>
                                                    <th>Giá</th>
                                                    <td id="price">${price}$</td>
                                                </tr>
                                                <tr>
                                                    <th>Giảm giá:</th>
                                                    <td id="price">${promotion}%</td>
                                                </tr>
                                                <tr>
                                                    <th>Danh mục</th>
                                                    <td id="category">${type}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mã nhà cung cấp</th>
                                                    <td id="codeSupplier">${supplierCode}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mô tả</th>
                                                    <td id="describe">${describeProduct}</td>
                                                </tr>
                                                <tr>
                                                    <th>Đối tượng</th>
                                                    <td id="targetGender">${targetGender}</th>
                                                </tr>
                                                <tr>
                                                    <th>Trạng thái</th>
                                                    <td id="status">${state}</td>
                                                </tr>

                                                <!-- Field riêng quần áo -->
                                                <tr>
                                                    <th>Phong cách</th>
                                                    <td id="shirtStyle">${shirtStyle}</td>
                                                </tr>
                                                <tr>
                                                    <th>Chất liệu</th>
                                                    <td id="shirtMaterial">${shirtMaterial}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mô tả chất liệu</th>
                                                    <td id="descriptionMaterial">${descriptionMaterial}</td>
                                                </tr>
                                                <!-- Size số lượng -->
                                                <tr style="border-top:2px solid black;">
                                                    <th>Size</th>
                                                    <th id="descriptionMaterial">Số lượng</th>
                                                </tr>
                                                <div id="content-size-detail">
                                                    ${resultSize}
                                                </div>

                                                <tr id="quantity-infor">
                                                    <th>Tổng</th>
                                                    <td id="quantity">${quantity}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    `;
                    result_modal_detail += string_final;
                }
                else if (item.type == "handbagProduct") {

                    let bagMaterial = item.bagMaterial;
                    let promotion = item.promotion;
                    let descriptionMaterial = item.descriptionMaterial;

                    // xu ly anh chi tiet
                    let result_img = ``;
                    for (let item of arrImg) {
                        let string = `
                            <img src="../${item}" id="imgProduct" width="50px">
                        `;
                        result_img += string;
                    }

                    let string_final = `
                    
                    <div class="modal fade" id="${productCode}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel">Chi tiết sản phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div id="content-picture-product" class="col-md-4">
                                        <div id="main-picture-product">
                                            <img src="../${firstImg}" id="imgProduct" width="210px">
                                        </div>
                                        <div id="detail-picture-product" class="img-category mt-2">
                                            ${result_img}
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <!-- Field chung -->
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <td id="nameProduct">${nameProduct}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mã sản phẩm</th>
                                                    <td id="productCode">${productCode}</td>
                                                </tr>
                                                <tr>
                                                    <th>Giá</th>
                                                    <td id="price">${price}$</td>
                                                </tr>
                                                <tr>
                                                    <th>Giảm giá:</th>
                                                    <td id="price">${promotion}%</td>
                                                </tr>
                                                <tr>
                                                    <th>Danh mục</th>
                                                    <td id="category">${type}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mã nhà cung cấp</th>
                                                    <td id="codeSupplier">${supplierCode}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mô tả</th>
                                                    <td id="describe">${describeProduct}</td>
                                                </tr>
                                                <tr>
                                                    <th>Đối tượng</th>
                                                    <td id="targetGender">${targetGender}</th>
                                                </tr>
                                                <tr>
                                                    <th>Trạng thái</th>
                                                    <td id="status">${state}</td>
                                                </tr>
                                                <tr>
                                                    <th>Chất liệu</th>
                                                    <td id="shirtMaterial">${bagMaterial}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mô tả chất liệu</th>
                                                    <td id="descriptionMaterial">${descriptionMaterial}</td>
                                                </tr>

                                                <tr id="quantity-infor">
                                                    <th>Tổng</th>
                                                    <td id="quantity">${quantity}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    `;
                    result_modal_detail += string_final;
                }

                result_table += stringTable;
            }

        }
        conatiner.innerHTML = result_table;
        containerDetail.innerHTML = result_modal_detail;
    }
}











function action() {
    $(document).ready(function () {
        $('#inputFile').change(function () {
            const files = $(this)[0].files;
            if (files.length > 0) {
                const imagePreview = $('#imagePreview');
                imagePreview.empty();

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail');
                        imagePreview.append(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    });
}
// action();

window.addEventListener("load", async function () {
    // Thực hiện các hàm bạn muốn sau khi trang web đã tải hoàn toàn, bao gồm tất cả các tài nguyên như hình ảnh, stylesheet, v.v.
    console.log("Trang quản lý sản phẩm đã load hoàn toàn");
    await Search(1, 5)
    // loadPage();
    action();
});

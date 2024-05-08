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

    if (data != null) {
        let result_table = '';

        for (let item of data) {
            if (item.lengthProduct === undefined) {
                let productCode = item.productCode;
                let nameProduct = item.nameProduct;
                let stringImg = item.imgProduct;
                let arrImg = stringImg.split(' ');
                let firstImg = arrImg[0];
                let supplierCode = item.supplierCode;
                let targetGender = item.targetGender;
                let descriptionMaterial = item.descriptionMaterial;
                let state = item.status;
                let quantity = item.quantity;
                let price = item.price;

                // lấy thông tin size
                await getDataSize(productCode);

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
                            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal"><i class="fa fa-eye"> </i>Xem</a>
                        </td>
                    </tr>
                `;

                // show chitiet san pham
                let stringDetailProduct = `

                `;

                result_table += stringTable;
            }

        }

        conatiner.innerHTML = result_table;
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

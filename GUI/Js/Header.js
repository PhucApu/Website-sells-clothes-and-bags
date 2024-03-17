
function showSearchBox(){
       let box = document.querySelector('header .search .box-search .result-search');
       let itemSearch = document.querySelectorAll('header .search .box-search .result-search .item');

       // neu ket qua tra ve > 2 product
       if(itemSearch.length > 2){
              box.style.height = '140px';
       }
       else{
              box.style.height = 'auto'; // Sử dụng giá trị mặc định cho height
       }
}
showSearchBox();

function search(){
       // event.preventDefault();
       let box = document.querySelector('header .search .box-search');
       let icon_seacrh = document.getElementById('search-icon');
       let input_search = document.querySelector('header .search .box-search input');
       // console.log(box);
       // console.log(icon_seacrh);
       // box.style.display = 'block';
       icon_seacrh.onclick = function(event){
              event.preventDefault();
              box.style.display = 'block';
              input_search.focus();
       }
       input_search.onblur = function(){
              box.style.display = 'none';
       }
}
search();
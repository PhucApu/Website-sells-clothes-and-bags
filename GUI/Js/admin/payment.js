


async function getArr() {

       try {
              // gọi AJAX để kiểm tra
              let response = await fetch('../../BLL/PaymentBLL.php', { 
                     method: 'POST',
                     headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                     },
                     body:
                            'function=' + encodeURIComponent('getArrObj')
              });

              let data = await response.json();
              console.log(data);
              
       } catch (error) {
              console.error(error);
       }

}
getArr();
const buttonReview = document.querySelectorAll('tbody tr td a ');

const boxReview = document.querySelector(".box-review");
buttonReview.forEach((current, i) => {
        current.addEventListener('click', () => {
                console.log(i);
                boxReview.innerHTML = ` <h2>Review</h2>
                <div class="box-product-review">
                        <div class="product-img-name">
                                <p>JDenim playsuit</p>
                                <img src="../image/product/product2/product-detail-1.png" alt="">
                        </div>
                        <div class="input-review">
                                <textarea rows="10" cols="60" placeholder="Write something....."></textarea>
                                <div><a href="#!">Send</a></div>
                        </div>
                </div> `;
        })
        
})

const priceSlider = document.getElementById("price-slider");
const priceLabel = document.getElementById("price-label");

priceSlider.addEventListener("input", () => {
  const price = priceSlider.value;
  priceLabel.textContent = `$${price}`;
});

const productListCont = document.querySelector(".product-list");
let stringProductList = "";

const buttonClick = document.querySelector(".item");
buttonClick.addEventListener("click", () => {
  for (let i = 0; i < 12; i++) {
    stringProductList += `<div class="product-container">
    <!--khung chứa ảnh-->
    <div class="image">
        <a href="" class="">
            <img src="../image/shop-image/${i + 1}.png" alt="">
        </a>
        <!--cart và xem chi tiết sp trong ảnh-->
        <div class="action-custom">
            <!--cart-->
            <div class="add-to-cart">
                <a href="" class="" title="add cart">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
            </div>
            <!--read-more-->
            <div class="readmore">
                <a href="" title="Detail">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- thong tin san pham -->
    <div class="product-meta">
        <div class="name">
            <a href="">Super-soft wrap jumpsuit</a>
        </div>

    </div>
    <!-- thong tin gia san pham -->
    <div class="price">
        <div itemprop="offers" class="pricelist"></div>
        <ins class="giamoi">$39.99</ins>
    </div>
</div>`;
  }
  productListCont.innerHTML = stringProductList;
});



const buttonClick2 = document.querySelector(".item 2");
buttonClick2.addEventListener("click", () => {
  for (let i = 0; i < 5; i++) {
    stringProductList += `<div class="product-container">
    <!--khung chứa ảnh-->
    <div class="image">
        <a href="" class="">
            <img src="../image/shop-image/${i + 1}.png" alt="">
        </a>
        <!--cart và xem chi tiết sp trong ảnh-->
        <div class="action-custom">
            <!--cart-->
            <div class="add-to-cart">
                <a href="" class="" title="add cart">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
            </div>
            <!--read-more-->
            <div class="readmore">
                <a href="" title="Detail">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- thong tin san pham -->
    <div class="product-meta">
        <div class="name">
            <a href="">Super-soft wrap jumpsuit</a>
        </div>

    </div>
    <!-- thong tin gia san pham -->
    <div class="price">
        <div itemprop="offers" class="pricelist"></div>
        <ins class="giamoi">$39.99</ins>
    </div>
</div>`;
  }
  productListCont.innerHTML = stringProductList;
});

<!DOCTYPE html>
<html lang="en">
<?php require('../../config.php')?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <!-- <link rel="stylesheet" href="../css/Footer.css">
       <link rel="stylesheet" href="../css/HomePage.css">
       <link rel="stylesheet" href="../css/Header.css"> -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        <?php require('../css/Header.css');
        require('../css/Footer.css');
        require('../css/Checkout.css');
        ?>
    </style>


</head>

<body>
    <!-- header -->
    <?php require('./header.php'); ?>
    <!-- body -->
    <section class="body">
        <div class="path">
            <div class="container-path"><a href="#!">Home</a>
                /
                <a href="#!">Checkout</a>

            </div>
        </div>
        <div class="main-content">
            <div class="container">
                <div class="content-left">
                    <h2>BILLING DETAILS</h2>
                    <hr>
                    <form action="">
                        <div class="form-item fullname">
                            <label for="fullname">Full Name<span>*</span><label>
                                    <input type="text" id="fullname" name="fullname">
                        </div>
                        <div class="form-item address">
                            <label for="address">Address<span>*</span></label>
                            <input type="address" id="address" name="address">
                        </div>
                        <div class="form-item phone">
                            <label for="phone">Phone<span>*</span></label>
                            <input type="text" id="phone" name="phone">
                        </div>
                        <div class="form-item order-note">
                            <label for="order-note">Order notes<span>*</span></label>
                            <input type="text" id="order-note" name="order-note">
                        </div>
                    </form>
                </div>
                <div class="content-right">
                    <h2>YOUR ORDER</h2>
                    <hr>
                    <div class="order">
                        <div class="title">
                            <p>No</p>
                            <p>Name</p>
                            <p>Quantity</p>
                            <p>Price</p>
                            <p>Total</p>
                        </div>
                        <div class="item-order">
                            <p>1</p>
                            <p>Oversized crinkled shirt</p>
                            <p>1</p>
                            <p>$100</p>
                            <p>$100</p>
                        </div>
                        <div class="item-order">
                            <p>1</p>
                            <p>Oversized crinkled shirt</p>
                            <p>1</p>
                            <p>$100</p>
                            <p>$100</p>
                        </div>
                        <div class="item-order">
                            <p>1</p>
                            <p>Oversized crinkled shirt</p>
                            <p>1</p>
                            <p>$100</p>
                            <p>$100</p>
                        </div>
                        <div class="item-order">
                            <p>1</p>
                            <p>Oversized crinkled shirt</p>
                            <p>1</p>
                            <p>$100</p>
                            <p>$100</p>
                        </div>
                    </div>
                    <hr>
                    <div class="total-order">
                        <p>Total</p>
                        <p>$400</p>
                    </div>
                    <hr>
                    <div class="button-placeorder">PLACE ORDER</div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php require('./footer.php'); ?>

    <script src="../Js/Header.js?v=<?php echo $version ?>"></script>
    <!-- <script src="../Js/shop.js"></script> -->
    <!-- <script src="../Js/pricesidebar.js"></script> -->
</body>

</html>
<div class="cart-view"  >
	<div class="text"><a href="javascript:void(0)" class="closebtn" onclick="closecartview()">&times;</a></div>
	<div class="cart-list" id="cartItem" style="margin-top: 60px;padding: 15px;">


	</div>
</div>



<style type="text/css">
	.cart-view{
		position: fixed;
		width: 360px;
		top: 0;
		bottom: 0;
		right: -360px;
		z-index: 9999999999999999999999;
		background: #fff;
		transition: right 0.4s ease;
		overflow-y: scroll;
	}
	.cart-view.show{

		right: 0px;

	}

/* 	.cart-btns{
	color: white;
	padding: 14px 25px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	background-color: #9F6D2D;
	width: 100%;
} */
/* 	.fa .fa-edit{
	color: white;
} */

	.cart-view .closebtn {
		position: absolute;
		top: 0;
		left: 25px;
		font-size: 36px;
		margin-right: : 30px;
		color: black;
	}
@media only screen and (max-width: 400px) {
	.cart-view{
		position: fixed;
		width: 330px;
		top: 0;
		bottom: 0;
		right: -330px;
		z-index: 9999999999999999999999;
		background: #fff;
		transition: right 0.4s ease; 
		overflow-y: scroll;
	}
 
}


</style>

<script>
	function openecartview() {
		$('.cart-view').toggleClass("show");
	}

	function closecartview() {
		$('.cart-view').toggleClass("show");
 /*$(".custom1").css("margin-left", "30px");
 $(".custom").css("margin-left", "0");*/
}
</script>

<style type="text/css">
	.cartbox-wrap {
  position: absolute;
  height: 100vh;
  width: 100%;
  left: 0;
  top: 0;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: all 0.7s ease-in-out 0s;
  -moz-transition: all 0.7s ease-in-out 0s;
  -ms-transition: all 0.7s ease-in-out 0s;
  -o-transition: all 0.7s ease-in-out 0s;
  transition: all 0.7s ease-in-out 0s;
  z-index: 99;
}
.cartbox-wrap .body-overlay {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  background: rgba(30, 30, 30, 0.85);
  z-index: 9991;
  visibility: hidden;
  opacity: 0;
  cursor: url(images/icon/close.png), crosshair;
}
.cartbox-wrap.is-visible {
  visibility: visible;
  opacity: 1;
}
.cartbox-wrap.is-visible .body-overlay {
  visibility: visible;
  opacity: 1;
}
.cartbox-wrap.is-visible .cartbox {
  right: 0;
  -webkit-animation: slideInRight 0.7s ease-in-out both;
  -moz-animation: slideInRight 0.7s ease-in-out both;
  -ms-animation: slideInRight 0.7s ease-in-out both;
  -o-animation: slideInRight 0.7s ease-in-out both;
  animation: slideInRight 0.7s ease-in-out both;
}
.cartbox {
  position: fixed;
  top: 0;
  right: -100%;
  z-index: 9992;
  height: 100%;
  width: 465px;
  background: #fafafa;
  min-height: 100vh;
  -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  padding: 25px 35px;
  -webkit-transition: all 0.7s ease-in-out 0s;
  -moz-transition: all 0.7s ease-in-out 0s;
  -ms-transition: all 0.7s ease-in-out 0s;
  -o-transition: all 0.7s ease-in-out 0s;
  transition: all 0.7s ease-in-out 0s;
  overflow-y: auto;
}
.cartbox .cartbox-close {
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  -ms-transition: all 0.3s ease-in-out 0s;
  -o-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
  background: transparent;
  font-size: 25px;
  text-transform: uppercase;
  margin-right: -5px;
  border: 0 none;
}
.cartbox .cartbox-close:hover {
  color: #d50c0d;
}
.cartbox__items {
  padding-bottom: 20px;
  border-bottom: 1px solid #aaaaaa;
}
.cartbox__item {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  -webkit-justify-content: space-between;
  -moz-justify-content: space-between;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  -moz-align-items: center;
  align-items: center;
  padding: 20px 0;
  border-bottom: 1px solid #f0f0f0;
}
.cartbox__item:last-child {
  border-bottom: none;
}
.cartbox__item__thumb {
  width: 70px;
  display: inline-block;
}
.cartbox__item__thumb a {
  display: inline-block;
}
.cartbox__item__content {
  flex-grow: 100;
  padding-left: 25px;
  padding-right: 25px;
}
.cartbox__item__content h5 {
  font-size: 15px;
  font-weight: 500;
  margin-bottom: 0;
  font-family: "Open Sans", sans-serif;
  font-style: normal;
  line-height: 1;
}
.cartbox__item__content h5 a:hover {
  color: #d50c0d;
}
.cartbox__item__content p {
  font-size: 12px;
  margin-bottom: 0;
}
.cartbox__item__content span.price {
  font-weight: 500;
  color: #d50c0d;
}
button.cartbox__item__remove {
  background: none;
  font-size: 20px;
  padding: 0;
  -webkit-align-self: flex-start;
  -moz-align-self: flex-start;
  -ms-flex-item-align: start;
  align-self: flex-start;
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  -ms-transition: all 0.3s ease-in-out 0s;
  -o-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
  -webkit-transform-origin: center center;
  -moz-transform-origin: center center;
  -ms-transform-origin: center center;
  -o-transform-origin: center center;
  transform-origin: center center;
  color: #999;
  border: 0 none;
}
button.cartbox__item__remove:hover {
  color: #d50c0d;
}
.cartbox__total {
  margin-top: 20px;
}
.cartbox__total ul {
  padding-left: 0;
  list-style: none;
}
.cartbox__total ul li {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  -webkit-justify-content: space-between;
  -moz-justify-content: space-between;
  justify-content: space-between;
  font-size: 18px;
  font-weight: 400;
  font-style: italic;
  line-height: 1.5;
}
.cartbox__total ul li.shipping-charge span.price:before {
  content: "+";
  font-size: 16px;
  padding-right: 3px;
}
.cartbox__total ul li.grandtotal {
  font-size: 24px;
  color: black;
  margin-top: 7px;
  font-weight: 700;
}
.cartbox__buttons {
  margin-top: 30px;
}
.cartbox__buttons a.cr-btn {
  text-align: center;
  margin-top: 20px;
  display: block;
  height: 50px;
  padding: 4px 30px;
  border-radius: 0;
}
.cartbox__buttons a.cr-btn:before {
  border-radius: 0;
}
.cartbox__item__thumb a img {
  max-width: 100%;
}
.cartbox__buttons a {
  display: block;
  font-family: Open Sans;
  font-weight: 700;
  text-align: center;
  text-transform: uppercase;
}
.cartbox__buttons a+a {
  margin-top: 20px;
}
@media only screen and (min-width: 992px) and (max-width: 1199px) {
  .cartbox {
    width: 400px;
  }
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
  .cartbox {
    width: 350px;
    padding: 15px 25px;
  }
}
@media only screen and (max-width: 767px) {
  .cartbox {
    width: 350px;
    padding: 15px 15px;
  }
}
@media only screen and (max-width: 575px) {
  .cartbox {
    width: calc(100% - 30px);
    padding: 15px 15px;
  }
}
.car-header-title h2 {
  font-size: 20px;
  margin: 0;
  text-transform: uppercase;
}
.product_subtotal {
  font-size: 14px;
  font-weight: bold;
  width: 120px;
  color: #777;
}
.product_name a {
  text-decoration: none;
  font-size: 14px;
  font-weight: 700;
  margin-left: 10px;
  color: black;
}
.product_name {
  text-decoration: none;
  color: black;
  width: 270px;
}
.product_thumbnail {
  width: 130px;
}
.product_remove i {
  color: #919191;
  display: inline-block;
  font-size: 20px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  width: 40px;
}
.product_price .amount {
  font-size: 15px;
  font-weight: 700;
  color: #777;
}
.product_remove i:hover {
  color: #252525;
}
.product_quantity {
  width: 180px;
}
.product_remove {
  width: 150px;
}
.product_price {
  width: 130px;
}
.product_name a:hover {
  color: #d50c0d;
}
.food__btn {
  background: #AB7B3A none repeat scroll 0 0;
  border-radius: 5px;
  color: #fff;
  display: inline-block;
  font-family: "Alegreya", serif;
  font-size: 18px;
  height: 45px;
  line-height: 45px;
  padding: 0 22px;
  text-transform: capitalize;
  position: relative;
  transform: translateZ(0px);
  transition-duration: 0.5s;
}
.food__btn.white--btn {
  background: #fff none repeat scroll 0 0;
  color: #444444;
}
.food__btn.white--btn:hover {
  color: #fff;
}
.food__btn.black--button {
  background: #262626 none repeat scroll 0 0;
  color: #fff !important;
}
.food__btn::before {
  background: #222222 none repeat scroll 0 0;
  bottom: 0;
  content: "";
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform: scaleX(0);
  transform-origin: 0 50% 0;
  transition-duration: 0.5s;
  transition-timing-function: ease-out;
  z-index: -1;
  border-radius: 5px;
}
.food__btn.theme--hover::before {
  background: #d50c0d none repeat scroll 0 0;
}
.food__btn.grey--btn {
  background: #f2f2f2 none repeat scroll 0 0;
  color: #444444;
  font-size: 16px;
  font-weight: 700;
}
.food__btn.grey--btn.mid-height {
  height: 36px;
  line-height: 36px;
  padding: 0 24px;
}
.food__btn.grey--btn:hover {
  color: #fff;
}
.food__btn:active::before,
.food__btn:focus::before,
.food__btn:hover::before {
  transform: scaleX(1);
  transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
}
.food__btn:active,
.food__btn:focus,
.food__btn:hover {
  color: #fff;
}
.food__btn.btn--green {
  background: #60ba62;
}
.fd-btn.food__btn {
  border: 0 none;
  font-family: "Open Sans", sans-serif;
  font-size: 14px;
}
</style>
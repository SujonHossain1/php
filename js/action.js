$( document ).ready(function() {
	getCartItem();
	count_item();
	checkout_cart();
	getcatwiseall();
	$("body").delegate("#product","click",function(event){
		var pid = $(this).attr("pid");
		var cat_data = "#pro_".concat(pid).concat("_cart");
		var cat_data1 = "#pro_cart_".concat(pid).concat("_cart");
		var cat_data_1 = "#pro_1".concat(pid).concat("_cart");
		var cat_data1_1 = "#pro_cart_1".concat(pid).concat("_cart");
		console.log(pid);
		console.log(cat_data1);
		console.log(cat_data1_1);	
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid},
			success : function(data){
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
				alert("Product Added to cart");
				$("#pro_".concat(pid)).css({"display": "none"});
				$(cat_data).css({"display": "block"});
				$("#pro_cart_".concat(pid)).css({"display": "none"});
				$(cat_data1).css({"display": "block"});
				$("#pro_1".concat(pid)).css({"display": "none"});
				$(cat_data_1).css({"display": "block"});
				$("#pro_cart_1".concat(pid)).css({"display": "none"});
				$(cat_data1_1).css({"display": "block"});
			}
		})
	})

	$("body").delegate("#product_plus","click",function(event){
		var pid = $(this).attr("pid");	
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid},
			success : function(data){
				console.log(data);
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})

		$("#login").on("submit",function(event){
			alert("Process Started")
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url	:	"login_process.php",
			method:	"POST",
			data	:$("#login").serialize(),
			success	:function(data){
				if(data == "<span style='color:red;'>Please register before login..!</span>"){
					$("#e_msg").html(data);
					$(".overlay").hide();
				}else{
					window.location.href = "index.php";
				}
				/*if(data == "login_success"){
					
				}else if(data == "cart_login"){
					window.location.href = "cart.php";
				}else{
					
				}*/
			}
		})
	})

	$("body").delegate("#product_minus","click",function(event){
		var pid = $(this).attr("pid");
		
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {minuscart:1,proId:pid},
			success : function(data){
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})



	$("body").delegate("#product_with_quantity","click",function(event){
		var pid = $(this).attr("pid");
		var quantity = $("#qty").val();
		event.preventDefault();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart_qty:1,proId:pid,qty:quantity},
			success : function(data){
				alert("Product Added to Cart.")
				getCartItem();
				count_item();
				checkout_cart();
				/*$('#product_msg').html(data);
				$('.overlay').hide();*/
			}
		})
	})

	$("body").delegate("#product_1","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart_single:1,proId:pid},
			success : function(data){
				alert("Product Added to Cart.")
				getCartItem();
				count_item();
				checkout_cart();
				/*$('#product_msg').html(data);
				$('.overlay').hide();*/
			}
		})
	})


	$("body").delegate("#remove","click",function(event){
		var pid = $(this).attr("prodi");
		event.preventDefault();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {remove:1,proId:pid},
			success : function(data){
				getCartItem();
				count_item();
				checkout_cart();
				/*$('#product_msg').html(data);
				$('.overlay').hide();*/
			}
		})
	})

	$("body").delegate("#remove_cart","click",function(event){
		var pid = $(this).attr("prodi");
		event.preventDefault();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {remove:1,proId:pid},
			success : function(data){
				getCartItem();
				count_item();
				checkout_cart();
				window.location.href = "cart.php";
				/*$('#product_msg').html(data);
				$('.overlay').hide();*/
			}
		})
	})


	function getCartItem(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {getCartItem:1},
			success : function(data){
				$("#cartItem").html(data);
				count_item();
				checkout_cart();
				/*net_total();*/

			}
		})
	}

	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$("#total_count").html(data);
				$("#total_count1").html(data);
				count_total_amount();
			}
		})
	}

	function count_total_amount(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_total_amount:1},
			success : function(data){
				$("#total_cart").html(data);
			}
		})
	}

	function checkout_cart(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {check_cart:1},
			success : function(data){
				$("#check_cart").html(data);
			}
		})
	}
});
function getcatwise(cat_id) {
	var catId = cat_id;

	$.ajax({
		url : "action.php",
		type : "POST",
		data:{
			getcat : 1,
			catId : cat_id
		},
		cache : false,
		success : function(response){
			$("#nav-all").html(response);
		}

	});

	// body...
}

function getcatwiseall() {
	$.ajax({
		url : "action.php",
		type : "POST",
		data:{
			getall : 1,
		},
		cache : false,
		success : function(response){
			$("#nav-all").html(response);
		}

	});

	// body...
}

function signup(){
	var name = $("#f_name").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var repassword = $("#repassword").val();
	var num = $("#number").val();
	var add = $("#address").val();

	if(password!=repassword){
		alert("Password didn't matched");

	}else{
		$.ajax({
			url:"action.php",
			type:"POST",
			data:{
				dosignup : 1,
				name : name,
				email : email,
				password : password,
				num : num,
				add : add
			},
			cache : false,
			success : function(response){
				if(response.includes("exists")){
					alert("Email already in use");
				}else{
					window.location.href="index.php";
				}
			}

		});
	}
}

function logout(){
	$.ajax({
		url:"action.php",
		type:"POST",
		data:{
			logout : 1,
		},
		cache : false,
		success : function(response){
		}

	});
}



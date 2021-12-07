$(document).ready(function(){

	$('.restaurant-link').click(function(e){

		e.preventDefault();

		var list = $(this).next("ul");

		if($(this).hasClass('open')){

			$(this).removeClass('open');

			list.slideUp();

		} else {

			$('.restaurants-list li ul').slideUp();

			$('.restaurant-object a').removeClass('open');

			$(this).addClass('open');

			list.slideDown();

		}
		
	});

});

function modifyNumberItems(especificPart, action) {

	var generalPart = "number-items";

	var id = generalPart.concat(especificPart); 

	var element = document.getElementById(id);

	if((parseInt(element.value) > 1) || (parseInt(element.value) == 1 && action == "add") ){

		if(action == "add"){

			element.value = parseInt(element.value) + 1;

			multiplyQuantity(especificPart, element.value);

		} else {

			element.value = parseInt(element.value) - 1;

			multiplyQuantity(especificPart, element.value);

		}
	}
};

function multiplyQuantity(especificPart, quantity){

	var generalPart = "price-item";

	var id = generalPart.concat(especificPart);

	var element = document.getElementById(id);

	var generalPart2 = "price_by_unit";	

	var id2 =  generalPart2.concat(especificPart);

	var cElement = document.getElementById(id2);

	element.value =  (cElement.value * quantity).toFixed(2);

}
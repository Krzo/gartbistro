/*~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~
	Copyright (c) 2017 Gart Bistro

	gartbistro.at

	VERSION 1.0.0

~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~*/

	function additemtocart(foodid,foodquantity) {
		//Get food id and link to php --> SQL Statement with FoodId --> Shop
		$.ajax({
			data: {foodid: foodid.toString(), foodquantity: foodquantity.parseInt()},
			url: 'get_food.php',
			method: 'POST', // or GET
		});
	}



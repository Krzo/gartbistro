<?php
	define("HOST","mysqlsvr71.world4you.com");
	define("USER","sql7965842");
	define("PASSWORD","ixqgc@9");
	define("DATABASE","4712598db1");

	$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ("database connection failed");
	$columns = array('id', 'food_name','food_price','food_category','food_description');

	
	$query = "SELECT * FROM `food`";

	if(isset($_POST["search"]["value"]))
	{
	 $query .= 'WHERE food_name LIKE "%'.$_POST["search"]["value"].'%" OR food_description LIKE "%'.$_POST["search"]["value"].'%" OR food_category LIKE "%'.$_POST["search"]["value"].'%" OR food_price LIKE "%'.$_POST["search"]["value"].'%"'; 
	}

	if(isset($_POST["order"]))
	{
		$query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'';
	}
	else
	{
		$query .= 'ORDER BY id ASC ';
	}


	$query1 = '';
	
	if($_POST["length"] != -1)
	{
	 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}

	$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

	$result = mysqli_query($connect, $query . $query1);
	$data = array();
	
	while($row = mysqli_fetch_array($result))
	{
	$sub_array = array();
	$sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
	$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="food_name">' . $row["food_name"] . '</div>';
	$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="food_price">' . $row["food_price"] . ' €</div>';
	$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="food_category">' . $row["food_category"] . '</div>';

	$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="food_description">' . $row["food_description"] . '</div>';
	$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" data-id="'.$row["id"].'" id="'.$row["id"].'" >Löschen</button>';
	$data[] = $sub_array;	
	}

	function get_all_data($connect)
	{
	 $query = "SELECT * FROM food";
	 $result = mysqli_query($connect, $query);
	 return mysqli_num_rows($result);
	}

	
	$output = array(
	 "draw"    => intval($_POST["draw"]),
	 "recordsTotal"  =>  get_all_data($connect),
	 "recordsFiltered" => $number_filter_row,
	 "data"    => $data
	);

	echo json_encode($output);

?>
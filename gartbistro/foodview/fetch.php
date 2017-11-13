<?php
	define("HOST","mysqlsvr71.world4you.com");
	define("USER","sql7965842");
	define("PASSWORD","ixqgc@9");
	define("DATABASE","4712598db1");

	$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ("database connection failed");
	$columns = array('id', 'order_date','customer_details','order_details','order_no_of_items', 'order_taxes');

	
	$query = "SELECT * FROM 'gb_orders' ";
    	
    
    if(isset($_POST["search"]["value"]))
	{
	 $query .= 'WHERE order_details LIKE "%'.$_POST["search"]["value"].'%" OR customer_details LIKE "%'.$_POST["search"]["value"].'%"'; 
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
	$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="order_date">' . $row["order_date"] . '</div>';
	$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="customer_details">' . $row["customer_details"] . ' €</div>';
	$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="order_no_of_items">' . $row["order_no_of_items"] . '</div>';
    sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="order_taxes">' . $row["order_taxes"] . '</div>';

	
	$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" data-id="'.$row["id"].'" id="'.$row["id"].'" >Löschen</button>';
	$data[] = $sub_array;	
	}

	function get_all_data($connect)
	{
	 $query = "SELECT * FROM gb_orders'";
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
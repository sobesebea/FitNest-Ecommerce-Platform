<?php
//connect to database class
require("../settings/db_class.php");

class Order extends db_connection
{
	public function add_Order($order_id,$customer_id, $invoice_no, $order_date, $order_status)
    {
        $database = new db_connection();
        
        // Escape and sanitize input data
        $order_id = mysqli_real_escape_string($database->db_conn(), $order_id);
        $customer_id = mysqli_real_escape_string($database->db_conn(), $customer_id,);
        $invoice_no = mysqli_real_escape_string($database->db_conn(), $invoice_no);
		$order_date = mysqli_real_escape_string($database->db_conn(), $order_date);
        $order_status = mysqli_real_escape_string($database->db_conn(), $order_status);

        
        $sql = "INSERT INTO orders (order_id, customer_id, invoice_no, order_date, order_status) VALUES ('$order_id', '$customer_id', '$invoice_no', '$order_date', '$order_status')";
        return $this->db_query($sql);
        
        if ($nd->db_query($sql)){
        $insert_id = $ndb->get_insert_id();
        if($insert_id > 0){
            return $insert_id;
        }else{
            error_log("Error: insert ID is Zero- check DB connection persistence");
    }
        
    }else{
        return false;
    }

}
}



?>


?>



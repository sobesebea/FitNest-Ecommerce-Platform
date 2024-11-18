<?php
include_once ('../classes/order.php'); 

// This is Controller to add a brand
function addOrderController($customer_id, $invoice, $order_date, $status) {
    $order = new Order(); 
    return $order->addOrder($customer_id, $invoice, $order_date, $status); 
}


function addorderDetailsController($order_id, $product_id, $quantity) {
    $order = new Order(); 
    return $order->add_orderDetails($order_id, $product_id, $quantity); 
}
?>
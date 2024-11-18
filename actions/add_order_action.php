<?php
require("../controllers/order_controller.php");

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $customerId = $_SESSION['user_id'];
    $invoice =rand(1000000, 9999999);
    $order_date= date('Y-m-d');
    $status= 'pending';

    

    $addingOrder= addOrder_controller($customerId,$invoice,$order_date,$status);
        if ($addingOrder !== false){
            header("Location: ../view/checkout.php");
        }
        else{
            echo "Form not submitted";
        }
    }

?>
<?php
session_start();
include("includes/db.php");

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Retrieve order information
    $customer_session = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];

    // Mark the order as "Pending" for pay-on-delivery
    $order_status = "Pay on Delivery";
    $update_order = "UPDATE customer_order SET order_status='$order_status' WHERE order_id='$order_id'";
    $run_update = mysqli_query($con, $update_order);

    if ($run_update) {
        echo "<script>alert('Your order has been placed. Please pay on delivery.');</script>";
        echo "<script>window.open('my_account.php?order','_self');</script>";
    } else {
        echo "<script>alert('There was an error processing your order. Please try again.');</script>";
        echo "<script>window.open('cart.php','_self');</script>";
    }
} else {
    echo "<script>alert('No order ID provided.');</script>";
    echo "<script>window.open('cart.php','_self');</script>";
}

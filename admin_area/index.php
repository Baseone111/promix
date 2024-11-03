<?php
session_start();
include ("includes/db.php");

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

    $admin_session = $_SESSION['admin_email'];
    $get_admin = "SELECT * FROM admins WHERE admin_email='$admin_session'";
    $run_admin = mysqli_query($con, $get_admin);
    $row_admin = mysqli_fetch_array($run_admin);

    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_email = $row_admin['admin_email'];
    $admin_image = $row_admin['admin_image'];
    $admin_country = $row_admin['admin_country'];
    $admin_job = $row_admin['admin_job']; // Role column
    $admin_contact = $row_admin['admin_contact'];
    $admin_about = $row_admin['admin_about'];

    // Store the role in the session
    $_SESSION['role'] = $admin_job;

    $get_pro = "SELECT * FROM products";
    $run_pro = mysqli_query($con, $get_pro);
    $count_pro = mysqli_num_rows($run_pro);

    $get_cust = "SELECT * FROM customers";
    $run_cust = mysqli_query($con, $get_cust);
    $count_cust = mysqli_num_rows($run_cust);

    $get_p_cat = "SELECT * FROM product_categories";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $count_p_cat = mysqli_num_rows($run_p_cat);

    $get_order = "SELECT * FROM customer_order";
    $run_order = mysqli_query($con, $get_order);
    $count_order = mysqli_num_rows($run_order);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div id="wrapper">
        <?php include 'includes/sidebar.php'; ?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Navigation Links -->
                <ul class="nav nav-pills">
                    <li><a href="?dashboard">Dashboard</a></li>
                    <li><a href="?view_product">View Products</a></li>
                    <li><a href="?insert_product">Insert Product</a></li>
                    <li><a href="?view_product_cat">View Product Categories</a></li>
                    <li><a href="?insert_product_cat">Insert Product Category</a></li>
                    <li><a href="?view_categories">View Categories</a></li>
                    <li><a href="?insert_categories">Insert Category</a></li>
                    <li><a href="?view_slider">View Slider</a></li>
                    <li><a href="?insert_slider">Insert Slider</a></li>
                    <li><a href="?view_customer">View Customers</a></li>
                    <li><a href="?view_order">View Orders</a></li>
                    <li><a href="?view_payments">View Payments</a></li>

                    <?php if ($_SESSION['role'] == 'admin') : ?>
                        <!-- Only display these options for admins -->
                        <li><a href="?insert_user">Insert Employee</a></li>
                        <li><a href="?view_user">View Employee</a></li>
                        <li><a href="?user_profile">User Profile</a></li>
                    <?php endif; ?>
                </ul>

                <?php
                // Load pages based on GET requests
                if (isset($_GET['dashboard'])) {
                    include 'dashboard.php';
                }

                if (isset($_GET['insert_product'])) {
                    include 'insert_product.php';
                }

                if (isset($_GET['view_product'])) {
                    include 'view_product.php';
                }

                if (isset($_GET['delete_product'])) {
                    include 'delete_product.php';
                }

                if (isset($_GET['edit_product'])) {
                    include 'edit_product.php';
                }

                if (isset($_GET['insert_product_cat'])) {
                    include 'insert_p_cat.php';
                }

                if (isset($_GET['view_product_cat'])) {
                    include 'view_p_cat.php';
                }

                if (isset($_GET['delete_p_cat'])) {
                    include 'delete_p_cat.php';
                }

                if (isset($_GET['edit_p_cat'])) {
                    include 'edit_p_cat.php';
                }

                if (isset($_GET['insert_categories'])) {
                    include 'insert_cat.php';
                }

                if (isset($_GET['view_categories'])) {
                    include 'view_cat.php';
                }

                if (isset($_GET['delete_cat'])) {
                    include 'delete_cat.php';
                }

                if (isset($_GET['edit_cat'])) {
                    include 'edit_cat.php';
                }

                if (isset($_GET['insert_slider'])) {
                    include 'insert_slider.php';
                }

                if (isset($_GET['view_slider'])) {
                    include 'view_slider.php';
                }

                if (isset($_GET['delete_slide'])) {
                    include 'delete_slider.php';
                }

                if (isset($_GET['edit_slide'])) {
                    include 'edit_slider.php';
                }

                if (isset($_GET['view_customer'])) {
                    include 'view_customer.php';
                }

                if (isset($_GET['customer_delete'])) {
                    include 'customer_delete.php';
                }

                if (isset($_GET['view_order'])) {
                    include 'view_order.php';
                }

                if (isset($_GET['order_delete'])) {
                    include 'order_delete.php';
                }

                if (isset($_GET['view_payments'])) {
                    include 'view_payments.php';
                }

                if (isset($_GET['payment_delete'])) {
                    include 'payment_delete.php';
                }

                // Load restricted content only for admins
                if ($_SESSION['role'] == 'admin') {
                    if (isset($_GET['insert_user'])) {
                        include 'insert_user.php';
                    }

                    if (isset($_GET['view_user'])) {
                        include 'view_user.php';
                    }

                    if (isset($_GET['user_profile'])) {
                        include 'user_profile.php';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>

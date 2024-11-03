<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Slide
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Insert Slide
                </h3>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slide Name:</label>
                        <div class="col-md-6">
                            <input type="text" name="slider_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Slide Image:</label>
                        <div class="col-md-6">
                            <input type="file" name="slider_image" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {

    $slider_name = $_POST['slider_name'];
    $slider_image = $_FILES['slider_image']['name'];
    $temp_name = $_FILES['slider_image']['tmp_name'];

    // Fetch the current number of slides
    $view_slides = "SELECT * FROM slider";
    $view_run_slides = mysqli_query($con, $view_slides);
    $count = mysqli_num_rows($view_run_slides);

    if ($count < 4) {
        // Move the uploaded image to the slider_images directory
        move_uploaded_file($temp_name, "slider_images/$slider_image");

        // Insert the new slide into the slider table
        $insert_slide = "INSERT INTO slider (slider_name, slider_image) VALUES ('$slider_name', '$slider_image')";
        $run_slide = mysqli_query($con, $insert_slide);

        if ($run_slide) {
            echo "<script>alert('New Slide Has Been Inserted')</script>";
            echo "<script>window.open('index.php?view_slider', '_self')</script>";
        } else {
            echo "<script>alert('Error inserting slide')</script>";
        }
    } else {
        echo "<script>alert('You have already inserted 4 slides')</script>";
    }
}

?>

<?php } ?>

 <div id="footer"> <!--footer start--->
 	<div class="container">
 		<div class="row">
 			<div class="col-md-3 col-sm-6">
 				<h4>
 					Pages

 				</h4>

 				<ul>
 					<li>
 						<a href="../cart.php">Shopping Cart</a>
 					</li>
 					<li>
 						<a href="../contact.php">Contact Us</a>
 					</li>
 					<li>
 						<a href="../shop.php">Shop</a>
 					</li>
 					<li>
 						<a href="my_account.php">My Account</a>
 					</li>

 				</ul>
                  <h4> User Section</h4>
                  <ul>
 					<li>
 						<a href="../chectout.php">Login</a>
 					</li>
 					<li>
 						<a href="../customer_registration.php">Register  </a>
 					</li>
 					

 				</ul>

 				<hr class="hidden-md hidden-lg hidden-sm">

 			</div><!----col-3 end-->

 			<div class="col-sm-3 col-sm-6"> <!---col-3 start-->
 				<h4>Top Product Categories
 				</h4>

 				<ul>
                   
                    <?php
                   $get_p_cats="select * from  product_categories";
                   $run_p_cats=mysqli_query($con,$get_p_cats);
                   while($row_p_cat=mysqli_fetch_array($run_p_cats))
                   {
                   	$p_cat_id=$row_p_cat['p_cat_id'];
                   	$p_cat_title=$row_p_cat['p_cat_title'];

                    echo "<li>
                    <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title</a>
                    <li>";  
                   }
                   ?>




 					<!-- <li><a href="#">Jaket</a></li>
 					<li><a href="#">Accessories</a></li>
 					<li><a href="#">Shoes</a></li>
 					<li><a href="#">Coats</a></li>
 					<li><a href="#">T-Shirts</a></li> -->
 				</ul>
                <hr class="hidden-md hidden-lg">
 			</div> <!---col-3 end-->

 			<div class="col-md-3 col-sm-6">
 		<h4>Where to find us</h4>

 		<p>
 			<strong>www.test.com</strong>
 			<br>BaseOne
 			<br>Developers
 			<br>Jinja
 			<br>Uganda
 			<br>baseonedevelopers@gmail.com
 			<br>+256-770463159

 		</p>
 		<a href="contact.php">Go to contant us page</a>
        <hr class="hidden-md hidden-lg">

 			</div><!-----end col-3---->

 			<div class="col-md-3 col-sm-6"><!----start col-3--->
 				<h4>Get the news</h4
 					>
 					<p class="text-muted">
 						subscribe here for getting news of iscrlan ayodhya
 						
 					</p>
 			<form action="" method="post">
 				<div class="input-group">
 					<input type="text" name="email" class="form-control">
 					<span class="input-group-btn">
 						<input type="submit" class="btn btn-default" value="subscribe">

 					</span>
 					
 				</div>

 			</form>
 			<hr>
 			<h4> Stay In Touch</h4>
 			<p class="social">
 				<a href="#"><i class="fa fa-facebook"></i></a>
 				<a href="#"><i class="fa fa-twitter"></i></a>
 				<a href="#"><i class="fa fa-instagram"></i></a>
 				<a href="#"><i class="fa fa-google-plus"></i></a>
 				<a href="#"><i class="fa fa-envelope"></i></a>
 				
 			</p>


 			</div><!----end col-3--->
 			

 		</div>
 		

 	</div>
 	

 </div><!------footer end-->

 <div id="copyright">  <!--cpy right section start-->
 	<div class="container">
 		
 			
 			<div class="col-md-6">
 				<p class="pull-left">&copy; 2020 Saiful Islam

 				</p>
 			</div>
 				<div class="col-md-6">
 					<p class="pull-right">

 						Template by: <a href="#">www.saiful.com</a>

 					</p>
 					
 				</div>
 				
 			
 		
 		
 	</div>

 </div> <!--copyright section end--->
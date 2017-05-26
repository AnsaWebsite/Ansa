<!DOCTYPE html>
<?php
include_once "../helper/connect.php";

?>
<html lang="en">
<head>

	<title>Ansa</title>

  	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
  	<meta name="description" content="">

	<!-- stylesheets css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

  	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

  	<link rel="stylesheet" href="css/nivo-lightbox.css">
  	<link rel="stylesheet" href="css/nivo_themes/default/default.css">

  	<link rel="stylesheet" href="css/hover-min.css">
  	<link rel="stylesheet" href="css/flexslider.css">

	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Handlee|Limelight" rel="stylesheet">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- Preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Home section -->
<section id="home" class="parallax-section">
  <div class="gradient-overlay"></div>
    <div class="container">
      <div class="row">

          <div class="col-md-offset-2 col-md-8 col-sm-12">
              <h1 class="wow fadeInUp" data-wow-delay="0.6s"style="font-family: 'Handlee', cursive;
font-family: 'Limelight', cursive;font-size: 100px;">ANSA</h1>
              <p class="wow fadeInUp" data-wow-delay="1.0s">Presenting small and yummy Gujarati snacks to make every section of yur tongue feel yummmmm....!!  .</p>
              <a href="user_menu.php" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll" data-wow-delay="1.3s"style="font-family: 'Handlee', cursive;font-weight:600">Order Online</a>
          </div>

      </div>
    </div>
</section>


<!-- Navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">

    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand" style="font-family: 'Handlee', cursive;
font-family: 'Limelight', cursive;">ANSA</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#top" class="smoothScroll">Home</a></li>
          <li><a href="#feature" class="smoothScroll">About</a></li>
        <li><a href="#menu" class="smoothScroll">Menu</a></li>
        <li><a href="user_menu.php" class="smoothScroll">Order Online</a></li>
        <li><a href="#contact" class="smoothScroll">Contact</a></li>
          <li><a href="#cart"><span class="glyphicon glyphicon-shopping-cart"></span> </a></li>
      </ul>
    </div>

  </div>
</div>


<!--About section-->
<section id="feature" class="parallax-section">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
        <div class="wow fadeInUp section-title" data-wow-delay="0.6s">
          <h2>ABOUT US</h2>

        </div>
      </div>

      <div class="clearfix"></div>

      <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="feature-thumb">
          <div class="feature-icon">
            <span><i class="fa fa-coffee"></i></span>
          </div>
          <h3>MASALA TEA</h3>
          <p>We serve the incredible masala tea with the real taste of Gujarat. Keep yourself refreshing for the day ahead.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
        <div class="feature-thumb">
          <div class="feature-icon">
            <span><i class="fa fa-cutlery"></i></span>
          </div>
          <h3>WELCOME</h3>
          <p>We welcome you to the delicious taste of traditional Gujarati snacks. Hope to look forward in near future.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
        <div class="feature-thumb">
          <div class="feature-icon">
            <span><i class="fa fa-cutlery"></i></span>
          </div>
          <h3>SNACKS</h3>
          <p>We are ready with the gujarati Farsan to give your tea coffee a good company and complementary taste</p>
        </div>
      </div>

    </div>
  </div>
</section>


<!--Menu section -->
<section id="menu" class="parallax-section ">
    <div class="container">
        <div class="row" style="margin-top: -20px;">

            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <h2>Food Menu</h2>
                </div>
            </div>



            <?php
            $query = "SELECT * FROM menu ORDER BY id ASC";
            $result = mysqli_query($connect,$query);
            $i=1;
            while(($row = mysqli_fetch_array($result)) &&( $i<=6)) {
                $i++;

                ?>

                <div class="col-md-6 col-sm-12">
                    <div class="well well-sm">
                    <div class="media wow fadeInUp" data-wow-delay="0.6s">
                        <div class="media-object pull-left">
                            <img src="<?php echo $row["image"]; ?>" class="img-responsive"  alt="Food Menu"/>
                            <!-- <span class="menu-price"><?php echo $row["price"]; ?></span>-->
                        </div>
                        <div class="media-body" style="margin-top: 20px;">
                            <h3 class="media-heading" style="margin-top: 20px;"><?php echo strtoupper($row["dish_name"]); ?> <span style="float:right"   class="menu-price">&#8377;<?php echo $row["price"]; ?></span></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et.</p>
                        </div>
                    </div>
                </div>
                </div>

                <?php
            }
            ?>


            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <a href="user_menu.php" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll" data-wow-delay="1.3s" style="margin-bottom: -80px;">For More..</a>
                </div>
            </div>



        </div>

    </div>
    </div>
</section>


<!--Contact section -->
<section id="contact" class="parallax-section">
  <div class="overlay"></div>
	<div class="container">
		<div class="row">

            <div class="col-md-6">

            </div>
            <div class="col-md-6">
			<!--<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10"-->
            <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                <h2>Say hello</h2>
                <h4>we are always ready to serve you!</h4>
            </div>
				<div class="contact-form wow fadeInUp" data-wow-delay="0.7s">
					<form id="contact-form" method="post" action="#">
						<input name="name" type="text" class="form-control" placeholder="Your Name" required>
						<input name="email" type="email" class="form-control" placeholder="Your Email" required>
						<textarea name="message" class="form-control" placeholder="Message" rows="5" required></textarea>
						<input type="submit" class="form-control submit" value="SEND MESSAGE">
					</form>
				</div>
			</div>
            </div>

		</div>
	</div>
</section>

<!-- Footer section -->
<footer>
	<div class="container">
		<div class="row">

              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.3s">
                <h3>About the owner</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod 
                	tincidunt ut laoreet. Dolore magna aliquam erat volutpat ipsum.</p>
              </div>  
        
              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.6s">
                <h3>Contact Detail</h3>
                <p>123 Delicious Street, San Francisco, CA 10110</p>
                <p>010-020-0780</p>
                <p>hello@company.com</p>
              </div> 
        
              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.9s">
                <h3>Opening Hours</h3>
                <strong>Monday - Firday</strong>
                <p>11:00 AM - 10:00 PM</p>
                <strong>Saturday - Sunday</strong>
                <p>10:00 AM - 09:00 PM</p>
              </div> 

		</div>
	</div>
</footer>

<!-- Copyright section -->
<section id="copyright">
  <div class="container">
    <div class="row">

      <div class="col-md-8 col-sm-8 col-xs-8">
        <p>Copyright © 2017<a class="designed-by" href="https://github.com/AnsaWebsite/Ansa" target="_blank"> IIITV Students</a></p>
      </div>  

      <div class="col-md-4 col-sm-4 text-right">
        <a href="#home" class="fa fa-angle-up smoothScroll gototop"></a>
      </div>

    </div>
  </div>
</section>

<!-- javscript js -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.backstretch.min.js"></script>

<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>

<script src="js/jquery.flexslider-min.js"></script>

<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>

<script src="js/custom.js"></script>

</body>
</html>

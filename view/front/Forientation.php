<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Courses | Lincoln High School</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div id="site-content">
			<header class="site-header">
				<div class="primary-header">
					<div class="container">
						<a href="index.html" id="branding">
							<img src="images/logo.png" alt="Lincoln high School">
							<h1 class="site-title">Lincoln High School</h1>
						</a> <!-- #branding -->
						
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item"><a href="index.html">Home</a></li>
								<li class="menu-item current-menu-item"><a href="course.html">Courses</a></li>
								<li class="menu-item"><a href="student.html">Students</a></li>
								<li class="menu-item"><a href="event.html">Events</a></li>
								<li class="menu-item"><a href="contact.html">Contact</a></li>
							</ul> <!-- .menu -->
						</div> <!-- .main-navigation -->

						<div class="mobile-navigation"></div>
					</div> <!-- .container -->
				</div> <!-- .primary-header -->

				<div class="page-title">
					<div class="container">
						<h2>Contact Us</h2>
					</div>
				</div>
			</header>
		</div>

		<main class="main-content">
		</div>
	</div>
			

	<div class="fullwidth-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="boxed-section request-form">
                    <h2 class="section-title text-center">Request orientation</h2>
                    <form method="POST" action="verfication.php">
                        <div class="field">
                            <label for="nom_e">Your name:</label>
                            <div class="control"><input type="text" id="nom_e" name="nom_e" placeholder="Name"></div>
                        </div>
                        <div class="field">
                            <label for="date_reservation">Date d'orientation:</label>
                            <div class="control"><input type="date" id="date_reservation" name="date_reservation" required><br><br></div>
                        </div>
                        <div class="field">
                            <label for="horaire_rdv">Horaire d'orientation:</label>
                            <div class="control"><input type="time" id="horaire_rdv" name="horaire_rdv" required><br><br></div>
                        </div>
                        <div class="field">
                            <label for="type">Etat:</label>
                            <div class="control">
                                <select name="type" id="Etat" required>
                                    <option value="other">Other</option>
                                    <option value="Confirmer">Confirmer</option>
                                    <option value="En attente">En attente</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" id="id" name="id" value="">
                        <input type="hidden" id="nom_m" name="nom_m" value="">
                        <input type="hidden" id="prix" name="prix" value="">
                        <input type="hidden" id="num_salle" name="num_salle" value="">

                        <div class="field no-label">
                            <div class="control">
                                <button type="submit" class="btn btn-primary">Confirmer</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- .boxed-section .request-form -->
            </div>
        </div>
    </div>
</div>

						<div class="col-md-6">
							<div class="contact-info">
								<address>
									<strong>Address</strong>
									<p>Company Name INC. <br>290-2912 Oits Ave <br>Bronx, NY 10465</p>
								</address>
								<div class="contact">
									<strong>Contact</strong>
									<p>
										<a href="tel:532930098891">(532) 930 098 891</a>
										<a href="mailto:office@companyname.com">office@companyname.com</a> <br>
														
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .fullwidth-block -->
		</main>

		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Contact us</h3>
							<address>Lincoln High School <br>745 Jewel Ave Street <br>Fress Meadows, NY 1136</address>

							<a href="mailto:info@lincolnhighschool.com">info@lincolnhighschool.com</a> <br>
							<a href="tel:48942652394324">(489) 42652394324</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Social media</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="social-links circle">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Featured students</h3>
							<ul class="student-list">
								<li><a href="#">
										<img src="dummy/student-sm-1.jpg" alt="" class="avatar">
										<span class="fn">Sarah Branson</span>
										<span class="average">Average: 4,9</span>
									</a></li>
								<li><a href="#">
										<img src="dummy/student-sm-2.jpg" alt="" class="avatar">
										<span class="fn">Dorothy Smith</span>
										<span class="average">Average: 4,9</span>
									</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Newsletter</h3>
							<p>Aspernatur, rerum. Impedit, deleniti suscipit</p>
							<form action="#" class="subscribe">
								<input type="email" placeholder="Email Address...">
								<input type="submit" class="light" value="Subscribe">
							</form>
						</div>
					</div>
				</div>

				<div class="copy">Copyright 2014 Lincoln High School. All rights reserved.</div>
			</div>

		</footer>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>
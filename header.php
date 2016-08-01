
 <!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->
 
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmgp.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
		<?php wp_head(); ?>
</head>
<body>
	<!--navigation here-->
	<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand page-scroll" href="#page-top"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="" /></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					                                                                          
					<li>
						<a class="page-scroll" href="#page-top">Home</a>
					</li>
					<li class="dropdown">
						<a class="page-scroll" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"  href="#gallery">Service&Pricing<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#">season 2007/08</a><hr></li>
							<li><a href="#">season 2007/08</a><hr></li>
							<li><a href="#">season 2007/08</a><hr></li>
							<li><a href="#">season 2007/08</a></li>
						</ul>
					</li>
					<li>
						<a class="page-scroll" href="#team">Meet the team</a>
					</li>
					<li class="dropdown">
						<a class="page-scroll" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"  href="#gallery">Gallery<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#">season 2007/08</a><hr></li>
							<li><a href="#">season 2007/08</a><hr></li>
							<li><a href="#">season 2007/08</a><hr></li>
							<li><a href="#">season 2007/08</a></li>
						</ul>
					</li>
					<li>
						<a class="page-scroll" href="#news">news</a>
					</li>
					<li>
						<a class="page-scroll" href="#contact">Contact Us </a>
					</li>
					<li class="make-apoint">
						<a class="page-scroll" href="#apointment">make an apointment</a>
					</li>
				</ul>
			</div>
		<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
    </nav>
    <!--end of navigation-->
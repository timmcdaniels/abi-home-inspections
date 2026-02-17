<!DOCTYPE html>
<html data-theme="light" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ledger&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
	<!-- Navigation -->
	<nav class="navbar" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item" href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/abi-logo-white.png" alt="ABI Home Inspections Logo" class="logo"></a>
			<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="main-menu">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>	
		</div>  
		<div id="main-menu" class="navbar-menu">
			<div class="navbar-start"></div>  
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'container' => 'div',
						'container_class' => 'navbar-start',
						'items_wrap' => '%3$s',
						'walker' => new ABI_Menu_Walker(),
					)
				);
			?>
			<div class="navbar-start"></div>		  
			<div class="navbar-end">
				<a class="navbar-item phone-link" href="tel:<?php the_field( 'phone_number', 'option' ); ?>">
					<span class="icon is-small"><i class="fas fa-phone"></i></span>
					<?php echo abi_format_phone( get_field( 'phone_number', 'option' ) ); ?>
				</a>		
				<div class="navbar-item">
					<div class="buttons">
						<a class="button navbar-cta" href="<?php echo get_field( 'header_button', 'option' )['url']; ?>"><strong><?php echo get_field( 'header_button', 'option' )['label']; ?></strong></a>
					</div>
				</div>
			</div>
		</div>  
	</nav>
	<main role="main">

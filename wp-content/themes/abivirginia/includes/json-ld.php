<?php

add_action( 'wp_head', 'abi_json_ld_head' );
function abi_json_ld_head() {
	if ( is_front_page() || is_page( 'contact' ) ) {
		$services = get_field( 'services', 'option' );
		$pages = get_posts( array(
			'post_type' => 'page',
			'title' => 'Service Locations',
			'numberposts' => 1
		));
		$locations_page_id = 0;
		$locations = array();
		if ( ! empty($pages) ) {
			$locations_page_id = $pages[0]->ID;
			$args = array(
				'child_of' => $locations_page_id,
				'sort_column' => 'post_title',
				'sort_order' => 'ASC'
			);
			$locations = get_pages( $args );
			abi_json_ld( $services, $locations );
		}
	}
}

function abi_json_ld( $services = array(), $locations = array() ) {
	$services_json = abi_services_json( $services );
	$locations_json = abi_locations_json( $locations ); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HomeAndConstructionBusiness",
  "name": "<?php echo get_bloginfo( 'name' ); ?>",
  "url": "<?php echo get_bloginfo( 'url' ); ?>",
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Home Inspection Services",
    "itemListElement": [
	<?php if ( $services_json ): ?>
		<?php echo $services_json; ?>
	<?php endif; ?>
    ]
  },
  "areaServed": [
	<?php if ( $locations_json ): ?>
        <?php echo $locations_json; ?>
    <?php endif; ?>
  ]
}
</script><?php
}

function abi_services_json( $services ) {
	$tmp = array();
	foreach ( $services as $service ) {
		$tmp[] = '
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "' . htmlspecialchars( $service['service']['label'] ) . '",
          "description": "' . htmlspecialchars( $service['service']['description'] ) . '",
          "serviceOutput": "Certified ' . htmlspecialchars( $service['service']['label'] ) . ' Report"
        }
      }';
	}
	return implode( ',', $tmp );
}

function abi_locations_json( $locations ) {
    $tmp = array();
	$areas = array( 'The Northern Neck', 'The Middle Peninsula', 'Northern Virginia' );
    foreach ( $locations as $loc ) {
		$location = get_the_title( $loc->ID );
		if ( ! in_array( $location, $areas ) ) {
			$tmp[] = '{ "@type": "City", "name": "' . htmlspecialchars( $location ) . '" }';
		}
		else {
			$tmp[] = '{ "@type": "AdministrativeArea", "name": "' . htmlspecialchars( $location ) . '" }';
		}
	}
	return implode( ',', $tmp );
}

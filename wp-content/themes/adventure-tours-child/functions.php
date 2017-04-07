<?php



function custom_set_quantity_expand_attribute( $di, $config ) {
	$di['booking_form']->setConfig( array(
		'expand_quantity_attribute' => 'pa_adult',
		'expand_quantity_attribute' => 'pa_ticket-type',
	) );
}

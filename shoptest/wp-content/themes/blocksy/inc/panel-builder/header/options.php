<?php

$options = [

	'headerBackground' => [
		'label' => __( 'Header Background', 'blocksy' ),
		'type' => 'ct-background',
		'design' => 'inline',
		'setting' => [ 'transport' => 'postMessage' ],
		'value' => blocksy_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => '#ffffff'
				],
			],
		]),
		'desc' => __( 'Please note, you can also change the background color for each row individually.', 'blocksy' ),
	],

];

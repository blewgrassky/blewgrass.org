<?php

blocksy_output_background_css([
	'selector' => '#header',
	'css' => $css,
	'value' => blocksy_akg(
		'headerBackground',
		$atts,
		blocksy_background_default_value([
			'backgroundColor' => [
				'default' => [
					'color' => '#ffffff'
				],
			],
		])
	)
]);


<?php

if (! isset($prefix)) {
	$prefix = '';
} else {
	$prefix = $prefix . '_';
}

$options = [
	$prefix . 'has_comments' => [
		'label' => __( 'Comments', 'blocksy' ),
		'type' => 'ct-panel',
		'switch' => true,
		'value' => 'yes',
		'setting' => [ 'transport' => 'postMessage' ],
		'inner-options' => [

			blocksy_rand_md5() => [
				'title' => __( 'General', 'blocksy' ),
				'type' => 'tab',
				'options' => [

					$prefix . 'comments_structure' => [
						'label' => __( 'Container Structure', 'blocksy' ),
						'type' => 'ct-radio',
						'value' => 'narrow',
						'view' => 'text',
						'design' => 'block',
						'setting' => [ 'transport' => 'postMessage' ],
						'choices' => [
							'narrow' => __( 'Narrow', 'blocksy' ),
							'normal' => __( 'Normal', 'blocksy' ),
						],
					],

					blocksy_rand_md5() => [
						'type' => 'ct-condition',
						'condition' => [ $prefix . 'comments_structure' => 'narrow' ],
						'options' => [
							$prefix . 'commentsNarrowWidth' => [
								'label' => __( 'Container Max Width', 'blocksy' ),
								'type' => 'ct-slider',
								'value' => 750,
								'min' => 500,
								'max' => 800,
								'setting' => [ 'transport' => 'postMessage' ],
							],
						],
					],
				],
			],

			blocksy_rand_md5() => [
				'title' => __( 'Design', 'blocksy' ),
				'type' => 'tab',
				'options' => [
					$prefix . 'commentsFontColor' => [
						'label' => __( 'Font Color', 'blocksy' ),
						'type'  => 'ct-color-picker',
						'design' => 'inline',
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => [
							'default' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],

							'hover' => [
								'color' => Blocksy_Css_Injector::get_skip_rule_keyword('DEFAULT'),
							],
						],

						'pickers' => [
							[
								'title' => __( 'Initial', 'blocksy' ),
								'id' => 'default',
								'inherit' => 'var(--color)'
							],

							[
								'title' => __( 'Hover', 'blocksy' ),
								'id' => 'hover',
								'inherit' => 'var(--colorHover)'
							],
						],
					],

					$prefix . 'comments_background' => [
						'label' => __( 'Container Background', 'blocksy' ),
						'type' => 'ct-background',
						'design' => 'inline',
						'divider' => 'top',
						'setting' => [ 'transport' => 'postMessage' ],
						'value' => blocksy_background_default_value([
							'backgroundColor' => [
								'default' => [
									'color' => '#f8f9fb',
								],
							],
						])
					],
				],
			],
		],
	],
];

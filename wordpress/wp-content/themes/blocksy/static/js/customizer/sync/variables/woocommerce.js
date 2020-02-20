export const getWooVariablesFor = () => ({
	// Woocommerce archive
	shopCardsGap: {
		selector: '.shop-entries',
		variable: 'cardsGap',
		responsive: true,
		unit: 'px'
	},

	productGalleryWidth: {
		selector: '.product-entry-wrapper',
		variable: 'productGalleryWidth',
		unit: '%'
	},

	cardProductTitleColor: [
		{
			selector: '.woocommerce-loop-product__title',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '.woocommerce-loop-product__title',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	cardProductCategoriesColor: [
		{
			selector: 'article .product-categories',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: 'article .product-categories',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	cardProductPriceColor: {
		selector: '.shop-entry-card .price',
		variable: 'color',
		type: 'color'
	},

	cardStarRatingColor: {
		selector: '.shop-entry-card',
		variable: 'starRatingColor',
		type: 'color'
	},

	saleBadgeColor: [
		{
			selector: '.shop-entry-card',
			variable: 'saleBadgeTextColor',
			type: 'color:text'
		},

		{
			selector: '.shop-entry-card',
			variable: 'saleBadgeBackgroundColor',
			type: 'color:background'
		}
	],

	cardProductImageOverlay: {
		selector: '.shop-entry-card',
		variable: 'imageOverlay',
		type: 'color'
	},

	cardProductAction1Color: [
		{
			selector: '[data-layout="grid"] .woo-card-actions',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '[data-layout="grid"] .woo-card-actions',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	cardProductAction2Color: [
		{
			selector: '[data-layout="shop-simple"] .woo-card-actions',
			variable: 'buttonInitialColor',
			type: 'color:default'
		},

		{
			selector: '[data-layout="shop-simple"] .woo-card-actions',
			variable: 'buttonHoverColor',
			type: 'color:hover'
		}
	],

	cardProductBackground: {
		selector: '.shop-entry-card',
		variable: 'backgroundColor',
		type: 'color'
	},

	cardProductRadius: {
		selector: '.shop-entry-card',
		type: 'spacing',
		variable: 'borderRadius',
		responsive: true
	},

	cardProductShadow: {
		selector: '.shop-entry-card',
		type: 'box-shadow',
		variable: 'boxShadow',
		responsive: true
	},

	// Woocommerce single
	singleProductTitleColor: {
		selector: '.entry-summary .product_title',
		variable: 'color',
		type: 'color'
	},

	singleProductPriceColor: {
		selector: '.entry-summary .price',
		variable: 'color',
		type: 'color'
	},

	singleSaleBadgeColor: [
		{
			selector: '.product > span.onsale',
			variable: 'saleBadgeTextColor',
			type: 'color:text'
		},

		{
			selector: '.product > span.onsale',
			variable: 'saleBadgeBackgroundColor',
			type: 'color:background'
		}
	],

	singleStarRatingColor: {
		selector: '.entry-summary,.woocommerce-tabs',
		variable: 'starRatingColor',
		type: 'color'
	},

	productContentBoxedShadow: {
		selector: '.product[data-structure*="boxed"]',
		type: 'box-shadow',
		variable: 'boxShadow',
		responsive: true
	},

	productContentBoxedSpacing: {
		selector: '.product[data-structure*="boxed"]',
		variable: 'contentBoxedSpacing',
		responsive: true,
		unit: ''
	},

	// Store notice
	wooNoticeContent: {
		selector: '.demo_store',
		variable: 'color',
		type: 'color'
	},

	wooNoticeBackground: {
		selector: '.demo_store',
		variable: 'backgroundColor',
		type: 'color'
	},

	// To top button
	topButtonOffset: {
		selector: '.ct-back-to-top',
		variable: 'bottom',
		responsive: true,
		unit: 'px'
	}
})

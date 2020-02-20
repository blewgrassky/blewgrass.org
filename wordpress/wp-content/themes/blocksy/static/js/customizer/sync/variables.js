import { getHeroVariables } from './hero-section'
import { getPostListingVariables } from './template-parts/content-loop'
import { getTypographyVariablesFor } from './variables/typography'
import { getBackgroundVariablesFor } from './variables/background'
import { getWooVariablesFor } from './variables/woocommerce'
import { getFormsVariablesFor } from './variables/forms'
import { getPaginationVariables } from './pagination'
import { getCommentsVariables } from './comments'

import { handleVariablesFor } from 'customizer-sync-helpers'

handleVariablesFor({
	colorPalette: [
		{
			variable: 'paletteColor1',
			type: 'color:color1'
		},

		{
			variable: 'paletteColor2',
			type: 'color:color2'
		},

		{
			variable: 'paletteColor3',
			type: 'color:color3'
		},

		{
			variable: 'paletteColor4',
			type: 'color:color4'
		},

		{
			variable: 'paletteColor5',
			type: 'color:color5'
		}
	],

	background_pattern: [
		{
			variable: 'backgroundPattern'
		}
	],

	// Page Hero
	...getHeroVariables(),
	...getPostListingVariables(),
	...getPaginationVariables(),

	...getTypographyVariablesFor(),
	...getBackgroundVariablesFor(),
	...getFormsVariablesFor(),
	...getCommentsVariables(),
	...getWooVariablesFor(),

	// Colors
	fontColor: [
		{
			selector: ':root',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: ':root',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	h1Color: {
		variable: 'color',
		type: 'color',
		selector: '.entry-content h1'
	},

	h2Color: {
		variable: 'color',
		type: 'color',
		selector: '.entry-content h2'
	},

	h3Color: {
		variable: 'color',
		type: 'color',
		selector: '.entry-content h3'
	},

	h4Color: {
		variable: 'color',
		type: 'color',
		selector: '.entry-content h4'
	},

	h5Color: {
		variable: 'color',
		type: 'color',
		selector: '.entry-content h5'
	},

	h6Color: {
		variable: 'color',
		type: 'color',
		selector: '.entry-content h6'
	},

	// Buttons Colors
	buttonTextColor: [
		{
			selector: ':root',
			variable: 'buttonTextInitialColor',
			type: 'color:default'
		},

		{
			selector: ':root',
			variable: 'buttonTextHoverColor',
			type: 'color:hover'
		}
	],

	buttonColor: [
		{
			selector: ':root',
			variable: 'buttonInitialColor',
			type: 'color:default'
		},

		{
			selector: ':root',
			variable: 'buttonHoverColor',
			type: 'color:hover'
		}
	],

	// Links Colors
	contentLinksColor: [
		{
			selector: '.entry-content',
			variable: 'entryLinkColor',
			type: 'color:default'
		},

		{
			selector: '.entry-content',
			variable: 'entryLinkColorHover',
			type: 'color:hover'
		},

		{
			selector: '.entry-content',
			variable: 'entryLinkTextColor',
			type: 'color:text'
		}
	],

	siteBackground: {
		variable: 'siteBackground',
		type: 'color'
	},

	// Layout
	maxSiteWidth: {
		selector: ':root',
		variable: 'maxSiteWidth',
		unit: 'px'
	},

	contentAreaSpacing: {
		selector: '.content-area',
		variable: 'contentAreaSpacing',
		responsive: true,
		unit: ''
	},

	narrowContainerWidth: {
		selector: ':root',
		variable: 'narrowContainer',
		unit: 'px'
	},

	wideOffset: {
		selector: ':root',
		variable: 'wideOffset',
		unit: 'px'
	},

	// Sidebar
	sidebarWidth: [
		{
			selector: '[data-sidebar]',
			variable: 'sidebarWidth',
			unit: '%'
		},
		{
			selector: '[data-sidebar]',
			variable: 'sidebarWidthNoUnit',
			unit: ''
		}
	],

	sidebarGap: {
		selector: '[data-sidebar]',
		variable: 'sidebarGap',
		unit: ''
	},

	sidebarOffset: {
		selector: '[data-sidebar]',
		variable: 'sidebarOffset',
		unit: 'px'
	},

	sidebarWidgetsTitleColor: {
		selector: '.ct-sidebar .widget-title',
		variable: 'color',
		type: 'color'
	},

	sidebarWidgetsFontColor: [
		{
			selector: '.ct-sidebar',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '.ct-sidebar',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	sidebarBackgroundColor: {
		selector: '[data-sidebar] > aside',
		variable: 'sidebarBackgroundColor',
		type: 'color'
	},

	sidebarBorder: {
		selector: 'aside[data-type="type-2"]',
		variable: 'border',
		type: 'border',
		responsive: true
	},

	sidebarDivider: {
		selector: 'aside[data-type="type-3"]',
		variable: 'border',
		type: 'border',
		responsive: true
	},

	sidebarWidgetsSpacing: {
		selector: '.ct-sidebar',
		variable: 'sidebarWidgetsSpacing',
		responsive: true,
		unit: 'px'
	},

	sidebarInnerSpacing: {
		selector: '[data-sidebar] > aside',
		variable: 'sidebarInnerSpacing',
		responsive: true,
		unit: 'px'
	},

	sidebarShadow: {
		selector: 'aside[data-type="type-2"]',
		type: 'box-shadow',
		variable: 'boxShadow',
		responsive: true
	},

	// Footer trending posts
	trendingBlockContainerSpacing: {
		selector: '.ct-trending-block',
		variable: 'padding',
		responsive: true,
		unit: ''
	},

	trendingBlockFontColor: [
		{
			selector: '.ct-trending-block',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '.ct-trending-block',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	// Related Posts
	relatedPostsContainerSpacing: {
		selector: '.ct-related-posts',
		variable: 'padding',
		responsive: true,
		unit: ''
	},

	relatedPostsLabelColor: {
		selector: '.ct-related-posts .ct-block-title',
		variable: 'color',
		type: 'color'
	},

	relatedPostsLinkColor: [
		{
			selector: '.related-entry-title',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '.related-entry-title',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	relatedPostsMetaColor: [
		{
			selector: '.ct-related-posts .entry-meta',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '.ct-related-posts .entry-meta',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	relatedThumbRadius: {
		selector: '.ct-related-posts .ct-image-container',
		type: 'spacing',
		variable: 'borderRadius',
		responsive: true
	},

	relatedNarrowWidth: {
		selector: '.ct-related-posts',
		variable: 'narrowContainer',
		unit: 'px'
	},

	// Posts Navigation
	postNavSpacing: {
		selector: '.post-navigation',
		variable: 'margin',
		responsive: true,
		unit: ''
	},

	postsNavFontColor: [
		{
			selector: '.post-navigation',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '.post-navigation',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	// Share Box
	topShareBoxSpacing: {
		selector: '.ct-share-box[data-location="top"]',
		variable: 'margin',
		responsive: true,
		unit: ''
	},

	bottomShareBoxSpacing: {
		selector: '.ct-share-box[data-location="bottom"]',
		variable: 'margin',
		responsive: true,
		unit: ''
	},

	shareItemsIconColor: [
		{
			selector: '.ct-share-box[data-type="type-1"]',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '.ct-share-box[data-type="type-1"]',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	shareItemsBorder: {
		selector: '.ct-share-box[data-type="type-1"]',
		variable: 'borderColor',
		type: 'color'
	},

	shareItemsIcon: {
		selector: '.ct-share-box[data-type="type-2"]',
		variable: 'color',
		type: 'color'
	},

	shareItemsBackground: [
		{
			selector: '.ct-share-box[data-type="type-2"]',
			variable: 'backgroundColor',
			type: 'color:default'
		},

		{
			selector: '.ct-share-box[data-type="type-2"]',
			variable: 'backgroundColorHover',
			type: 'color:hover'
		}
	],

	// Post
	postBackground: {
		selector: '.single .site-main',
		variable: 'siteBackground',
		type: 'color'
	},

	singleContentBoxedSpacing: {
		selector: '.post[data-structure*="boxed"]',
		variable: 'contentBoxedSpacing',
		responsive: true,
		unit: ''
	},

	postContentBoxedShadow: {
		selector: '.post[data-structure*="boxed"]',
		type: 'box-shadow',
		variable: 'boxShadow',
		responsive: true
	},

	singleContentBackground: {
		variable: 'singleContentBackground',
		type: 'color'
	},

	// Page
	pageBackground: {
		selector: '.page .site-main',
		variable: 'siteBackground',
		type: 'color'
	},

	pageContentBoxedShadow: {
		selector: '.page[data-structure*="boxed"]',
		type: 'box-shadow',
		variable: 'boxShadow',
		responsive: true
	},

	pageContentBoxedSpacing: {
		selector: '.page[data-structure*="boxed"]',
		variable: 'contentBoxedSpacing',
		responsive: true,
		unit: ''
	},

	pageContentBackground: {
		variable: 'pageContentBackground',
		type: 'color'
	},

	// Autor Box
	singleAuthorBoxSpacing: {
		selector: '.author-box',
		variable: 'spacing',
		responsive: true,
		unit: ''
	},

	singleAuthorBoxBackground: {
		selector: '.author-box[data-type="type-1"]',
		variable: 'backgroundColor',
		type: 'color'
	},

	singleAuthorBoxShadow: {
		selector: '.author-box[data-type="type-1"]',
		type: 'box-shadow',
		variable: 'boxShadow',
		responsive: true
	},

	singleAuthorBoxBorder: {
		selector: '.author-box[data-type="type-2"]',
		variable: 'borderColor',
		type: 'color'
	},

	topButtonIconColor: [
		{
			selector: '.ct-back-to-top',
			variable: 'color',
			type: 'color:default'
		},

		{
			selector: '.ct-back-to-top',
			variable: 'colorHover',
			type: 'color:hover'
		}
	],

	topButtonShapeBackground: [
		{
			selector: '.ct-back-to-top',
			variable: 'backgroundColor',
			type: 'color:default'
		},

		{
			selector: '.ct-back-to-top',
			variable: 'backgroundColorHover',
			type: 'color:hover'
		}
	],

	topButtonShadow: {
		selector: '.ct-back-to-top',
		type: 'box-shadow',
		variable: 'boxShadow',
		responsive: true
	},

	// Passepartout
	passepartoutSize: {
		selector: '.ct-passepartout',
		variable: 'passepartoutSize',
		responsive: true,
		unit: 'px'
	},

	passepartoutColor: {
		selector: '.ct-passepartout',
		variable: 'passepartoutColor',
		type: 'color'
	}
})

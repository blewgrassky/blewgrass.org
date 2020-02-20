import { Flexy } from 'flexy'

export const mount = sliderEl => {
	sliderEl = sliderEl.parentNode

	if (sliderEl.flexy) {
		return
	}

	const inst = new Flexy(sliderEl.querySelector('.flexy-items'), {
		flexyAttributeEl: sliderEl.querySelector('.flexy-container'),
		elementsThatDoNotStartDrag: ['.twentytwenty-handle'],

		/*
				autoplay:
					Object.keys(
						el.querySelector('.flexy-container').dataset
					).indexOf('autoplay') > -1 &&
					parseInt(
						el.querySelector('.flexy-container').dataset.autoplay,
						10
					)
						? el.querySelector('.flexy-container').dataset.autoplay
						: false,
*/

		pillsContainerSelector: sliderEl.querySelector('.flexy-pills'),
		// leftArrow: sliderEl.querySelector('.flexy-arrow-prev'),
		// rightArrow: sliderEl.querySelector('.flexy-arrow-next'),
		scaleRotateEffect: false,

		// viewport | container
		wrapAroundMode:
			sliderEl.querySelector('.flexy-container').dataset.wrap ===
			'viewport'
				? 'viewport'
				: 'container'
	})

	sliderEl.flexy = inst
}

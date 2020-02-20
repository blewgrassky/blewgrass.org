<?php


namespace DgoraWcas\Admin;


use DgoraWcas\Helpers;

class RegenerateImages
{

    const ALREADY_REGENERATED_OPT_KEY = 'dgwt_wcas_images_regenerated';

    public function __construct()
    {
    }

    public function init()
    {

        $regenerated = get_option(self::ALREADY_REGENERATED_OPT_KEY);


        // Add image sizes to regenerate
        add_filter('woocommerce_regenerate_images_intermediate_image_sizes', array($this, 'getImageSizes'), 10, 1);


        if (Helpers::isSettingsPage() && empty($regenerated)) {
            // regenerate Images
            add_action('admin_init', array($this, 'regenerateImages'));
        }

    }

    public function regenerateImages()
    {

        if (class_exists('WC_Regenerate_Images')) {
            \WC_Regenerate_Images::queue_image_regeneration();
            update_option(self::ALREADY_REGENERATED_OPT_KEY, true);
        }

    }

    /**
     * Images sizes to regenerate
     *
     * @param array $sizes
     *
     * @return array
     */
    public function getImageSizes($sizes)
    {
        array_push($sizes, 'dgwt-wcas-product-suggestion', 'dgwt-wcas-product-details');

        return $sizes;

    }

}
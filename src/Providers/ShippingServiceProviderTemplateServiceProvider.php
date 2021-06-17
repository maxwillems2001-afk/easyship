<?php

namespace ShippingServiceProviderTemplate\Providers;

use Plenty\Plugin\ServiceProvider;
use ShippingServiceProviderTemplate\Helpers\ShippingServiceProviders;
use Plenty\Modules\Order\Shipping\ServiceProvider\Services\ShippingServiceProviderService;

/**
 * Class ShippingServiceProviderTemplateServiceProvider
 * @package ShippingServiceProviderTemplate\Providers
 */
class ShippingServiceProviderTemplateServiceProvider extends ServiceProvider
{
    /**
    * Register the route service provider
    */
    public function register()
    {
        $this->getApplication()->register(ShippingServiceProviderTemplateRouteServiceProvider::class);
    }

    /**
     * Boot actual plugin
     * @param ShippingServiceProviderService $shippingServiceProviderService
     */
    public function boot
    (
        ShippingServiceProviderService $shippingServiceProviderService
    )
    {
        $shippingServiceProviderService->registerShippingProvider(
            ShippingServiceProviders::PLUGIN_NAME,
            ['de' => ShippingServiceProviders::SHIPPING_SERVICE_PROVIDER_NAME, 'en' => ShippingServiceProviders::SHIPPING_SERVICE_PROVIDER_NAME],
            [
                'ShippingServiceProviderTemplate\\Controllers\\ShipmentController@registerShipments',
                'ShippingServiceProviderTemplate\\Controllers\\ShipmentController@deleteShipments',
                'ShippingServiceProviderTemplate\\Controllers\\ShipmentController@getLabels',
            ]
        );
    }
}

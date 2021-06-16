<?php

namespace ShippingServiceProviderTemplate\Migrations;


use ShippingServiceProviderTemplate\Helpers\ShippingServiceProviders;
use Plenty\Modules\Order\Shipping\ServiceProvider\Contracts\ShippingServiceProviderRepositoryContract;
use Plenty\Plugin\Log\Loggable;

class CreateShippingServiceProviders
{
    use Loggable;
    /*
     * @var ShippingServiceProviderRepositoryContract $shippingServiceProviderRepository
     */
    private $shippingServiceProviderRepository;

    /**
     * @param ShippingServiceProviderRepositoryContract $shippingServiceProviderRepository
     */
    public function __construct(ShippingServiceProviderRepositoryContract $shippingServiceProviderRepository)
    {
        $this->shippingServiceProviderRepository = $shippingServiceProviderRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        foreach (ShippingServiceProviders::SHIPPING_SERVICE_PROVIDERS as $shippingServiceProvider) {
            try
            {
                $this->shippingServiceProviderRepository->saveShippingServiceProvider(
                    ShippingServiceProviders::PLUGIN_NAME,
                    $shippingServiceProvider["name"]
                );
            }
            catch (\Exception $e)
            {
                $this->getLogger(ShippingServiceProviders::PLUGIN_NAME)->critical('Could not save or update shipping service provider');
            }
        }
    }
}

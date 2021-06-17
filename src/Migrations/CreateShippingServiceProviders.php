<?php

namespace ShippingServiceProviderTemplate\Migrations;

use ShippingServiceProviderTemplate\Helpers\ShippingServiceProviders;
use Plenty\Modules\Order\Shipping\ServiceProvider\Contracts\ShippingServiceProviderRepositoryContract;
use Plenty\Plugin\Log\Loggable;

/**
 * Class CreateShippingServiceProviders
 * @package ShippingServiceProviderTemplate\Migrations
 */
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
        try
        {
            $this->shippingServiceProviderRepository->saveShippingServiceProvider(
                ShippingServiceProviders::PLUGIN_NAME,
                ShippingServiceProviders::SHIPPING_SERVICE_PROVIDER_NAME
            );
        }
        catch (\Exception $e)
        {
            $this->getLogger(ShippingServiceProviders::PLUGIN_NAME)->critical('Could not save or update shipping service provider');
        }
    }
}

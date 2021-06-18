<?php

namespace ShippingServiceProviderTemplate\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;

/**
 * Class ShipmentController
 * @package ShippingServiceProviderTemplate\Controllers
 */
class ShipmentController extends Controller
{
    /**
     * @param Request $request
     * @param array|false $orderIds
     */
    public function registerShipments(Request $request, array $orderIds = [])
    {
        // TODO: Implement registerShipments method
    }

    /**
     * @param Request $request
     * @param array|false $orderIds
     */
    public function deleteShipments(Request $request, array $orderIds = [])
    {
        // TODO: Implement deleteShipments method
    }

    /**
     *
     */
    public function getLabels()
    {
        // TODO: Implement getLabels method
        return [];
    }
}

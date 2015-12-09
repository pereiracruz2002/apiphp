<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 08/12/15
 * Time: 09:22
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class OrdersServiceFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $orderRepository = $serviceLocator->get('CodeOrders\\V1\\Rest\\Orders\\OrderRepository');
        return new OrdersService($orderRepository);
    }
}
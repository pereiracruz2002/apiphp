<?php
namespace CodeOrders\V1\Rest\Orders;

class OrdersResourceFactory
{
    /**
     * @param $services
     * @return OrdersResource
     */
    public function __invoke($services)
    {
        $orderRepository = $services->get('CodeOrders\\V1\\Rest\\Orders\\OrderRepository');
        print_r($orderRepository);
        exit();
        return new OrdersResource($services->get('CodeOrders\\V1\\Rest\\Orders\\OrderRepository'));
    }
}

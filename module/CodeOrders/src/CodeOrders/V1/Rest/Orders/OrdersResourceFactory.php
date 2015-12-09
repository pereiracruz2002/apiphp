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
        $ordersService = $services->get('CodeOrders\\V1\\Rest\\Orders\\OrderService');
        return new OrdersResource($orderRepository, $ordersService);
    }
}

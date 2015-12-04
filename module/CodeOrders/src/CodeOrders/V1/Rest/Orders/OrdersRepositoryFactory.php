<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 02/12/15
 * Time: 09:05
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZFTest\Hal\TestAsset\ClassMethods;

class OrdersRepositoryFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbAdapter = $serviceLocator->get('DbAdapter');
        $hydrator = new HydratingResultSet(new ClassMethods(),new OrdersEntity());
        $tableGateway = new TableGateway('orders',$dbAdapter,null,$hydrator);
        $orderItemRepository = $serviceLocator->get('CodeOrders\\V1\\Rest\\Orders\\OrderItemTableGateway');
        return new OrdersRepository($tableGateway,$orderItemRepository);
    }
}
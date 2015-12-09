<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 01/12/15
 * Time: 09:10
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\ObjectProperty;

class OrdersRepository
{
    private $tableGateway;
    private $orderItemTableGateway;

    /**
     * @param AbstractTableGateway $tableGateway
     * @param AbstractTableGateway $orderItemTableGateway
     */
    public function __construct(AbstractTableGateway $tableGateway, AbstractTableGateway $orderItemTableGateway)
    {
        $this->tableGateway = $tableGateway;
        $this->orderItemTableGateway = $orderItemTableGateway;

    }

    /**
     * @return array
     */
    public function findAll()
    {
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('items', new OrderItemHydratorStrategy(new ClassMethods()));
        $orders = $this->tableGateway->select();
        $res = [];
        foreach($orders as $order){
           $items =  $this->orderItemTableGateway->select(['order_id' =>$order->getId()]);
           foreach($items as $item){
                $order->addItem($item);
           }
           $data =$hydrator->extract($orders);
           $res[] = $data;
        }
        $arratAdapter = new ArrayAdapter($res);
        $ordersCollection = new OrdersCollection($arratAdapter);
        return $res;
    }

    /**
     * @param $data
     * @return int
     */
    public function insert(arrray $data)
    {

        $this->tableGateway->insert($data);
        $id = $this->tableGateway->getLastInsertValue();
        return id;
    }

    /**
     * @param array $data
     */
    public function insertItem(array $data)
    {
        $this->orderItemTableGateway->insert($data);
        return $this->orderItemTableGateway->getLastInsertValue();
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }


}
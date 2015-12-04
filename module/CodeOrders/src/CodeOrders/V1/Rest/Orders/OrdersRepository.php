<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 01/12/15
 * Time: 09:10
 */

namespace CodeOrders\V1\Rest\Orders;


use Zend\Db\TableGateway\AbstractTableGateway;

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

    public function findAll()
    {
        $orders = $this->tableGateway->select();
        $res = [];
        //foreach($)
        return $orders;
    }


}
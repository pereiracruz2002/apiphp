<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 08/12/15
 * Time: 09:14
 */

namespace CodeOrders\V1\Rest\Orders;


class OrdersService
{
    /**
     * @var OrdersRepository
     */
    private $repository;

    /**
     * @param OrdersRepository $repository
     */
    public function __construct(OrdersRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * @param $data
     * @return int
     */
    public function insert($data)
    {
        $hydrator = new ObjectProperty();
        $data = $hydrator->extract($data);
        $orderData = $data;
        unset($orderData['item']);
        $items= $data['item'];

        $tableGateway = $this->repository->get();
        try{
            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();
            $orderId = $order= $this->repository->insert($orderData);
            foreach($items as $item){
                $item['order_id'] = $orderId;
                $this->repository->insertItem($item);
            }
            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();
        }catch (\Exception $e){
            $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            return 'error';
        }


        return ['order_id'=>$orderId];
    }
}
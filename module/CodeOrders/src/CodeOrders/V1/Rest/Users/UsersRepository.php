<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 03/11/15
 * Time: 09:15
 */

namespace CodeOrders\V1\Rest\Users;


use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbTableGateway;

class UsersRepository
{
    private $tableGatewayInterface;
    public function __construct(TableGatewayInterface $tableGatewayInterface)
    {
        $this->tableGatewayInterface = $tableGatewayInterface;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $tableGateway = $this->tableGatewayInterface;
        $paginatorAdapter = new DbTableGateway($tableGateway);
        return new UsersCollection($paginatorAdapter);
    }

    public function find($id)
    {
        $resultSet = $this->tableGatewayInterface->select(['id'=>(int)$id]);
        return $resultSet->current();
    }
}
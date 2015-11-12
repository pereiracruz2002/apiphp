<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 03/11/15
 * Time: 09:21
 */

namespace CodeOrders\V1\Rest\Users;


use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class UsersRepositoryFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $dbAdapter = $serviceLocator->get('dbAdapter');

        $userMapper = new UsersMapper();

        $hydrator = new HydratingResultSet($userMapper, new UsersEntity());


        $tableGateway = new TableGateway('oauth_users', $dbAdapter, null, $hydrator);
        $usersRepository = new UsersRepository($tableGateway);

        return $usersRepository;
    }
}
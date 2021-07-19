<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)

 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, Customer::class);
  }

   /**
    * @return Customer[] Returns an array of Customer objects
    */
  public function findAll()
  {
    $em = $this->getEntityManager();

    return $em->createQuery(
      "select c, p 
      from App\Entity\Customer c
      left join c.phoneNumbers p
      order by c.lastName"
    )->getArrayResult();
   }
}

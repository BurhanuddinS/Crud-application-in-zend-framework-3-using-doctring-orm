<?php
namespace Crud\Service;

use Crud\Entity\Emp;


// The PostManager service is responsible for adding new posts.
class EmpManager 
{
  /**
   * Doctrine entity manager.
   * @var Doctrine\ORM\EntityManager
   */
  private $entityManager;
  
  // Constructor is used to inject dependencies into the service.
  public function __construct($entityManager)
  {
    $this->entityManager = $entityManager;
  }
    
  // This method adds a new post.
  public function addNewEmp($data) 
  {
    // Create new Post entity.
    $emp = new Emp();
    $emp->setEmpName($data['name']);
    $emp->setCmpName($data['company']);
       
        
    // Add the entity to entity manager.
    $this->entityManager->persist($emp);
        

        
    // Apply changes to database.
    $this->entityManager->flush();
  }
  
  // Adds/updates tags in the given post.
  
}
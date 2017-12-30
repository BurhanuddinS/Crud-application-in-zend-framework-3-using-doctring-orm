<?php
namespace Crud\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="emp")
 */
class Emp 
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(name="id")   
   */
  protected $id;

  /** 
   * @ORM\Column(name="emp_name")  
   */
  protected $emp_name;

  /** 
   * @ORM\Column(name="cmp_name")  
   */
  protected $cmp_name;
  
  public function getId() 
  {
    return $this->id;
  }


  public function setId($id) 
  {
    $this->id = $id;
  }


  public function getEmpName() 
  {
    return $this->emp_name;
  }
  
  public function setEmpName($emp_name) 
  {
    $this->emp_name = $emp_name;
  }
  
    public function getCmpName() 
  {
    return $this->cmp_name;
  }
  
  public function setCmpName($cmp_name) 
  {
    $this->cmp_name = $cmp_name;
  }


}
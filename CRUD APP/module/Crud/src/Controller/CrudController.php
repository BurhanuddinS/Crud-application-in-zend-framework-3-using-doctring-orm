<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Crud\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Service\EmpManager;
use Zend\View\Model\ViewModel;
use Crud\Entity\Emp;
use Crud\Form\EditForm;
use Crud\Form\AddForm;

class CrudController extends AbstractActionController
{
    /**
   * Entity manager.
   * @var Doctrine\ORM\EntityManager
   */
  private $entityManager;
   /**
     * Emp manager.
     * @var Crud\Service\EmpManager 
     */
  private $empManager;
  
  // Constructor method is used to inject dependencies to the controller.
  public function __construct($entityManager, $empManager) 
  {
    $this->entityManager = $entityManager;
    $this->empManager = $empManager;
  }
  
  
    public function indexAction()
    {
        $emp = $this->entityManager->getRepository(Emp::class)->findAll();
        return new ViewModel(['emp' => $emp]);
      
    }

    
    public function addAction()
    {
          
        
        
         // Create the form.
        $form = new AddForm();
        
        // Check whether this post is a POST request.
        if ($this->getRequest()->isPost()) {
            
            // Get POST data.
            $data = $this->params()->fromPost();
            
            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {
                                
                // Get validated form data.
                $data = $form->getData();}
                
                // Use post manager service to add new post to database.                
                $this->empManager->addNewEmp($data);

        
        return $this->redirect()->toUrl('http://localhost:8080/crud');
        }
    return new ViewModel([
            'form' => $form
        ]);
    
 
    }
    
    public function editAction()
    {
 // Create the form.
        $form = new EditForm();
        $valId = $this->params()->fromRoute('id');
        $value = $this->entityManager->getRepository(Emp::class)
                ->find($valId);
        $form->get('name')->setValue($value->getEmpName());
        $form->get('company')->setValue($value->getCmpName());
        if ($this->getRequest()->isPost()) {
        $data = $this->params()->fromPost();
        $form->setData($data);
        if($form->isValid()) {             
        $data = $form->getData();}
        $editId = $this->params()->fromRoute('id');
        $edit = $this->entityManager->getRepository(Emp::class)
                ->find($editId);
        $edit->setEmpName($data['name']);
        $edit->setCmpName($data['company']);
        $this->entityManager->persist($edit);
        $this->entityManager->flush();
        return $this->redirect()->toUrl('http://localhost:8080/crud');
            
        }
        
        // Render the view template.
        return new ViewModel([
            'form' => $form
        ]);
    }
    
    public function deleteAction()
    {
        $delId = $this->params()->fromRoute('id');
        $del = $this->entityManager->getRepository(Emp::class)
                ->find($delId);        
        if ($del == null) {
        $this->getResponse()->setStatusCode(404);
        return;                        
    }        
        $this->entityManager->remove($del);
        $this->entityManager->flush();
        return $this->redirect()->toUrl('http://localhost:8080/crud');
        
    }
    
    
    
}

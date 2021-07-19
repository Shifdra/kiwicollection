<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  /**
   * @Route("/", name="home")
   */
  public function index()
  {
    //get customer data
    $customers = $this->getDoctrine()
      ->getRepository(Customer::class)
      ->findAll();

    return $this->render('index.html.twig', [
      "data" => json_encode($customers)
    ]);
  }
}

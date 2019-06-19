<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
  /**
   * @Route("/", name="calorie_index", methods={"GET"})
   */
  function index()
  {
    return $this->render('index.html.twig');
  }

  /**
   * @Route("/submit", name="save_food", methods={"GET"})
   */
  function submitPage()
  {
    return $this->render('submit.html.twig');
  }
}

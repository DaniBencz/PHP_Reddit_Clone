<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Bundle\FrameworkBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PostRepository;
use App\Entity\Post;

class DefaultController extends AbstractController
{
  private $postRepository;

  function __construct(PostRepository $postRepository)
  {
    $this->postRepository = $postRepository;
  }

  /**
   * @Route("/", name="reddit_index", methods={"GET"})
   */
  function index()
  {
    //$post = $this->postRepository->findAll();
    return $this->render('index.html.twig');
  }

  /**
   * @Route("/submitpage", name="submitpage", methods={"GET"})
   */
  function submitPage()
  {
    return $this->render('submitpage.html.twig');
  }

  /**
   * @Route("/save", name="save_post", methods={"POST"})
   */
  function save(Request $request)
  {
    $post = new Post();
    $post->setTitle($request->request->get('title'));
    $post->setUrl($request->request->get('url'));

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($post);
    $entityManager->flush();
    return $this->redirectToRoute('reddit_index');
  }
}

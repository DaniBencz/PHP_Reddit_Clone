<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PostRepository;
use App\Entity\Post;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
    $posts = $this->postRepository->findAll();
    return $this->render('index.html.twig', [
      'posts' => $posts,
    ]);
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
  function save(Request $request, ValidatorInterface $validator)
  {
    $post = new Post();
    $post->setTitle($request->request->get('title'));
    $post->setUrl($request->request->get('url'));
    $errors = $validator->validate($post);

    if (count($errors) > 0) {
      $posts = $this->postRepository->findAll();
      return $this->render('index.html.twig', [
        'posts' => $posts,
      ]);
    }

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($post);
    $entityManager->flush();
    return $this->redirectToRoute('reddit_index');
  }

  /**
   * @Route("/upvote/{id}", name="upvote", methods={"POST"})
   */
  function upvote($id)
  {
    $posts = $this->postRepository->findAll();
    $post = $this->postRepository->find($id);
    $increment = $post->getRating() + 1;
    $post->setRating($increment);
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($post);;
    $entityManager->flush();
    return $this->render('index.html.twig', [
      'posts' => $posts,
    ]);
  }

  /**
   * @Route("/downvote/{id}", name="downvote", methods={"POST"})
   */
  function downvote($id)
  {
    $posts = $this->postRepository->findAll();
    $post = $this->postRepository->find($id);
    if ($post->getRating() !== 0) {
      $increment = $post->getRating() - 1;
      $post->setRating($increment);
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($post);;
      $entityManager->flush();
    }
    return $this->render('index.html.twig', [
      'posts' => $posts,
    ]);
  }
}

<?php

declare(strict_types=1);

namespace TomasVotruba\Website\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TomasVotruba\Blog\Repository\PostRepository;

final class ClustersController extends AbstractController
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @Route(path="clusters", name="clusters")
     */
    public function __invoke(): Response
    {
        return $this->render('clusters/clusters.twig', [
            'title' => 'Clusters',
            'posts' => $this->postRepository->fetchAllEnglishNonDeprecated(),
        ]);
    }
}

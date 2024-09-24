<?php

namespace App\Core\Http;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Infrastructure\Repository\DeveloperRepository;
use App\Core\Domain\Entity\Developer\Developer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/developer')]
class DeveloperController extends AbstractController
{
    private DeveloperRepository $developerRepository;

    public function __construct(DeveloperRepository $developerRepository)
    {
        $this->developerRepository = $developerRepository;
    }

    #[Route('/', name: 'developer_index', methods: ['GET'])]
    public function index(DeveloperRepository $developerRepository): Response
    {
        $list = $this->developerRepository->findAll();
        return $this->render('developers/components/list.html.twig', [
            'list' => $list,
        ]);
    }

    #[Route('/new', name: 'developer_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $create = $this->developerRepository->createDeveloper();
        return $this->render('developers/components/new.html.twig', [
            'create' => $create,
        ]);
    }

    #[Route('/{id}', name: 'developer_show', methods: ['GET'])]
    public function show(Developer $developer): Response
    {
        return $this->render('developers/components/show.html.twig', [
            'show' => $show,
        ]);
    }

    #[Route('/{id}/edit', name: 'developer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Developer $developer): Response
    {
        return $this->render('developers/components/edit.html.twig', [
            'edit' => $edit,
        ]);
    }

    #[Route('/{id}/delete', name: 'developer_delete', methods: ['POST'])]
    public function delete(Request $request, Developer $developer): Response
    {
        $this->developerRepository->remove($developer, true);
        return $this->redirectToRoute('developer_index');
    }
}

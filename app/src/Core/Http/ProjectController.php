<?php

namespace App\Core\Http;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Infrastructure\Repository\ProjectRepository;
use App\Core\Domain\Entity\Project;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    private ProjectRepository $projectRepository;

    public function __construct(ProjectRepository $ProjectRepository)
    {
        $this->projectRepository = $pojectRepository;
    }

    #[Route('/', name: 'project_index', methods: ['GET'])]
    public function index(ProjectRepository $projectRepository): Response
    {
        $list = $this->projectRepository->findAll();
        return $this->render('projects/list.html.twig', [
            'list' => $list,
        ]);
    }

    #[Route('/new', name: 'project_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $create = $this->projectRepository->createProject();
        return $this->render('projects/list.html.twig', [
            'create' => $create,
        ]);
    }

    #[Route('/{id}', name: 'project_show', methods: ['GET'])]
    public function show(Project $project): Response
    {
        // TODO: Показать информацию о проекте
    }

    #[Route('/{id}/edit', name: 'project_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Project $project): Response
    {
        // TODO: Редактирование информации о проекте
    }

    #[Route('/{id}/delete', name: 'project_delete', methods: ['POST'])]
    public function delete(Request $request, Project $project): Response
    {
        // TODO: Удаление проекта
    }
}

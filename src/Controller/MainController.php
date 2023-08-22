<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\NaturalObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    #[Route('/{id<\d{13}>}', name: 'object')]
    public function object(string $id, NaturalObjectRepository $naturalObjectRepository): Response
    {
        $naturalObject = $naturalObjectRepository->getById($id);
        if ($naturalObject === null) {
            throw new NotFoundHttpException();
        }

        $photos = $naturalObjectRepository->getPhotosById($id);
        $links = $naturalObjectRepository->getLinksById($id);

        return $this->render('object.html.twig', [
            'id' => $id,
            'object' => $naturalObject,
            'photos' => $photos,
            'links' => $links,
        ]);
    }

    #[Route('/{id<\d{13}>}/redirect', name: 'object.redirect')]
    public function objectRedirect(string $id, NaturalObjectRepository $naturalObjectRepository): RedirectResponse
    {
        $naturalObject = $naturalObjectRepository->getById($id);
        if ($naturalObject === null) {
            throw new NotFoundHttpException();
        }

        $url = sprintf(
            'https://stvk.lt/map/%0.4f/%0.4f/%0.1f/[%s]',
            $naturalObject->getCoordinates()->getLatitude(),
            $naturalObject->getCoordinates()->getLongitude(),
            $naturalObject->getCoordinates()->getZoom(),
            implode(',', $naturalObject->getKind()->toLayer())
        );

        return $this->redirect($url);
    }
}

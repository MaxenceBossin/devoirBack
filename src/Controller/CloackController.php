<?php

namespace App\Controller;

use App\Entity\Cloack;
use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


#[Route('/api', name: 'api_')]
class CloackController extends AbstractController
{
    /* show all cloaks */
    #[Route('/cloacks', name: 'app_cloacks', methods: ['GET'])]
    public function index(
        ManagerRegistry $doctrine
    ): Response
    {

        $cloacks = $doctrine
            ->getRepository(Cloack::class)
            ->findAll();

        $data = [];

        foreach ($cloacks as $cloack) {
            $data[] = [
                'id' => $cloack->getId(),
                'name' => $cloack->getName(),
                'ref' => $cloack->getReference(),
                'price' => $cloack->getPrice(),
                'date' => $cloack->getCreatedAt(),
                'gender' => $cloack->isGender(),
                'src' => $cloack->getImageSrc(),
                'companyName' => $cloack->getCompany()->getName(),
                'companyCountryName' => $cloack->getCompany()->getCountry(),

            ];
        }

        return $this->json($data);
    }

    /* Show One cloc     */
}

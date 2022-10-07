<?php

namespace App\Controller;

use App\Entity\Company;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api', name: 'api_')]
class CompanyController extends AbstractController
{
    #[Route('/companies', name: 'app_projet', methods: ['GET'])]
    public function index(
        ManagerRegistry $doctrine
    ): Response
    {

        $companies = $doctrine
            ->getRepository(Company::class)
            ->findAll();

        $data = [];

        foreach ($companies as $company) {
            $data[] = [
                'name' => $company->getName(),
                'country' => $company->getCountry(),
 
            ];
        }

        return $this->json($data);
    }
}

<?php

namespace App\Controller;

use App\Entity\Business;
use App\Repository\BusinessRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/")
 */
class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(): Response
    {
        $form = $this->createFormBuilder()
            ->add('search', SearchType::class)
            ->setAction($this->generateUrl('search'))
            ->setMethod('POST')
            ->getForm();
        
        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/search", name="search", methods={"POST"})
     */
    public function search(Request $request, BusinessRepository $businessRepository): Response
    {
        $form = $request->request->get('form');
        return $this->render('main/search.html.twig', [
            'search' => $form['search'],
            'businesses' => $businessRepository->search($form['search'])
        ]);
    }

    /**
     * @Route("/{id}", name="show_business", methods={"GET"})
     */
    public function showBusiness(Business $business): Response
    {
        return $this->render('main/show.business.html.twig', [
            'business' => $business,
        ]);
    }

    
}
<?php
namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of VoyagesController
 *
 * @author ibay4
 */
class VoyagesController extends AbstractController {
    
    /**
     *
     * @var VisiteRepository
     */
    private $repository;
    
    /**
     * 
     * @param VisiteRepository $repository
     */
    function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }

    
    /**
     * @Route ("/voyages", name="voyages")
     * @return Response
     */
    public function index(): Response{
        $visites = $this->repository->findAllOrderBy('datecreation', 'DESC');
        return $this->render("pages/voyages.html.twig", [
            'visites' => $visites
                ]);
        
}

}
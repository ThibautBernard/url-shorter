<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
class ErrorController extends AbstractController
{

    /**
     * 
     * @Route("/url/error", name="error")
     */
    public function errorPage()
    {
        return $this->render('error.html.twig');
    }

}
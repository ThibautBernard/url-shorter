<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Url;
use App\Form\UrlType;
use DateTime;
use App\Services\CorrectUrl;
class ErrorController extends AbstractController
{

    /**
     * 
     * @Route("/url/error", name="error")
     */
    public function ErrorPage(Request $request)
    {
       
        return $this->render('error.html.twig');
    }

}
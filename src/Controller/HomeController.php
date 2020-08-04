<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Url;
use App\Form\UrlType;
use DateTime;

class HomeController extends AbstractController
{

    /**
     * 
     * @Route("/", name="home")
     */
    public function home(Request $request)
    {
        $url = new Url();
        
        $form = $this->createForm(UrlType::class, $url);
        $url->setDateCreated(new DateTime('NOW'));
       
        if($form->isSubmitted())
        {
            echo 'Hello';
        }

        return $this->render('home.html.twig', ['form' => $form->createView()]);
    }

}
<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Url;
use App\Form\UrlType;
use DateTime;
use App\Services\CorrectUrl;
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
 
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
           $verif =  new CorrectUrl($url->getOriginalUrl());
           if($verif->isUrl())
           {
                $url->setNameShortUrl(substr(md5(time()), 0, 5));                
                $newShortUrl = 'url-short.herokoku/'. $url->getNameShortUrl();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($url);
                $entityManager->flush();
                return $this->render('home.html.twig', ['form' => $form->createView(), 'shortUrl' => $newShortUrl]);
           }
           else{echo 'Wrong Url';}
        }

        return $this->render('home.html.twig', ['form' => $form->createView()]);
    }

}
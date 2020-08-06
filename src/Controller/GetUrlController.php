<?php 

namespace App\Controller;

use App\Entity\Url;
use App\Services\CorrectUrl;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

class GetUrlController extends AbstractController
{

    /**
     * 
     * @Route("/{name}", name="get_url")
     */
    public function getUrl($name)
    {
        $url = $this->getDoctrine()->getRepository(Url::class)->findOneBy(array('nameShortUrl' => $name));

        if(empty($url)) { 
            //throw new HttpException(404, 'Not exist'); 
            return $this->redirectToRoute('error');
        }

        $orignalUrl =  $url->getOriginalUrl();
        
        return $this->redirect($orignalUrl, 302);
    }
}
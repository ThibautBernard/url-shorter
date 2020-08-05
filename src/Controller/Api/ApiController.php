<?php 

namespace App\Controller\Api;

use App\Entity\Url;
use App\Services\CorrectUrl;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiController extends AbstractController
{

    /**
     * @Get(
     *      path = "/{name}",
     *      name = "getUrl"
     * )
     * @View(
     *      statusCode=200 
     * )
     * 
     * @param string $name
     **/
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
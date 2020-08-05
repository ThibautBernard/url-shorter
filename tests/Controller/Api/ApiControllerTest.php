<?php 
namespace tests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{

    public function testIfApiReturn200AfterACallGetWithStringParam()
    {
        $client = static::createClient();

        $client->request('GET', '/2a03b');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
 
    public function testIfNotExistNameUrlGiven()
    {
        $client = static::createClient();

        $client->request('GET', '/zdidzijji');

        $this->assertResponseRedirects();
    }

    public function testIfReloadTheGoodOriginalURLAfterApiCall()
    {
        $client = static::createClient();

        $client->request('GET', '/2a03b');
        $this->assertResponseRedirects();
    }


}
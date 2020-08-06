<?php 
namespace tests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetUrlController extends WebTestCase
{

    public function testIfReturn302RedirectionAfterACallGetWithStringParam()
    {
        $client = static::createClient();

        $client->request('GET', '/2a03b');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
 
    public function testIfRedirectAfterGivenUrlNameFalse()
    {
        $client = static::createClient();

        $client->request('GET', '/zdidzijji');

        $this->assertResponseRedirects('/url/error');
    }

    public function testIfRedirectionAfterGivenRealShortUrlName()
    {
        $client = static::createClient();

        $client->request('GET', '/2a03b');
        $this->assertResponseRedirects();
    }


}
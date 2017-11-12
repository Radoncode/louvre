<?php

namespace Tests\LP\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

Class HomeControllerTest extends WebTestCase
{
    public function testIndexAction()
    {
    	$client = static::createClient();

    	$crawler = $client->request('GET','/');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    	$this->assertEquals(1,$crawler->filter('h1:contains("LES VISITES GUIDEES")')->count());
    }
}
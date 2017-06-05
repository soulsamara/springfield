<?php

namespace Angie\NotasBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AsignaturaControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testAsignatura()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/asignatura/{id_asignatura}{max}');
    }

}

<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
    /**
     * Hello controller test
     */
{
    public function testHelloRoute(): void
        /**
         * Class HelloControllerTest.
         */
    {
        // given
        $client = static::createClient();

        // when
        $client->request('GET', '/hello');

        // then
        $actualHttpStatusCode = $client->getResponse()->getStatusCode();
        $this->assertSame(200, $actualHttpStatusCode);
    }
}

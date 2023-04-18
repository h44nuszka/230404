<?php

namespace App\Tests\Controller;

use Generator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
    /**
     * Hello controller test
     */
{
    const TEST_PATH = '/hello';

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

    /**
     * @param string $name
     * @param string $expected
     * @dataProvider dataProviderForTestHelloWorldPersonalized
     */
    public function testHelloWorldCustomizedGreeting(string $name, string $expected): void {
        //given
        $client = static::createClient();
        //when
        $client->request('GET', '/hello/'.$name);
        //then
        $this->assertSelectorTextContains('html title', $expected);
        $this->assertSelectorTextContains('html p', $expected);
    }

    /**
     * Data provider for testHelloWorldPersonalized() method.
     *
     * @return Generator Test case
     */
    public function dataProviderForTestHelloWorldPersonalized(): Generator
    {
        yield 'Hello Ann' => [
            'name' => 'Ann',
            'expected' => 'Hello Ann!',
        ];
        yield 'Hello John' => [
            'name' => 'John',
            'expected' => 'Hello John!',
        ];
        yield 'Hello Beth' => [
            'name' => 'Beth',
            'expected' => 'Hello Beth!',
        ];
    }
}

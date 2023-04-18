<?php
/**
 * Fizz-Buzz controller tests.
 */

namespace App\Tests\Controller;

use Generator;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class FizzBuzzControllerTest.
 */
class FizzBuzzControllerTest extends WebTestCase
{
    /**
     * Test route.
     *
     * @const string
     */
    public const TEST_ROUTE = '/fizz-buzz';

    /**
     * Test client.
     */
    private KernelBrowser $httpClient;

    /**
     * Set up tests.
     */
    public function setUp(): void
    {
        $this->httpClient = static::createClient();
    }

    /**
     * Test route.
     */
    public function testRoute(): void
    {
        // given
        $expectedStatusCode = 200;

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test fizz buzz.
     *
     * @param int    $number   Input value
     * @param string $expected Expected value
     *
     * @dataProvider dataProviderForTestFizzBuzz
     */
    public function testFizzBuzz(int $number, string $expected): void
    {
        // given
        // when
        $this->httpClient->request('GET', self::TEST_ROUTE.'/'.$number);

        // then
        $this->assertSelectorTextContains('html p', $expected);
    }

    /**
     * Data provider for testFizzBuzz().
     */
    public function dataProviderForTestFizzBuzz(): Generator
    {
        yield 'value for number 1' => [
            'number' => 1,
            'expected' => '1',
        ];
        yield 'value for number 2' => [
            'number' => 2,
            'expected' => '2',
        ];
        yield 'value for number 7' => [
            'number' => 7,
            'expected' => '7',
        ];
        yield 'value for number 3' => [
            'number' => 3,
            'expected' => 'Fizz',
        ];
        yield 'value for number 5' => [
            'number' => 5,
            'expected' => 'Buzz',
        ];
        yield 'value for number 6' => [
            'number' => 6,
            'expected' => 'Fizz',
        ];
        yield 'value for number 10' => [
            'number' => 10,
            'expected' => 'Buzz',
        ];
        yield 'value for number 15' => [
            'number' => 15,
            'expected' => 'FizzBuzz',
        ];
        yield 'value for number 33' => [
            'number' => 33,
            'expected' => 'Fizz',
        ];
        yield 'value for number 45' => [
            'number' => 45,
            'expected' => 'FizzBuzz',
        ];
        yield 'value for number 75' => [
            'number' => 75,
            'expected' => 'FizzBuzz',
        ];
        yield 'value for number 99' => [
            'number' => 99,
            'expected' => 'Fizz',
        ];
        yield 'value for number 100' => [
            'number' => 100,
            'expected' => 'Buzz',
        ];
    }
}

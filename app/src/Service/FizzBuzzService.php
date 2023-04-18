<?php
/**
 * Fizz-Buzz service.
 */

namespace App\Service;

/**
 * Class FizzBuzzService.
 */
class FizzBuzzService implements FizzBuzzServiceInterface
{
    /**
     * Execute Fizz-Buzz.
     *
     * @param int $number Input number
     *
     * @return string Result string
     */
    public function execute(int $number): string
    {
        if ($this->isDivisibleByFive($number) && $this->isDivisibleByThree($number)) {
            $result = 'FizzBuzz';
        } elseif ($this->isDivisibleByFive($number)) {
            $result = 'Buzz';
        } elseif ($this->isDivisibleByThree($number)) {
            $result = 'Fizz';
        } else {
            $result = $number;
        }

        return $result;
    }

    /**
     * Checks if index is divisible by three.
     *
     * @param int $number Number
     *
     * @return bool Result
     */
    private function isDivisibleByThree(int $number): bool
    {
        return 0 === $number % 3;
    }

    /**
     * Checks if index is divisible by five.
     *
     * @param int $number Number
     *
     * @return bool Result
     */
    private function isDivisibleByFive(int $number): bool
    {
        return 0 === $number % 5;
    }
}
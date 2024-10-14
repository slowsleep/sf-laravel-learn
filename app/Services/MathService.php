<?php

namespace App\Services;

use App\Services\MathServiceInterface;

class MathService implements MathServiceInterface
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public function mult(int $a, int $b): int
    {
        return $a * $b;
    }

    public function pow(int $a, int $b): int
    {
        return $a ** $b;
    }
}


<?php

namespace App\Services;

interface MathServiceInterface
{
    public function add(int $a, int $b);
    public function mult(int $a, int $b);
    public function pow(int $a, int $b);
}

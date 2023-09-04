<?php

namespace Leetcode;

use App\Solution;

class SolutionTest extends \PHPUnit\Framework\TestCase
{
    public Solution $solution;
    public function setUp(): void
    {
        $this->solution = new Solution();
    }
    public function testThereAreBraces() : void
    {
        $this->assertTrue($this->solution->isValid('([{s}])'));
        $this->assertFalse($this->solution->isValid('[s]}'));
    }
}
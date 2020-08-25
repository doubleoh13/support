<?php


use DoubleOh13\Support\IntHelper;

class IntHelperTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function an_integer_can_be_converted_to_and_from_base_62()
    {
        $this->assertEquals('Y', IntHelper::toBase62(60));
        $this->assertEquals(11568, IntHelper::fromBase62('30A'));
        foreach(range(1,10000) as $int) {
            $this->assertEquals($int, IntHelper::fromBase62(IntHelper::toBase62($int)));
        }
    }
}
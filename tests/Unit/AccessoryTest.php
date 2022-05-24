<?php

namespace Tests\Unit;


use Tests\TestCase;
use App\Models\Mobile;
use Illuminate\Database\Eloquent\Collection;

class AccessoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mobile_has_many_accessories()
    {
        $mobile = new Mobile;
        $this->assertInstanceOf(Collection::class,$mobile->accessories);
    }
}

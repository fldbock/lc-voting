<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\User;
class UserTest extends TestCase
{
    use RefreshDatabase;    

    /** @test */
    public function test_is_admin_works(){
        $userAdmin = User::factory()->make([
            'email' => 'flor.debock@gmail.com'
        ]);

        $userNonAdmin = User::factory()->make([
            'email'=> 'example@gmail.com'
            ]);

        $this->assertTrue($userAdmin->isAdmin());
        $this->assertFalse($userNonAdmin->isAdmin());
    }
}

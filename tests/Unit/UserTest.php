<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Database\Seeders\CategorySeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\UserSeeder;

use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use App\Models\Idea;

class UserTest extends TestCase
{
    use RefreshDatabase;    
    
    public function setUp(): void
    {
        parent::setUp();
        $this->seed(UserSeeder::class);
        $this->seed(CategorySeeder::class);
        $this->seed(StatusSeeder::class);
    }

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

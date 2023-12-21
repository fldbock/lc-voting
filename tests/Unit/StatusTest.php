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

class StatusTest extends TestCase
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
    public function test_can_get_count_of_each_status(){
        // Open
        Idea::factory(1)->create([
            'status_id'=> 1,
        ]);
        // Considering
        Idea::factory(2)->create([
            'status_id'=> 2,
        ]);
        // In Progress
        Idea::factory(3)->create([
            'status_id'=> 3,
        ]);
        // Implemented
        Idea::factory(4)->create([
            'status_id'=> 4,
        ]);
        // Closed
        Idea::factory(5)->create([
            'status_id'=> 5,
        ]);
        
        $this->assertEquals(15, Status::getCount()['all_statuses']);
        $this->assertEquals(1, Status::getCount()['open']);
        $this->assertEquals(2, Status::getCount()['considering']);
        $this->assertEquals(3, Status::getCount()['in_progress']);
        $this->assertEquals(4, Status::getCount()['implemented']);
        $this->assertEquals(5, Status::getCount()['closed']);
    }
}

<?php

namespace Tests\Feature\Unit;

use App\Category;
use App\Message;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testACategoryCanBeCreated()
    {
        $category = Category::create();
        $latest_category = Category::latest()->first();

        $this->assertEquals($category->id, $latest_category->id);
    }
}

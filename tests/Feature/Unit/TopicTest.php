<?php

namespace Tests\Feature\Unit;

use App\Category;
use App\Topic;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopicTest extends TestCase
{

    use DatabaseMigrations;

    public function testATopicCanBeCreated()
    {
        $category = Category::create();
        $topic = Topic::create(['title' => 'test title', 'category_id' => $category->id]);

        $this->assertEquals($topic->category_id, $category->id);
        $this->assertEquals($topic->title, 'test title');
    }
}

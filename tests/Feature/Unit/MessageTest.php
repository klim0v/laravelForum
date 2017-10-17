<?php

namespace Tests\Feature\Unit;

use App\Category;
use App\Message;
use App\Topic;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{

    use DatabaseMigrations;

    public function testATopicCanBeCreated()
    {
        $category = Category::create();
        $topic = Topic::create(['title' => 'test title', 'category_id' => $category->id]);
        $message = Message::create(['text' => 'test text', 'topic_id' => $topic->id]);

        $latest_message = Message::latest()->first();

        $this->assertNotNull($message->created_at);
        $this->assertEquals($message->topic_id, $latest_message->id);
        $this->assertEquals($message->text, $latest_message->text);
        $this->assertDatabaseHas('messages', ['id' => 1, 'text' => 'test text', 'topic_id' => 1]);

        // вынести в отдельный
        $message2 = Message::create(['text' => 'test text 2', 'topic_id' => $topic->id]);
        $this->assertCount(2, $topic->messages);
    }
}

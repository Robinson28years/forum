<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadsTest extends TestCase
{
  use DatabaseMigrations;

     public function setUp()
     {
       parent::setUp();
       $this->thread = factory('App\Thread')->create();

     }
    public function test_a_user_can_browse_threads()
    {
        // $thread=factory('App\Thread')->create();
        $response = $this->get('/threads');

        $response->assertStatus(200);
        $response->assertSee($this->thread->title);
    }
    public function test_a_user_can_read_a_single_thread()
    {
      // $thread=factory('App\Thread')->create();
      $response = $this->get('/threads/'.$this->thread->id);

      $response->assertStatus(200);
      $response->assertSee($this->thread->title);
    }
    public function test_a_user_can_read_replies_that_associated_with_a_thread()
    {
        $reply=factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        $this->get('/threads/'.$this->thread->id)
              ->assertSee($reply->body);
    }
}

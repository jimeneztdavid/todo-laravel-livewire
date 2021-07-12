<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function dashboard_page_contains_form_todo_livewire_component()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/dashboard')->assertSeeLivewire('form-todo');
    }

    /** @test */
    public function dashboard_page_contains_table_todo_livewire_component()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/dashboard')->assertSeeLivewire('table-todo');
    }
}

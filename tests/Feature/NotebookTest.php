<?php

namespace Tests\Feature;

use App\Models\Notebook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotebookTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_notebooks()
    {
        $response = $this->get('/api/v1/notebook');
        $response->assertStatus(200);
    }
    public function test_create_new_notebook()
    {
        $notebook = Notebook::factory()->make();
        $response = $this->postJson('/api/v1/notebook', [
            'fio' => $notebook->fio,
            'phone_number' => $notebook->phone_number,
            'email' => $notebook->email,
            'image' => $notebook->image
        ]);
        $response->assertStatus(201);
    }
    public function test_create_new_notebook_invalid_data()
    {
        $notebook = Notebook::factory()->make();
        $response = $this->postJson('/api/v1/notebook', [
            'fio' => $notebook->fio,
            'phone_number' => $notebook->phone_number,
            'email' => 'myemail',
            'image' => $notebook->image
        ]);
        $response->assertStatus(422);
    }
    public function test_read_notebook()
    {
        $notebook = Notebook::factory()->create();
        $response = $this->get('/api/v1/notebook/' . $notebook->id);
        $response->assertStatus(200);
    }
    public function test_read_notebook_invalid_id()
    {
        $response = $this->get('/api/v1/notebook/0');
        $response->assertStatus(404);
    }
    public function test_update_notebook()
    {
        $notebook = Notebook::factory()->create();
        $response = $this->putJson('/api/v1/notebook/' . $notebook->id, [
            'email' => 'anotheremail@gmail.com'
        ]);
        $response->assertStatus(200);
    }
    public function test_update_notebook_invalid_data()
    {
        $notebook = Notebook::factory()->create();
        $response = $this->putJson('/api/v1/notebook/' . $notebook->id, [
            'email' => 'anotheremail'
        ]);
        $response->assertStatus(422);
    }
    public function test_delete_notebook()
    {
        $notebook = Notebook::factory()->create();
        $response = $this->delete('/api/v1/notebook/' . $notebook->id);
        $response->assertStatus(204);
    }
    public function test_delete_notebook_invalid_id()
    {
        $response = $this->delete('/api/v1/notebook/0');
        $response->assertStatus(404);
    }
}

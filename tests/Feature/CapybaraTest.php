<?php

namespace Tests\Feature;

use App\Models\Capybara;
use Database\Seeders\CapybaraSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CapybaraTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_capybara_can_be_created()
    {
        $data = Capybara::factory()->raw();

        $this->post('/api/capybaras', $data)->assertSessionHasNoErrors();

        $this->assertDatabaseCount('capybaras', 1);
    }

    public function test_adding_a_capybara_requires_a_name()
    {
        $data = Capybara::factory()->raw(['name' => '']);

        $this->post('/api/capybaras', $data)->assertSessionHasErrors(['name']);
    }

    public function test_adding_a_capybara_requires_a_color()
    {
        $data = Capybara::factory()->raw(['color' => '']);

        $this->post('/api/capybaras', $data)->assertSessionHasErrors(['color']);
    }

    public function test_adding_a_capybara_requires_a_size()
    {
        $data = Capybara::factory()->raw(['size' => '']);

        $this->post('/api/capybaras', $data)->assertSessionHasErrors(['size']);
    }

    public function test_a_capybara_cannot_have_an_invalid_color()
    {
        $data = Capybara::factory()->raw(['color' => 'red']);

        $this->post('/api/capybaras', $data)->assertSessionHasErrors(['color']);
    }

    public function test_a_capybara_cannot_have_an_invalid_size()
    {
        $data = Capybara::factory()->raw(['size' => 'big']);

        $this->post('/api/capybaras', $data)->assertSessionHasErrors(['size']);
    }

    public function test_a_new_capybara_cannot_have_the_same_name_as_an_existing_capybara()
    {
        $this->seed(CapybaraSeeder::class);

        $data = Capybara::factory()->raw(['name' => 'Steven']);

        $this->post('/api/capybaras', $data)->assertSessionHasErrors(['name']);

        $this->assertDatabaseCount('capybaras', 3);
    }
}

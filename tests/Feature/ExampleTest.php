<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
    }

    public function test_kualitas_udara()
    {
        $response = $this->get('/kualitas-udara');

        $response->assertStatus(302);
    }

    public function test_rules()
    {
        $response = $this->get('/rules');

        $response->assertStatus(302);
    }

    public function test_rules_update()
    {
        $response = $this->put('/rules/{id}/update', [
            'co' => 'Rendah',
            'nh3' => 'Rendah',
            'no2' => 'Rendah',
            'grade' => 'Baik',
        ]);

        $response->assertStatus(200);
    }

    public function test_import_rules()
    {
        $response = $this->post('/rules/import_rules', [
            'co' => 'Rendah',
            'nh3' => 'Rendah',
            'no2' => 'Rendah',
            'grade' => 'Baik',
        ]);

        $response->assertStatus(302);
    }
  
}

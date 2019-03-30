<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContactCreateTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_returns_the_contact_on_successfully_creating_a_new_contact()
    {
        $data = [
            'name' => 'Harold Bin',
            'email' => 'harold@gmail.com',
            'phone' => '921-1213',
            'country' => 'Philippines',
            'city' => 'Iligan City',
            'state' => 'MO',
            'zip' => '8000'
        ];

        $response = $this->postJson('/api/contacts', $data);

        $response->assertStatus(200)
            ->assertJson([
                'name' => 'Harold Bin',
                'email' => 'harold@gmail.com',
                'phone' => '921-1213',
                'country' => 'Philippines',
                'city' => 'Iligan City',
                'state' => 'MO',
                'zip' => '8000'
            ]);
    }

    /** @test */
    public function it_returns_appropriate_field_validation_errors_when_creating_a_new_contact_with_invalid_inputs()
    {
        $data = [
            'name' => '',
            'email' => '',
            'phone' => '',
            'country' => '',
            'city' => '',
            'state' => '',
            'zip' => ''
        ];

        $response = $this->postJson('/api/contacts', $data);

        $response->assertStatus(422)
            ->assertJson([
                'name' => ['The name field is required.'],
                'email' => ['The email field is required.'],
                'phone' => ['The phone field is required.'],
                'state' => ['The state must be 2 characters.'],
            ]);

        $data = [
            'name' => 'Harold Bin',
            'email' => 'harold',
            'phone' => '921-1213',
            'country' => '',
            'city' => '',
            'state' => 'MOS',
            'zip' => ''
        ];

        $response = $this->postJson('/api/contacts', $data);

        $response->assertStatus(422)
            ->assertJson([
                'email' => ['The email must be a valid email address.'],
                'state' => ['The state must be 2 characters.'],
            ]);
    }
}

<?php

namespace Tests\Feature\Api;

use App\Contact;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ContactDeleteTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_returns_a_200_success_response_on_successfully_removing_the_contact()
    {
        $contact = factory(Contact::class)->create();

        $response = $this->deleteJson("/api/contacts/{$contact->id}", []);

        $response->assertStatus(200);
    }
}

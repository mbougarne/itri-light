<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class InstallAppTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function get_install_route()
    {
        $response = $this->get('/install');
        $response->assertStatus(200);
    }

    /** @test */
    public function app_installation()
    {
        $logo = UploadedFile::fake()->image('logo.jpg');

        $response = $this->postJson('/install', [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'email' => $this->faker->safeEmail,
            'password' => $this->faker->password,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text,
            'logo' => $logo,
            'admin_email' => $this->faker->safeEmail,
        ]);

        $response->assertCreated();
        $this->assertFileExists($logo->path());
    }
}

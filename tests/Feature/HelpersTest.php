<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Setting;

class HelpersTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * App settings
     *
     * @var \App\Models\Setting
     */
    protected Setting $settings;

    protected function setUp(): void
    {
        parent::setUp();

        $logo = UploadedFile::fake()->image('logo.jpg');

        $this->postJson('/install', [
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

        $this->settings = Setting::first();

    }

    /** @test */
    public function setting_not_null()
    {

        $this->assertNotNull($this->settings);
    }

    /** @test */
    public function app_title_not_empty()
    {
        $this->assertNotEmpty($this->settings->title);
    }
}

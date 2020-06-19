<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExtractDataFromArrayTest extends TestCase
{
    /** @test */
    public function extract_data()
    {
        $request = [
            'first_name' => 'Mourad',
            'last_name' => 'Bougarne',
            'username' => 'mbougarne',
            'email' => 'contact@mbougarne.me',
            'password' => 'mourad01',
        ];

        $response = $this->getData($request);
        $this->assertIsArray($response);
    }

    private function getData(array $data)
    {
        return [
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }
}

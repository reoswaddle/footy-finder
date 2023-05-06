<?php

namespace Tests\Feature;

use App\Services\SportmonksFootball\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SportmonksFootballClientTest extends TestCase
{
    use WithFaker;

    /**
     * Test get players
     */
    public function test_get_players(): void
    {
        $randomLimit = rand(3, 6);

        $data = [];
        for ($i = 0; $i < $randomLimit; $i++) {

            $country = [
                'id' => $i,
                'name' => $this->faker->country,
                'image_path' => $this->faker->imageUrl
            ];

            $position = [
                'name' => $this->faker->randomElement(['Attacker', 'Midfielder', 'Defender', 'Goal Keeper']),
            ];

            $data[] = [
                'id' => $i,
                'firstname' => $firstName = $this->faker->firstName,
                'lastname' => $lastName = $this->faker->lastName,
                'display_name' => "$firstName $lastName",
                'image_path' => $this->faker->imageUrl,
                'date_of_birth' => Carbon::now()->subDays(rand(6000, 20000))->format('Y-m-d'),
                'gender' => rand(0,1) ? 'Male' : 'Female',
                'position' => rand(0, 1) ? $position : null,
                'country' => $country,
            ];
        }

        $uri = config('services.sportmonks-football.uri');
        Http::fake([
            "$uri/*" => Http::response(['data' => $data]),
        ]);

        $client = new Client($uri, 'test-token');
        $players = $client->getPlayers();

        $this->assertNotEmpty($players);
        foreach ($players as $index => $player){
            $this->assertEquals($player->apiId, $data[$index]['id']);
            $this->assertEquals($player->firstName, $data[$index]['firstname']);
            $this->assertEquals($player->lastName, $data[$index]['lastname']);
            $this->assertEquals($player->displayName, $data[$index]['display_name']);
            $this->assertEquals($player->imagePath, $data[$index]['image_path']);
            $this->assertEquals($player->dateOfBirth, Carbon::parse($data[$index]['date_of_birth']));
            $this->assertEquals($player->position, $data[$index]['position']['name'] ?? null);
            $this->assertEquals($player->country->apiId, $data[$index]['country']['id']);
            $this->assertEquals($player->country->name, $data[$index]['country']['name']);
            $this->assertEquals($player->country->imagePath, $data[$index]['country']['image_path']);
        }
    }
}

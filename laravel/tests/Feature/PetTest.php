<?php

namespace Tests\Feature;

use Tests\TestCase;

class PetTest extends TestCase
{
    public $orderedById = [
        0 => [
            'id' => 1,
            'name' => 'Poupi',
            'tag' => 'chien',
        ],
        1 => [
            'id' => 2,
            'name' => 'Praline',
            'tag' => 'chat',
        ],
        2 => [
            'id' => 3,
            'name' => 'Gribouille',
            'tag' => NULL,
        ],
        3 => [
            'id' => 4,
            'name' => 'Chanel',
            'tag' => NULL,
        ],
        4 => [
            'id' => 5,
            'name' => 'Minette',
            'tag' => NULL,
        ],
        5 => [
            'id' => 6,
            'name' => 'Tequila',
            'tag' => NULL,
        ],
        6 => [
            'id' => 7,
            'name' => 'Raptor',
            'tag' => NULL,
        ],
        7 => [
            'id' => 8,
            'name' => 'Attila',
            'tag' => 'chien',
        ],
        8 => [
            'id' => 9,
            'name' => 'Flamby',
            'tag' => NULL,
        ],
        9 => [
            'id' => 10,
            'name' => 'Garfield',
            'tag' => 'chat',
        ],
        10 => [
            'id' => 11,
            'name' => 'Romeo',
            'tag' => NULL,
        ],
        11 => [
            'id' => 12,
            'name' => 'Zigzag',
            'tag' => NULL,
        ],
        12 => [
            'id' => 13,
            'name' => 'Billy',
            'tag' => 'hamster',
        ],
        13 => [
            'id' => 14,
            'name' => 'Biscotte',
            'tag' => NULL,
        ],
        14 => [
            'id' => 15,
            'name' => 'Aslan',
            'tag' => NULL,
        ],
        15 => [
            'id' => 16,
            'name' => 'Caramel',
            'tag' => NULL,
        ],
        16 => [
            'id' => 17,
            'name' => 'Bijou',
            'tag' => 'chat',
        ],
        17 => [
            'id' => 18,
            'name' => 'Scarlett',
            'tag' => NULL,
        ],
        18 => [
            'id' => 19,
            'name' => 'Reglisse',
            'tag' => NULL,
        ],
        19 => [
            'id' => 20,
            'name' => 'Rex',
            'tag' => 'chien',
        ],
    ];

    public $orderedByName = [
        [
            'id' => 15,
            'name' => 'Aslan',
            'tag' => NULL,
        ],
        [
            'id' => 8,
            'name' => 'Attila',
            'tag' => 'chien',
        ],
        [
            'id' => 17,
            'name' => 'Bijou',
            'tag' => 'chat',
        ],
        [
            'id' => 13,
            'name' => 'Billy',
            'tag' => 'hamster',
        ],
        [
            'id' => 14,
            'name' => 'Biscotte',
            'tag' => NULL,
        ],
        [
            'id' => 16,
            'name' => 'Caramel',
            'tag' => NULL,
        ],
        [
            'id' => 4,
            'name' => 'Chanel',
            'tag' => NULL,
        ],
        [
            'id' => 9,
            'name' => 'Flamby',
            'tag' => NULL,
        ],
        [
            'id' => 10,
            'name' => 'Garfield',
            'tag' => 'chat',
        ],
        [
            'id' => 3,
            'name' => 'Gribouille',
            'tag' => NULL,
        ],
        [
            'id' => 5,
            'name' => 'Minette',
            'tag' => NULL,
        ],
        [
            'id' => 1,
            'name' => 'Poupi',
            'tag' => 'chien',
        ],
        [
            'id' => 2,
            'name' => 'Praline',
            'tag' => 'chat',
        ],
        [
            'id' => 7,
            'name' => 'Raptor',
            'tag' => NULL,
        ],
        [
            'id' => 19,
            'name' => 'Reglisse',
            'tag' => NULL,
        ],
        [
            'id' => 20,
            'name' => 'Rex',
            'tag' => 'chien',
        ],
        [
            'id' => 11,
            'name' => 'Romeo',
            'tag' => NULL,
        ],
        [
            'id' => 18,
            'name' => 'Scarlett',
            'tag' => NULL,
        ],
        [
            'id' => 6,
            'name' => 'Tequila',
            'tag' => NULL,
        ],
        [
            'id' => 12,
            'name' => 'Zigzag',
            'tag' => NULL,
        ],
    ];

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test1()
    {
        $this->setName('Pet list endpoint is reachable');
        $response = $this->getJson('/api/v1/pets', ['name' => 'Sally']);

        $response
            ->assertStatus(200);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test2()
    {
        $this->setName('Pet list endpoint contains all pets');
        $response = $this->getJson('/api/v1/pets');

        $response
            ->assertStatus(200)
            ->assertJsonCount(count($this->orderedById));
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test3()
    {
        $this->setName('Pet list endpoint contains all pets correct data');
        $response = $this->get('/api/v1/pets');

        $response
            ->assertStatus(200)
            ->assertExactJson($this->orderedById);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test4()
    {
        $this->setName('Pet list endpoint with sorting works');
        $response = $this->json('GET', '/api/v1/pets', ['order' => '1']);

        $response
            ->assertExactJson($this->orderedByName);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test5()
    {
        $this->setName('One pet endpoint with known id works');
        $response = $this->json('GET', '/api/v1/pets/5');

        $response
            ->assertExactJson([
                'name' => 'Minette',
                'id' => 5,
                'tag' => null
            ]);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test6()
    {
        $this->setName('One pet endpoint with unknown throws a 404');
        $response = $this->json('GET', '/api/v1/pets/55');

        $response
            ->assertStatus(404)
            ->assertJsonStructure(['error']);
    }
}

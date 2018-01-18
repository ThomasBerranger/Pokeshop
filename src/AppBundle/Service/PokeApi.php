<?php
/**
 * Created by PhpStorm.
 * User: tberranger
 * Date: 18/01/2018
 * Time: 14:14
 */

namespace AppBundle\Service;


class PokeApi
{
    private $apiUrl;
    private $pokeUrl;

    public function __construct ()
    {
        $this->apiUrl = 'http://pokeapi.co/api/v2/';
        $this->pokeUrl = $this->apiUrl.'pokemon/';
    }

    public function getPokeInfo ($id)
    {
        $response = file_get_contents($this->pokeUrl.$id);

        return json_decode($response, true);
    }

    public function parseResult($data)
    {
        dump($data);
        $abilities = [];
        foreach ($data['abilities'] as $ability) {
            $abilities[] = $ability['ability']['name'];
        }

        return [
            'name' => $data['name'],
            'abilities' => $abilities
        ];
    }
}
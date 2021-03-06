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
    private $allPokeUrl;


    public function __construct ()
    {
        $this->apiUrl = 'http://pokeapi.co/api/v2/';
        $this->pokeUrl = $this->apiUrl.'pokemon/';
        $this->pokeEvolveChainUrl = $this->apiUrl.'evolution-chain/';
        $this->allPokeUrl = $this->apiUrl.'pokemon/?limit=493&offset=0';
    }


    public function getAllPokemonInfo()
    {
        $response = file_get_contents($this->allPokeUrl);

        return json_decode($response, true);
    }


    public function getOnePokemonInfo ($id)
    {
        $response = file_get_contents($this->pokeUrl.$id);

        return json_decode($response, true);
    }


    public function getPokeEvolveChainUrl ($id)
    {
        $response = file_get_contents($this->pokeEvolveChainUrl.$id);

        return json_decode($response, true);
    }


    public function parseResultOnePokemon($data)
    {
        if (isset($data['types'][0]['type']['name']))
        {
            $type1 = $data['types'][0]['type']['name'];
        }
        else {
            $type1 = null;
        }

        if (isset($data['types'][1]['type']['name']))
        {
            $type2 = $data['types'][1]['type']['name'];
        }
        else {
            $type2 = null;
        }

        return [
            'name' => $data['name'],
            'id' => $data['id'],
            'type1' => $type1,
            'type2' => $type2,
        ];
    }

    public function parseResultEvolutionChain($data)
    {
        $evolution2Names = [];
        $evolution3Names = [];

        if (isset($data['chain']['evolves_to'][0]['species']['name']))
        {
            foreach ($data['chain']['evolves_to'] as $evolution2)
            {
                array_push($evolution2Names, $evolution2['species']['name']);
            }
        }
        else
        {
            $state2 = null;
        }

        if (isset($data['chain']['evolves_to'][0]['evolves_to']))
        {
            foreach ($data['chain']['evolves_to'][0]['evolves_to'] as $evolution3) {
                array_push($evolution3Names, $evolution3['species']['name']);
            }
        }
        else
        {
            $state3 = null;
        }

        return [
            'state1' => $data['chain']['species']['name'],
            'state2' => $evolution2Names,
            'state3' => $evolution3Names,
        ];
    }
}
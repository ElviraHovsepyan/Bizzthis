<?php

namespace App\Http\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class InstagramApi
{
    public $token;
    public $client;

    public function __construct($token)
    {
       $this->client = new Client([
           'base_uri' => 'https://api.instagram.com/v1/',
       ]);
       $this->token = $token;
    }

    public function getUser(){
        if($this->token){
            try{
                $response = $this->client->request('GET', 'users/self/', [
                    'query' => [
                        'access_token' =>  $this->token
                    ]
                ]);
            } catch(GuzzleException $guzzleException){
                dd("Sorry, url not working");
            }

            return json_decode($response->getBody()->getContents())->data;
        }
    }

    public function getPosts(){
        if($this->token){
            try{
                $response = $this->client->request('GET', 'users/self/media/recent/', [
                    'query' => [
                        'access_token' =>  $this->token
                    ]
                ]);
            } catch(GuzzleException $guzzleException){
                dd("Sorry, url not working");
            }

            return json_decode($response->getBody()->getContents())->data;
        }
        return [];
    }

}
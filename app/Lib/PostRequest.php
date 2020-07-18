<?php
namespace App\Lib;
use \GuzzleHttp\Client;
use \GuzzleHttp\Psr7\Request;
use \GuzzleHttp\Psr7;
use \GuzzleHttp\Exception\ClientException;



class PostRequest
{
    public function doPost()
    {
        $this -> executeDoPost();
    }
    private function executeDoPost(){
        /*
        Definimos un cliente HTTP para realizar la solicitu post 
        */
        $httpClient = new Client();
        $request = new Request('POST', 'https://atomic.incfile.com/fakepost', [
                'form_params' => [
                    'field_name' => 'abc',
                    'other_field' => '123',
                    'nested_field' => [
                        'nested' => 'hello'
                    ]
                ]
            ]);
        
        /*
        Identificamos el error si es que existe
        */

        try{
            /*
                    Por medio de una promesa volvemos el proceso asincrono
            */

            $promise = $httpClient->sendAsync($request)->then(function ($response) {
                return 'Siguiente accion';
            });
            $promise->wait();    
            
        } catch (\Exception $e) {

            return $e->getMessage();
        }

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: radoncode
 * Date: 15/02/18
 * Time: 09:40
 */

namespace LP\ReservationBundle\Service;
use Symfony\Component\Config\Definition\Exception\Exception;

class Stripe
{

    private $api_key;
    private $token;
    private $name;
    private $email;


    public function __construct($api_key){

        $this->api_key = $api_key;
    }

    public function setData($token,$name,$email){

       $this->token = $token;
       $this->name = $name;
       $this->email = $email;

    }

    public function customer(){

        $customer = $this->api('customers', [
            'source' => $this->token,
            'description' => $this->name,
            'email' => $this->email
        ]);
        return $customer;

    }

    public function charge($id){

        $charge = $this->api('charges',[
            'amount'=> 1000,
            'currency'=> 'eur',
            'customer'=> $id,

        ]);
        return $charge;
    }

    public function api($endpoint,array $data = null){

        $ch = curl_init();

        curl_setopt_array($ch,[
            CURLOPT_URL => "https://api.stripe.com/v1/$endpoint",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD => $this->api_key,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,

        ]);
        if ($data != null){

            curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
        }
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        if (property_exists($response,'error')){
            throw new Exception($response->error->message);
        }
        return $response;
    }

}
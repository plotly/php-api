<?php
/*
PHP Plotly Api

v.0.0.1

sharif corinaldi ( sharif DOT corinaldi AT gmail )

*/

// the main class
//  manages the session with the plotly server
class Plotly
{
    //
    public $VERSION = '0.0.1';

    public $PlotLyUri = 'https://plot.ly';
    public $PlotLyApiVersion = '0.1';

    // username, api_key
    public $username = null;
    public $api_key = null;
    
    // method declaration
    public function initialize( $username, $api_key, $version = null ) {
        
        $this->username = $username;
        $this->api_key = $api_key;
        if (!is_null( $version )) {
            $this->PlotLyApiVersion = $version; 
        }
    }

    //    
    // submit a request to clientresp
    public function post( $origin, $args, $kw ) {

        $post_vals=array( 'un' => $this->username, 'key' => $this->api_key , 'origin' => $origin , 'platform' => 'php', 'args' =>  json_encode( $args ), 'kwargs' => json_encode( $kw ) );

        $defaults = array(
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_URL => $this->PlotLyUri . "/clientresp",
                CURLOPT_FRESH_CONNECT => 1,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_POSTFIELDS => http_build_query($post_vals)
        );

        $ch = curl_init();
        curl_setopt_array($ch, $defaults);


        if( ! $result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }

        curl_close($ch);
        return $result;
        
    }
    
}

?>

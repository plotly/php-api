<?php
require_once(dirname(__FILE__) . '\..\lib\plotly.php');

//  create the plotly obj
$pl_obj = new Plotly();

//  intialize it with your credentials
$pl_obj->initialize( "Ruby", "a39cxbr965" );

// create the 'args' param
$a=array( array(0, 1, 2), array(3, 4, 5), array(1, 2, 3), array(6, 6, 5) );

// create the 'kwargs' param
$kw=array( 
    "filename" => "plot from api",
    "fileopt" => "overwrite",
    "style" => array( 
                    "type" => "bar",
                ),
    "traces" => array( 1 ),
    "layout" => array( 
                    "title" => "experimental data"
                ),
    "world_readable" => true
);

// plot a graph
$res = $pl_obj->post( "plot", $a, $kw );

//
var_dump( $res );

?>
# php-api

## PHP api based on the REST API defined here:
https://plot.ly/rest/


## Requirements:
* You need to install a PHP extension that let's you submit HTTPS posts to /clientresp

One way to do this is to use the libcurl extension with PHP , as defined here:
http://php.net/curl

* You need a way to make JSON with PHP 

Just use a recent version-- json_encode is bundled with PHP versions >= 5.2


## Usage Example:

**Connecting to the API**

```php

require_once(dirname(__FILE__) . '\..\lib\plotly.php');

//  create the plotly obj
$pl_obj = new Plotly();

//  intialize it with your credentials
$pl_obj->initialize( "Ruby", "a39cxbr965" );

```

**Creating the arguments**

```php

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

```

**Creating the arguments**

```php

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
```

**Plot the graph**

```php
// plot a graph
$res = $pl_obj->post( "plot", $a, $kw );

//
var_dump( $res );

// "{"url": "https://plot.ly/~Ruby/430", "message": "", "warning": "", "filename": "plot from api", "error": ""}"
```


## Common Errors:
* "PHP Notice: SSL certificate problem: self signed certificate in certificate chain in... "

See [this](http://snippets.webaware.com.au/howto/stop-turning-off-curlopt_ssl_verifypeer-and-fix-your-php-config/)

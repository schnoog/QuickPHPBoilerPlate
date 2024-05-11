# Quick Boiler Plate

A small set of code to lauch a php project with
-smarty template engine
-MeekroDB database connection
-Foundation Framework 
-User authentication

## But why

I wanted to start a small (single user) project and even my old PHPBoilerplate was too massive in my opinion.

So I created this thing

## How it works

### What's needed
OK, a webserver with url rewrite enabled running php vesion 8.0 and above
A mysql database and login credentials

### Install
Clone this repo.......
And import the empty_db.sql in the mysql database

### Setup
Copy the inc/config.php.dist to inc/config.php and make the required changes.

If you enable authentification a form to create the first Admin user account will be shown. 

### Own page (that's what all is about)

Let's say you want to have a page with the cars in your database table cars.
#### Direct load
create a file for the page  f.e.  inc/pages/cars.php
In this file you define the template which should be used
```
<?php

$S['sys']['template'] = "cars.tpl";
```
Also assign all the variables you are using in your cars.tpl


Then create the cars.tpl in the inc/template folder (maybe copy the index.tpl and work from there on)

Now you need to create a route for your new page. For this just add another router to the index.php (or any - even new - php file in the inc/routes directory)
```
$router->get('/cars', function () {
    global $selphp, $route_is_set;
    $selphp = 'cars.php';
    $route_is_set = true;
});
```




#### Ajax load
For this you need first to setup the ajax backen  formapi.php

```
$router->any(['POST','GET'],'/api/cars', function () {
    global $S, $returndata;
    $S['sys']['api']['section'] = "cars";

});

//and the function which is called

function fOutputCars(){
    global $S, $data,$mod,$debug;
    $mod = "table";
    $data  = DB::query('Select * from cars');
}
```

Next you need to setup the api-template which is parsed in formapi.php
The basic template is in api_test.tpl. You can either modifiy it there or include a separate template for it
```
{if $section == "cars"}
    {include "api/api_cars.tpl"}
{/if}

```

What is missing the how you execute the ajax call.
You can do that f.e. with a button in the pagepart_navbar.tpl
```
<button type="button" class="button" onclick="fetchDataAndDisplay('/cars','contentholder');">Cars</button>
```
which will execute the ajax call and outputs the content within the div with the id contentholder

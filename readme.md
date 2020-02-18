Installing Server
-------------------------         
            
            $ composer require server
            $ php ./bin/console server:run
            
Symfony Console
-------------------------         

List of all commands:
 
            $ php ./bin/console
                    
Main folders to work with: 
-------------------------
1. src - php code kept here (controllers etc)
2. config - configuration yaml files kept here
3. public - front controller (passively aware.)

Installing a Recipe
-------------------------
$ composer require recipe name package version

            $composer require profiler --dev

Installing Symfony / SpaceBar (symfony cast tutorial)
-------------------------
            $ composer self-update
            $ composer create-project symfony/skeleton the_spacebar '4.4.*'
            $ cd the_spacebar
            $ php -S 127.0.0.1:8000 -t public

Annotation Routes
------------------------- 

            $ composer require annotations

In the controller type /** Enter to autocomplete a route, ex:
            
            /**
             * @Routing\Annotation\Route("/URLname", name="routeName")
             */

All routes defined:

            ./bin/console debug:router
            
            
Installing a Pack and Versioning
-------------------------
1. Navigate to https://flex.symfony.com/ and choose a pack
2. Use alias to install a package, for example:
            
            composer require debug --dev
            
3. composer.json file will show package name, for example:
            
            "symfony/debug-pack":"^1.0".
            
4. This creates a problem of controlling the version of libraries withing the pack. To solve that unpack the pack

            composer unpack debug
            
5. The previous PACK will be removed and the libraries will show instead

            easycorp/easy-log-handler (v1.0.9)
            symfony/monolog-bridge (v5.0.4)
            symfony/monolog-bundle (v3.5.0)
            symfony/debug-bundle (v5.0.4)
            symfony/debug-pack (v1.0.7)

6. From this point onward you can control the versions of the libraries by using constraints

    6.1. Version range: (>, >=, <, <=, !=)
    6.2. Hypenated version range: ( - ) 
    6.3. Next significant release: ~
    6.4. Caret Version Range: ^

            "require": {
                "vendor/package": "1.3.2", // exactly 1.3.2
            
                // >, <, >=, <= | specify upper / lower bounds
                "vendor/package": ">=1.3.2", // anything above or equal to 1.3.2
                "vendor/package": "<1.3.2", // anything below 1.3.2
            
                // * | wildcard
                "vendor/package": "1.3.*", // >=1.3.0 <1.4.0
            
                // ~ | allows last digit specified to go up
                "vendor/package": "~1.3.2", // >=1.3.2 <1.4.0
                "vendor/package": "~1.3", // >=1.3.0 <2.0.0
            
                // ^ | doesn't allow breaking changes (major version fixed - following semver)
                "vendor/package": "^1.3.2", // >=1.3.2 <2.0.0
                "vendor/package": "^0.3.2", // >=0.3.2 <0.4.0 // except if major version is 0
            }
                        
            
Adding Assets:
-------------------------
1. File -> Settings -> "Symfony";
2. Change "web directory" to <b>public</b> (by default should say "web")
3. Autocomplete assets, for example: 

            <link rel="stylesheet" href="/css/font.... and autocomplete.

4. Assets will be added automatically like so:
            
            <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">

Installing and Using Twig (https://twig.symfony.com/)
-------------------------
            
            $ composer require twig
            
To create a twig create a twig file in <b>templates</b>
            
            show.html.twig

Synthax:

            Use {{ }} to print something
            Use {% %} to do something
            Use {# #} to comment

Looping an array with a Twig
-------------------------

Create an array within a method in a controller class:

            $variable = [1,2,3,4,5];

Create a loop in a twig file:
            
            {% for variable in variables %}
                <li>{{ variable }}</li>
            {% endfor %}
            
Count array elements:

            {{ variables|length }}
            
Template Inheritance:
-------------------------

Any new twig file should extend a base twig file on top of each, add this. 

            {% extends 'base.html.twig' %}      
            this means you want to include current TWIG file into base.html.twig  

Blocks:
-------------------------

base.html.twig has this line: {% block body %} - {% endblock %}

Provided your child twig extends base.html.twig, you can replace the content of that block like so:

            {% extends 'base.html.twig' %}
            
            {% block body %}
                <h1>{{ title }}</h1>
                <ul>
                    {% for comment in comments %}
                        <li>{{ comment }}</li>
                    {% endfor %}
                </ul>
            {% endblock %}
            
Same with title:

            {% extends 'base.html.twig' %}
            
            {% block title %}
                {{ title }}
            {% endblock %}

Generating URL with path()
-------------------------
1. Run in console ./bin/console debug:router
2. Copy the NAME of the route
3. User ROUTE NAME in a link

            <a href = {{ path('paste_route_name') }}>

Generating URL with a {wildcard}
-------------------------


Generating AJAX request to store Likes
-------------------------

1. Create a new javascript file in public directory and add:
            
            $(document).ready(function () {
            
            })
2. Add <b>onclick</b> functionality to replace fontawesome icons:

            $('.js-like-article').on('click', function(e) {
               e.preventDefault();
       
               var $link = $(e.currentTarget);
               $link.toggleClass('far fa-heart-o').toggleClass('far fa-heart');
       
               $.ajax({
                   method: 'POST',
                   url: $link.attr('href')
               }).done(function(data) {
                   $('.js-like-article-count').html(data.hearts);
               })
           });
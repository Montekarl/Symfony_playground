-------------------------
Main folders to work with: 
-------------------------
1. src - php code kept here (controllers etc)
2. config - configuration yaml files kept here
3. public - front controller (passively aware.)

-------------------------
Installing a Pack
-------------------------
1. Navigate to https://flex.symfony.com/
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

6. From this point onward you can control the versions of the libraries
-------------------------
Adding Assets:
-------------------------
1. File -> Settings -> "Symfony";
2. Change "web directory" to public (by default "web")
3. Autocomplete assets, for example: 

            <link rel="stylesheet" href="/css/font.... and autocomplete.

4. Assets will be added automatically like so:
            
            <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">

-------------------------
Adding a link:
-------------------------
1. Run in console ./bin/console debug:router
2. Copy the NAME of the route
3. User ROUTE NAME in a link

            <a href = {{ path('paste_route_name') }}>

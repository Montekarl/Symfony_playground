Main folders to keep in mind 
src - php code kept here (controllers etc)
config - configuration yaml files kept here
public - front controller (passively aware.)

debug-pack consists of:
easycorp/easy-log-handler (v1.0.9)
symfony/monolog-bridge (v5.0.4)
symfony/monolog-bundle (v3.5.0)
symfony/debug-bundle (v5.0.4)
symfony/debug-pack (v1.0.7)

For more control over library versions, unpack the pack
$ composer unpack debug

Now instead of DEBUG-PACK, you'll see everything within that pack (composer.json)

And now I'm going to slightly complicate things. Go back into PhpStorm's Preferences, search for "Symfony" and
find the "Symfony" plugin. Change the "web" directory to public - it was called web in Symfony 3.
This is not required, but it will give us more auto-completion when working with assets. Delete the "fontawesome" path, re-type it, and hit tab to auto-complete:
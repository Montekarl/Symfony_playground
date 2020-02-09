<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
class ArticleController
{
    /**
     * @Routing\Annotation\Route("/")
     */
    public function homepage()
    {
        return new Response('Symfony has to return a Response');
    }

    /**
     * @Routing\Annotation\Route("/news/{slug}")
     */
    public function show($slug)
    {
        //return new Response('This is the name of the article');
        return new Response(sprintf(
            'This article is being read directly from URL and is called a slug: "%s"',
            $slug
        ));
    }
}
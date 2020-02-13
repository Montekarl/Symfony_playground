<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Twig\Extra\Intl\IntlExtension;


class ArticleController extends AbstractController
{


    /**
     * @Routing\Annotation\Route("/")
     */
    public function homepage()
    {
        return new Response('This is a homepage');
    }

    /**
     * @Routing\Annotation\Route("/news/{slug}")
     */
    public function show($slug)
    {
        $pics = [
            'https://tse1.mm.bing.net/th?id=OIP.KkCfU0ctV5F92O3ZCJywowHaFj&pid=Api&rs=1&c=1&qlt=95&w=158&h=118',
            'https://tse1.mm.bing.net/th?id=OIP.TR2zLpluL8ZzX0MAb2JSFwHaEK&pid=Api&rs=1&c=1&qlt=95&w=211&h=118',
            'https://tse1.mm.bing.net/th?id=OIP.0zzOiOZpmzCWKvcSwt9rhQHaEK&pid=Api&rs=1&c=1&qlt=95&w=211&h=118'

        ];
        $comments = [
            'I ate a normal rock once, It did NOT taste like bacon',
            'woohoo! I\'m going on an all-asteroid diet',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
            'This is yet another EPIC, grandio COMMMMMMEEENNTTTTTT'
        ];
        $name = 'Karolis';
        //return new Response('This is the name of the article');
//        return new Response(sprintf(
//            'This article is being read directly from URL and is called a slug: "%s"',
//            $slug
//        ));

        return $this->render('article/show.html.twig',[
            'title' => ucwords(str_replace('-','',$slug)),
            'comments' => $comments,
            'pics' => $pics,
            'name' => $name,

        ]);
    }
}
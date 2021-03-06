<?php


namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Twig\Extra\Intl\IntlExtension;


class ArticleController extends AbstractController
{
    /**
     * @Routing\Annotation\Route("/", name="app_homepage") //to get full name run ./bin/console debug:router
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Routing\Annotation\Route("/news/{slug}",name="article_show")
     */
    public function show($slug)
    {
        //dump($slug, $this);
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

    /**
     * @Routing\Annotation\Route("/news/{slug}/heart", name="article_toggle_heart", methods = {"POST"})
     */
    public function toggleArticleHeart($slug)
    {
        //TODO - heart/unheart the article
        return new JsonResponse(['hearts' => random_int(5, 100)]);
        // can also use a shortcut
        //return $this->json(['hearts' => rand(5,100)]);
    }
}
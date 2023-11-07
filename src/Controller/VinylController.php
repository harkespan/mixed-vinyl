<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage()
    {
       return new Response('Title: PB and Jams');
    }

    #[Route("/browse/{slug}")]
    //nama di parameter harus sama dengan di dalam {}
    public function browse(string $slug=null): Response
    {
        if(!is_null($slug))
        {
            $genre = $slug;
        }
        else
        {
            $genre = 'rock';
        }

        $title = ucwords(str_replace("-"," ",$genre));

        return new Response('Breakup vinyl? Angsty 90s '.$title.'? Browse the collection!');
    }
}

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

        $tracks = [
           [ 'song' => 'Gangsta\'s Paradice', 'artist' => 'Coolio'],
            ['song' => 'Waterfalss', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from ad Rose','artist' => 'Seal'],
            ['song' => 'On Bended Knee','artist' => 'Boyz II Men'],
            ['song' => 'Fantasy','artist' => 'Mariah Carey'],
        ];

       return $this->render('vinyl/homepage.html.twig',[
        'title' => 'PB and Jams',
        'tracks' => $tracks,
       ]);
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

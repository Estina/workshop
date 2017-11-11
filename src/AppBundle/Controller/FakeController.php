<?php

namespace AppBundle\Controller;

use AppBundle\Service\Fake;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FakeController extends Controller
{
    /**
     * @Route("/fake/create", name="fake_create")
     * 
     * @param Request $request
     *
     * @return Response
     */
    public function createAction(Request $request)
    {
        
        $name = $request->get('name');

        /** @var Fake $fake */
        $fake = $this->get(Fake::class);
        $fake->addFake($name);

        return new Response('All good');
    }
}
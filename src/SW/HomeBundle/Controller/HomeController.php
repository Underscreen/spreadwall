<?php

namespace SW\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('SWHomeBundle:Home:index.html.twig');
    }
}

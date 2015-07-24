<?php

namespace SW\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SW\UserBundle\Entity\User;

class DashboardController extends Controller
{
    public function indexAction()
    {

    	$repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:User');
    	$users=$repository->findAll();

        return $this->render('SWAdminBundle:Dashboard:index.html.twig', array(
        		'users' => $users
        	));
    }


}

<?php

namespace SW\UserBundle\Controller;

use SW\UserBundle\Entity\User;
use SW\UserBundle\Entity\Category;
use SW\UserBundle\Entity\Activity;
use SW\UserBundle\Entity\Style;
use SW\UserBundle\Entity\Country;
use SW\UserBundle\Form\Type\RegistrationFormType;
use SW\UserBundle\Form\Type\ArtistFormType;
use SW\UserBundle\Form\Type\EditFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\SecurityContext;

class UserController extends Controller
{
	public function loginAction(Request $request)
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('sw_user_account'));
        }

        $session = $request->getSession();

        // On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);

        }

        return $this->render('SWUserBundle:User:login.html.twig', array(
            'error'         => $error,
        ));
    }

    public function registerAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(new RegistrationFormType(), $user);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Bienvenue, votre compte a bien été enregistré. Choisissez le profil qui vous correspond');

            return $this->redirect($this->generateUrl('sw_user_step2'));
        }

        	return $this->render('SWUserBundle:User:register.html.twig', array(
					            'form' => $form->createView(),
        	));
    }

	public function accountAction(){
		// Si le visiteur n'est pas identifié, il est redirigervers le la pagedeconnexion
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('sw_user_login'));
        }

        return $this->render('SWUserBundle:User:my-account.html.twig');
	}

	public function editAction(Request $request){
		// Si le visiteur n'est pas identifié, il est redirigervers le la pagedeconnexion
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('sw_user_login'));
        }

        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new EditFormType(), $user);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Votre profil a bien été modifié.');

            return $this->redirect($this->generateUrl('sw_user_account'));
        }

        return $this->render('SWUserBundle:User:profil-edit.html.twig', array(
            'form' => $form->createView(),
        ));
	}

	public function step2Action()
	{
		return $this->render('SWUserBundle:User:step2.html.twig');
	}

	public function artistRegisterAction(Request $request)
	{
		if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('sw_user_login'));
        }

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("SWUserBundle:Category")->findAll();
		

        return $this->render('SWUserBundle:User:artist-register.html.twig', array(
        		'categories' => $categories,
        	));
	}

	/* On remplit grace à un appel ajax, la listedes activités en fonction de la catégorie parente. */
	public function checkCategoryArtistAction($id )
	{
		$em = $this->getDoctrine()->getManager();
        $activities = $em->getRepository("SWUserBundle:Activity")->findByParent(array( 'category_id' => $id));
	    $listActivities = array();
        if($activities){
        	foreach ($activities as $activity) {
        		$listActivities[] = '<button type="button" class="btn btn-default btn-block act-id" data-id="'.$activity->getId().'">'.$activity->getName().'<span class="float-right glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </button>';
        	}
        }else{
				$listActivities[] = null;
        }

	    $response = new JsonResponse();
	    return $response->setData(array('listActivities' => $listActivities));

	}

    /* On remplit grace à un appel ajax, la listedes activités en fonction de l'activité parente. */
    public function checkActivityArtistAction($id )
    {
        $em = $this->getDoctrine()->getManager();
        $styles = $em->getRepository("SWUserBundle:Style")->findByParent(array( 'activity_id' => $id));
        $listStyles = array();
        if($styles){
            foreach ($styles as $style) {
                $listStyles[] = '<button type="button" class="btn btn-default btn-block sty-id" data-id="'.$style->getId().'">'.$style->getName().'<span class="float-right glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </button>';
            }
        }else{
                $listStyles[] = null;
        }

        $response = new JsonResponse();
        return $response->setData(array('listStyles' => $listStyles));

    }

    public function profilsAction(){

        $repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:User');
        $users = $repository->findAll();

        return $this->render('SWUserBundle:User:profils.html.twig', array(
                    'users' => $users,
                ));

    }

	public function profilAction($id, $slug){

		$repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:User');
		$user = $repository->findOneById($id);

		return $this->render('SWUserBundle:User:profil.html.twig', array(
					'user' => $user,
        		));

	}

    public function addStyleAction($id){
        $em = $this->getDoctrine()->getManager();
        $style = $em->getRepository("SWUserBundle:Style")->findOneById($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $activity = $em->getRepository("SWUserBundle:Activity")->findOneById($style->getParent());
        $category =$em->getRepository("SWUserBundle:Category")->findOneById($activity->getParent());

        $user->addCategory($category);
        $user->addActivity($activity);
        $user->addStyle($style);
        $em->persist($user);
        $em->flush();

        $response = new JsonResponse();
        return $response->setData(array('ok' => 'Ok'));
    }

    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("SWUserBundle:Category")->findAll();

        return $this->render('::includes/sidebar-left.html.twig', array(
                    'categories' => $categories,
                ));
    }
}

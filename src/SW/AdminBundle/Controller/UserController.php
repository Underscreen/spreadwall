<?php

namespace SW\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SW\UserBundle\Entity\User;
use SW\UserBundle\Form\Type\RegistrationFormType;
use SW\UserBundle\Form\Type\EditFormType;
use SW\UserBundle\Entity\Role;
use SW\UserBundle\Entity\Category;
use SW\UserBundle\Form\Type\CategoryFormType;
use SW\UserBundle\Entity\Activity;
use SW\UserBundle\Form\Type\ActivityFormType;
use SW\UserBundle\Entity\Style;
use SW\UserBundle\Form\Type\StyleFormType;


class UserController extends Controller
{
    public function userAction()
    {

    	$repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:User');
    	$users=$repository->findAll();

        return $this->render('SWAdminBundle:User:user.html.twig', array(
        		'users' => $users
        	));
    }

    public function userAddAction(Request $request)
    {
        $user = new User;
        $form = $this->createForm(new RegistrationFormType(), $user);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'L\'utilisateur a bien été ajouté.');

            return $this->redirect($this->generateUrl('sw_admin_members'));
        }


        return $this->render('SWAdminBundle:User:user-add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

        public function userEditAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:User');
        $user=$repository->findOneById($id);
        $form = $this->createForm(new EditFormType(), $user);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Cet utilisateur a bien été modifié.');

            return $this->redirect($this->generateUrl('sw_admin_members'));
        }


        return $this->render('SWAdminBundle:User:user-edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $user->getId()
        ));

    }

    public function userDeleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("SWUserBundle:User")->findOneById($id);
        $em->remove($user);
        $em->flush();
        $request->getSession()->getFlashBag()->add('danger', 'Cet utilisateur a bien été supprimé.');
        return $this->redirect($this->generateUrl('sw_admin_members'));
    }

    /* Prise en charge de toutes les catégories auxquelles peuvent appartenir les membres */
    public function categoryAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:Category');
        $categories=$repository->findAll();

        return $this->render('SWAdminBundle:User:category.html.twig', array(
                'categories' => $categories
            ));
    }

    public function categoryAddAction(Request $request)
    {
        $category = new Category;
        $form = $this->createForm(new CategoryFormType(), $category);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La catégorie a bien été ajoutée.');

            return $this->redirect($this->generateUrl('sw_admin_category'));
        }


        return $this->render('SWAdminBundle:User:category-add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function categoryEditAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:Category');
        $category=$repository->findOneById($id);
        $form = $this->createForm(new CategoryFormType(), $category);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La catégorie a bien été modifiée.');

            return $this->redirect($this->generateUrl('sw_admin_category'));
        }


        return $this->render('SWAdminBundle:User:category-edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $category->getId()
        ));

    }

    public function categoryDeleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository("SWUserBundle:Category")->findOneById($id);
        $em->remove($category);
        $em->flush();
        $request->getSession()->getFlashBag()->add('danger', 'La catégorie a bien été supprimée.');
        return $this->redirect($this->generateUrl('sw_admin_category'));
    }
    /* Prise en charge de toutes les catégories auxquelles peuvent appartenir les membres */

    /* Prise en charge de toutes les activités auxquelles peuvent appartenir les membres */
    public function activityAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:Activity');
        $activities=$repository->findAll();

        return $this->render('SWAdminBundle:User:activity.html.twig', array(
                'activities' => $activities
            ));
    }

    public function activityAddAction(Request $request)
    {
        $activity = new Activity;
        $form = $this->createForm(new ActivityFormType(), $activity);
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $category = $form->get('category.id')->getData();
            $cat_id = $category->getId();
            $activity->setParent($cat_id);
            $em->persist($activity);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'L\'activité a bien été ajoutée.');

            return $this->redirect($this->generateUrl('sw_admin_activity'));
        }


        return $this->render('SWAdminBundle:User:activity-add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function activityEditAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:Activity');
        $activity=$repository->findOneById($id);
        $form = $this->createForm(new ActivityFormType(), $activity);
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $category = $form->get('category.id')->getData();
            $cat_id = $category->getId();
            $activity->setParent($cat_id);
            $em->persist($activity);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'L\'activité a bien été modifiée.');

            return $this->redirect($this->generateUrl('sw_admin_activity'));
        }


        return $this->render('SWAdminBundle:User:activity-edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $activity->getId()
        ));

    }

    public function activityDeleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $activity = $em->getRepository("SWUserBundle:Activity")->findOneById($id);
        $em->remove($activity);
        $em->flush();
        $request->getSession()->getFlashBag()->add('danger', 'L\'activité a bien été supprimée.');
        return $this->redirect($this->generateUrl('sw_admin_activity'));
    }
    /* Prise en charge de toutes les activités auxquelles peuvent appartenir les membres */

    /* Prise en charge de tous les styles auxquelles peuvent appartenir les membres */
    public function styleAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:Style');
        $styles=$repository->findAll();

        return $this->render('SWAdminBundle:User:style.html.twig', array(
                'styles' => $styles
            ));
    }

    public function styleAddAction(Request $request)
    {
        $style = new Style;
        $form = $this->createForm(new StyleFormType(), $style);
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $activity = $form->get('activity')->getData();
            $act_id = $activity->getId();
            $style->setParent($act_id);
            $em->persist($style);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Le style a bien été ajouté.');

            return $this->redirect($this->generateUrl('sw_admin_style'));
        }


        return $this->render('SWAdminBundle:User:style-add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function styleEditAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('SWUserBundle:Style');
        $style=$repository->findOneById($id);
        $form = $this->createForm(new StyleFormType(), $style);
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $activity = $form->get('activity')->getData();
            $act_id = $activity->getId();
            $style->setParent($act_id);
            $em->persist($style);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Le style a bien été modifié.');

            return $this->redirect($this->generateUrl('sw_admin_style'));
        }


        return $this->render('SWAdminBundle:User:style-edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $style->getId()
        ));

    }

    public function styleDeleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $style = $em->getRepository("SWUserBundle:Style")->findOneById($id);
        $em->remove($style);
        $em->flush();
        $request->getSession()->getFlashBag()->add('danger', 'Le style a bien été supprimé.');
        return $this->redirect($this->generateUrl('sw_admin_style'));
    }
    /* Prise en charge de tous les styles auxquelles peuvent appartenir les membres */

}

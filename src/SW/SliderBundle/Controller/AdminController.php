<?php

namespace SW\SliderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SW\SliderBundle\Entity\Slider;
use SW\SliderBundle\Entity\Slide;
use SW\SliderBundle\Entity\Element;
use SW\SliderBundle\Entity\Transition;
use SW\SliderBundle\Form\Type\SliderFormType;
use SW\SliderBundle\Form\Type\SlideFormType;
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminController extends Controller
{

    public function sliderAdminAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager();
        $slider = $repository->getRepository('SWSliderBundle:Slider')->findOneById(1);
        $slides = $slider->getSlides();

        $form = $this->createForm(new SliderFormType(), $slider);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($slider);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Le diaporama a bien été modifié.');

            return $this->redirect($this->generateUrl('sw_admin_slider'));
        }


        return $this->render('SWSliderBundle:Admin:slider-edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $slider->getId(),
        ));

    }

    public function sliderAdminAddSlideAction(Request $request)
    {
        $slide = new Slide;
        $rand = rand(1,40);
        $em = $this->getDoctrine()->getManager();      
        $slider = $em->getRepository('SWSliderBundle:Slider')->findOneById(1);
        $transition = $em->getRepository('SWSliderBundle:Transition')->findOneById($rand);
        $slide->setName('Nouveau Slide');
        $slide->setDelai(1000);
        $slide->setTransition($transition);
        $slide->setSlider($slider);
        $em->persist($slide);
        $em->flush();

        $request->getSession()->getFlashBag()->add('success', 'Le slide a bien été ajouté.');

        return $this->redirect($this->generateUrl('sw_admin_slider'));
    }

        public function sliderAdminAddElementAction($id, Request $request)
    {
        $element = new Element;
        $em = $this->getDoctrine()->getManager();      
        $slide = $em->getRepository('SWSliderBundle:Slide')->findOneById($id);
        $element->setSlide($slide);
        $em->persist($element);
        $em->flush();

        $request->getSession()->getFlashBag()->add('success', 'Le layer a bien été ajouté.');

        return $this->redirect($this->generateUrl('sw_admin_slider'));
    }




}

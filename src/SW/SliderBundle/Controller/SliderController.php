<?php 

namespace SW\SliderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SW\SliderBundle\Entity\Slider;
use SW\SliderBundle\Entity\Slide;
use SW\SliderBundle\Entity\Transition;

class SliderController extends Controller
{
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('SWSliderBundle:Slider');
    	$slider=$repository->findOneByPosition('principal');
        $slides = $slider->getSlides();

        return $this->render('SWSliderBundle:Slider:slider.html.twig', array(
        		'slider' => $slider,
                'slides' => $slides,
        	));
	}


}
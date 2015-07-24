<?php

namespace SW\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SW\MarketPlaceBundle\Entity\Taxe;
use SW\MarketPlaceBundle\Form\Type\TaxeFormType;

class ProductController extends Controller
{
    public function taxeAction()
    {

    	$repository = $this->getDoctrine()->getManager()->getRepository('SWMarketPlaceBundle:Taxe');
    	$taxes=$repository->findAll();

        return $this->render('SWAdminBundle:MarketPlace:taxe.html.twig', array(
        		'taxes' => $taxes
        	));
    }

    public function taxeAddAction(Request $request)
    {
        $taxe = new Taxe;
        $form = $this->createForm(new TaxeFormType(), $taxe);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $taux = $form->get('taux')->getData();
            $tva = 1 + ($taux / 100);
            $taxe->setTva($tva);
            $em->persist($taxe);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La règle de taxe a bien été ajoutée.');

            return $this->redirect($this->generateUrl('sw_admin_taxe'));
        }


        return $this->render('SWAdminBundle:MarketPlace:taxe-add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

        public function taxeEditAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('SWMarketPlaceBundle:Taxe');
        $taxe=$repository->findOneById($id);
        $form = $this->createForm(new TaxeFormType(), $taxe);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $taux = $form->get('taux')->getData();
            $tva = 1 + ($taux / 100);
            $taxe->setTva($tva);
            $em->persist($taxe);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La règle a bien été modifiée.');

            return $this->redirect($this->generateUrl('sw_admin_taxe'));
        }


        return $this->render('SWAdminBundle:MarketPlace:taxe-edit.html.twig', array(
            'form' => $form->createView(),
            'id'   => $taxe->getId()
        ));

    }

    public function taxeDeleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $taxe = $em->getRepository("SWMarketPlaceBundle:Taxe")->findOneById($id);
        $em->remove($taxe);
        $em->flush();
        $request->getSession()->getFlashBag()->add('danger', 'La règle a bien été supprimée.');
        return $this->redirect($this->generateUrl('sw_admin_taxe'));
    }


}

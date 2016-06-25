<?php

namespace Junior\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Junior\EtudeBundle\Entity\Etude;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	if($request->isMethod('POST'))
    	{
    		$etude = new Etude();
    		$etude->setFirstname($request->request->get('firstname'));
    		$etude->setLastname($request->request->get('lastname'));
    		$etude->setEmail($request->request->get('email'));
    		$etude->setPhone($request->request->get('tel'));
		    $etude->setDescription($request->request->get('message'));
		    $em->persist($etude);
		    $em->flush();
		    return $this->render('JuniorWebsiteBundle:Default:index.html.twig', array(
		    	'success' => 'success'
		    ));
		}
        return $this->render('JuniorWebsiteBundle:Default:index.html.twig');
    }

    public function processAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	if($request->isMethod('POST'))
    	{
    		$etude = new Etude();
    		$etude->setFirstname($request->request->get('firstname'));
    		$etude->setLastname($request->request->get('lastname'));
    		$etude->setEmail($request->request->get('email'));
    		$etude->setPhone($request->request->get('tel'));
		    $etude->setDescription($request->request->get('message'));
		    $em->persist($etude);
		    $em->flush();
		    return $this->render('JuniorWebsiteBundle:Default:process.html.twig', array(
		    	'success' => 'success'
		    ));
		}
        return $this->render('JuniorWebsiteBundle:Default:process.html.twig');
    }
}
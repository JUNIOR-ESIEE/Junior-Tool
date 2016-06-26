<?php

namespace Junior\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Junior\EtudeBundle\Entity\Etude;
use Application\Sonata\MediaBundle\Entity\Media;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
        $mediaManager = $this->get('sonata.media.manager.media');
    	if($request->isMethod('POST'))
    	{
            try
            {
        		$etude = new Etude();
        		$etude->setFirstname($request->request->get('firstname'));
        		$etude->setLastname($request->request->get('lastname'));
        		$etude->setEmail($request->request->get('email'));
        		$etude->setPhone($request->request->get('tel'));
    		    $etude->setDescription($request->request->get('message'));

                if($request->files->get('file') != NULL)
                {
                    $file = $request->files->get('file');
                    $ext  = $file->guessExtension();
                    $file = $file->move('uploads', 'cahier_des_charges.'.$ext);
                    $media = new Media;
                    $media->setContext('scopeStatement');
                    $media->setProviderName('sonata.media.provider.file');
                    $media->setBinaryContent($file);
                    $media->setName('Cahier des charges de '.$etude->getFirstname().' '.$etude->getLastname());
                    $mediaManager->save($media);
                    $etude->setScopeStatement($media);
                }
                
    		    $em->persist($etude);
    		    $em->flush();
            }
            catch(\Exception $e)
            {
                return $this->render('JuniorWebsiteBundle:Default:index.html.twig', array(
                    'error' => 'error'
                ));
            }
		    return $this->render('JuniorWebsiteBundle:Default:index.html.twig', array(
		    	'success' => 'success'
		    ));
		}
        return $this->render('JuniorWebsiteBundle:Default:index.html.twig');
    }

    public function processAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
        $mediaManager = $this->get('sonata.media.manager.media');
    	if($request->isMethod('POST'))
    	{
            try
            {
        		$etude = new Etude();
        		$etude->setFirstname($request->request->get('firstname'));
        		$etude->setLastname($request->request->get('lastname'));
        		$etude->setEmail($request->request->get('email'));
        		$etude->setPhone($request->request->get('tel'));
    		    $etude->setDescription($request->request->get('message'));

                if($request->files->get('file') != NULL)
                {
                    $file = $request->files->get('file');
                    $ext  = $file->guessExtension();
                    $file = $file->move('uploads', 'cahier_des_charges.'.$ext);
                    $media = new Media;
                    $media->setContext('scopeStatement');
                    $media->setProviderName('sonata.media.provider.file');
                    $media->setBinaryContent($file);
                    $media->setName('Cahier des charges de '.$etude->getFirstname().' '.$etude->getLastname());
                    $mediaManager->save($media);
                    $etude->setScopeStatement($media);
                }
                
    		    $em->persist($etude);
    		    $em->flush();
            }
            catch(\Exception $e)
            {
                return $this->render('JuniorWebsiteBundle:Default:process.html.twig', array(
                    'error' => 'error'
                ));
            }
		    return $this->render('JuniorWebsiteBundle:Default:process.html.twig', array(
		    	'success' => 'success'
		    ));
		}
        return $this->render('JuniorWebsiteBundle:Default:process.html.twig');
    }
}
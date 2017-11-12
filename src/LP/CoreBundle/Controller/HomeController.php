<?php

namespace LP\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('LPCoreBundle:Home:index.html.twig');
    }

    public function contactAction(Request $request)
    {
    	$session = $request->getSession();
    	$session->getFlashBag()->add('info',"La page de contact n'est pas encore disponible");
    	return $this->redirectToRoute('lp_core_homepage');
    }
}

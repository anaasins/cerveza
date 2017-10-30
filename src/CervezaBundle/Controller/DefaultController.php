<?php

namespace CervezaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CervezaBundle\Entity\Cervezas;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
      //devolver la clase para interactuar con la BBDD
        $repository = $this->getDoctrine()->getRepository(Cervezas::class);
      //sacar lo que queramos de la base de datos
        $cervezas = $repository->findById($id);
        return $this->render('CervezaBundle:Default:index.html.twig', array('cervezas'=>$cervezas));
    }

    public function insertarCervezaAction($nombre, $pais, $poblacion, $tipo)
    {
      //devolver la clase para interactuar con la BBDD
        $repository = $this->getDoctrine()->getRepository(Cervezas::class);
      //sacar lo que queramos de la base de datos
        $cervezas = $repository->findById($id);
        return $this->render('CervezaBundle:Default:index.html.twig', array('cervezas'=>$cervezas));
    }
}

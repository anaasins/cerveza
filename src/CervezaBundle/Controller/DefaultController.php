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

    public function insertarCervezaAction($nombre, $pais)
    {
      $em = $this->getDoctrine()->getManager();

      $cerveza  = new Cervezas();
      $cerveza->setNombre($nombre);
      $cerveza->setPais($pais);
      $cerveza->setPoblacion('poblacion');
      $cerveza->setTipo('tipo');
      $cerveza->setImportacion(true);
      $cerveza->setTamano(20);
      $cerveza->setFechaAlmacen(new \DateTime('10-10-2017'));
      $cerveza->setCantidad(20);
      $cerveza->setFoto('foto');

      $em->persist($cerveza);

      $em->flush();

      return $this->render('CervezaBundle:Default:creada.html.twig');
    }

}

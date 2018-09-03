<?php

namespace App\Controller;

use App\Entity\Product;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product_index", methods="GET")
     */
    public function index()
    {
        $products=$this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('product/index.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/product/new", name="product_new", methods="GET|POST")
     */
    public function new(Request $request)
    {
        $product = new Product();
        $form=$this->createFormBuilder($product)->add('name',TextType::class,array('attr'=> array('class'=>'form-control')))
            ->add('price',TextType::class,array('required'=>false,'attr'=> array('class'=>'form-control')))
            ->add('origin',TextType::class,array('required'=>false,'attr'=> array('class'=>'form-control')))
            ->add('type',TextType::class,array('required'=>false,'attr'=> array('class'=>'form-control')))
            ->add('save',SubmitType::class,array('label'=>'Create','attr'=>array('class'=>'btn btn-[primary mt-3')))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product=$form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/new.html.twig', array(

            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/product/edit/{id}", name="product_edit", methods="GET|POST")
     */
    public function edit(Request $request,$id)
    {
        $product = new Product();
        $product=$this->getDoctrine()->getRepository(Product::class)->find($id);
        $form=$this->createFormBuilder($product)->add('name',TextType::class,array('attr'=> array('class'=>'form-control')))
            ->add('price',TextType::class,array('required'=>false,'attr'=> array('class'=>'form-control')))
            ->add('origin',TextType::class,array('required'=>false,'attr'=> array('class'=>'form-control')))
            ->add('type',TextType::class,array('required'=>false,'attr'=> array('class'=>'form-control')))
            ->add('save',SubmitType::class,array('label'=>'Update','attr'=>array('class'=>'btn btn-[primary mt-3')))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/new.html.twig', array(

            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show($id)
    {
        $product=$this->getDoctrine()->getRepository(Product::class)->find($id);

        return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/product/delete/{id}", name="product_delete", methods="DELETE")
     */
    public function delete(Request $request, $id)
    {
        $product=$this->getDoctrine()->getRepository(Product::class)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        $response=new Response();
        $response->send();
    }
}

<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleController extends Controller{
    /**
     * @Route("/", name="article_list")
     * methods({"GET"})
     */
    public function index(){
       //return new Response('<html><body>Hello</body></html>');

        $articles=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('articles/index.html.twig',array('articles'=>$articles));


    }


    /**
     * @route("/article/new",name="new_article")
     * methods({"GET","POST"})
     */
    public function new(Request $req){
        $article=new Article();
        $form=$this->createFormBuilder($article)->add('title',TextType::class,array('attr'=> array('class'=>'form-control')))
                                                ->add('body',TextareaType::class,array('required'=>false,'attr'=> array('class'=>'form-control')))
                                                ->add('save',SubmitType::class,array('label'=>'Create','attr'=>array('class'=>'btn btn-[primary mt-3')))
                                                ->getForm();
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $article=$form->getData();
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            return $this->redirectToRoute('article_list');
        }
        return $this->render('articles/new.html.twig',array('form'=>$form->createView()));

    }

    /**
     * @route("/article/edit/{id}",name="edit_article")
     * methods({"GET","POST"})
     */
    public function edit(Request $req,$id){

        $article=new Article();
        $article=$this->getDoctrine()->getRepository(Article::class)->find($id);

        $form=$this->createFormBuilder($article)->add('title',TextType::class,array('attr'=> array('class'=>'form-control')))
            ->add('body',TextareaType::class,array('required'=>false,'attr'=> array('class'=>'form-control')))
            ->add('save',SubmitType::class,array('label'=>'Update','attr'=>array('class'=>'btn btn-[primary mt-3')))
            ->getForm();
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){

            $entityManager=$this->getDoctrine()->getManager();

            $entityManager->flush();
            return $this->redirectToRoute('article_list');
        }
        return $this->render('articles/edit.html.twig',array('form'=>$form->createView()));

    }
    /**
     * @route("/article/{id}", name="article_show")
     */
    public function show($id){
        $article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        return $this->render("articles/show.html.twig",array('article'=>$article));
    }

    /**
     * @route("/article/delete/{id}")
     * methods({"DELETE"})
     */
    public function delete(Request $req,$id){
        $article=$this->getDoctrine()->getRepository(Article::class)->find($id);

        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();

        $response= new Response();
        $response->send();

    }
//    /**
//     * @route("/article/save")
//     */
//
//    public function save(){
//        $entityManager=$this->getDoctrine()->getManager();
//        $article=new Article();
//        $article->setTitle('ArticleTwo');
//        $article->setBody('Tis is the body for article two');
//        $entityManager->persist($article);
//        $entityManager->flush();
//
//        return new Response('Saved an article with the id of '.$article->getId());
//
//
//    }
}
<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Lesson;
use AppBundle\Form\LessonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LessonController extends Controller
{
    /**
     * @Route("/lesson", name="lesson")
     */
    public function indexAction()
    {
        // 1. Doctrine
        $em   = $this->getDoctrine()->getManager();
        // 2. Repository (LessonRepository)
        $repo = $em->getRepository('AppBundle:Lesson');
        // 3. findAll()
        $lessons = $repo->findAll();

        return $this->render('lesson/lessons.html.twig', [
            'lessons' => $lessons,
        ]);
    }

    /**
     * @Route("/lesson/create", name="lesson_create")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
        $lesson = new Lesson();
        $form   = $this->createForm(new LessonType(), $lesson);

        return $this->render('lesson/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

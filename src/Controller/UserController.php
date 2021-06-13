<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/register", name="register_user")
     */
    public function registerUser(): Response
    {
        $request = Request::createFromGlobals();
        $entityManager = $this->getDoctrine()->getManager();
        $userRepository = $this->getDoctrine()->getRepository(User::class);

        $users = $userRepository->findBy(array('login'=>$request->get('login')));
//        $users = $userRepository->findBy(array('email'=>$request->get('email')));
        if(is_array($users) && !empty($users)){
            return new Response('zajete');
        }else {
            $user = new User();
            $user->setLogin($request->get('login'));
            $user->setEmail($request->get('email'));
            $user->setPassword($request->get('password'));
            $user->setCreateDate(new \DateTime());

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($user);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            return new Response('Saved new user with id ' . $user->getId());
//        return $this->render('user/index.html.twig', [
//            'controller_name' => 'UserController',
//        ]);
        }
    }

    /**
     * @Route("/user/login", name="login_user")
     */
    public function loginUser(): Response
    {
        $request = Request::createFromGlobals();
        $entityManager = $this->getDoctrine()->getManager();
        $userRepository = $this->getDoctrine()->getRepository(User::class);

        $users = $userRepository->findBy(array('login'=>$request->get('login'), 'password' => $request->get('password')));
        if(is_array($users) && !empty($users)){
            return new Response('true');
        }else {
            return new Response('error');
        }
    }

    /**
     * @Route("/user/show", name="show_users")
     */
    public function showUsers(): Response
    {
        $userRepository = $this->getDoctrine()->getRepository(User::class);
        $users = $userRepository->findAll();
        $dane='<br>';
        foreach ($users as $user){
            $dane.=$user->getId(). ' ' .$user->getLogin() .' '. $user->getCreateDate()->format('Y-m-d H:i:s' ) . '<br>';
        }

        return new Response('All users: '. $dane);
//        return $this->render('user/index.html.twig', [
//            'controller_name' => 'UserController',
//        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Security\UtilisateurAuthenticator;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    public function castParameter(User $parameters) : UserInterface {
        return $parameters;
    }
    /**
     * @Route("/loginmobile" , name="login_mobile" , methods={"GET"})
     */
    public function loginmobile(Request $request, NormalizerInterface $normalizer, UserRepository $usersRepository ,UtilisateurAuthenticator $usersAuthAuthenticator): JsonResponse
    {
        $login = false;
        $password = $request->get("password");
        $mail = $request->get("email");
        $users = $usersRepository->findBy(['email' => $request->get('email')]);
        if (count($users)== 0){
            return new JsonResponse($login);
        }
        $user = array_shift($users);
        $array  = array ("password" => $request->get("password"));

        try {
            $userinter = $this->castParameter($user);
            $login = $usersAuthAuthenticator->checkCredentials($array, $userinter);
            if ($login == true){
                $jsonContent = $normalizer->normalize($user , 'json' , ['groups'=>'post:read']);
                return new JsonResponse($jsonContent);
            }
            //return new JsonResponse($login);
        } catch(\Exception $e){
            return new JsonResponse($login);
        }
        return new JsonResponse($login);

    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');

    }
}
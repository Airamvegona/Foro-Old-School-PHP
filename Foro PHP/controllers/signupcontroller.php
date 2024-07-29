<?php
final class SignupController extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('signup');
    }

    public function newUser()
    {

        $username = trim($this->getPost('user'));
        $email = trim($this->getPost('email'));
        $password = trim($this->getPost('pass'));

        if (empty($username) || empty($email) || empty($password)) {
            session_start();
            $_SESSION['error_message'] = "Por favor, completa todos los campos.";
            
          
        } else {
            // Validar nombre de usuario
            if (!preg_match('/^[a-zA-Z][a-zA-Z0-9]{9,29}$/', $username)) {
                $_SESSION['error_message1'] = "El nombre de usuario debe comenzar con una letra, contener solo caracteres alfanuméricos y tener una longitud entre 10 y 30 caracteres.";
                $this->redirect('signup');
                
            }
        
            // Validar contraseña
            if (!preg_match('/^(?=.*\d)(?=.*[A-Z]).{5,20}$/', $password)) {
                $_SESSION['error_message2'] = "La contraseña debe contener al menos un número, una letra mayúscula y tener una longitud entre 5 y 20 caracteres.";
                $this->redirect('signup');
                exit();
            }
        
            // Resto del código para procesar el registro si no hay errores
        }
        
        $user = new UserModel();

        if ($user->exist($username)) {
            $this->redirect('signup');
            return;
        }

        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPassword($password);
        if ($user->save()) {
            $this->redirect('login');
        } else {
            $this->redirect('signup');
        }
    }
}

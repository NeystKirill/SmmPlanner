<?php 
namespace App\Controller; 
class Login 
{
    public function run() 
    {
        $message = null ; 
        if (isset($_POST['login-email'] , $_POST['login-password'])) 
        {

            $pdo = \App\Service\DB::get_pdo() ; 
            $stmt = $pdo->prepare("
                SELECT * 
                FROM `users`
                WHERE  `email` = :email 
                AND `password` = :password 
                "           
            )  ;
            $stmt->execute([
                ':email' => $_POST['login-email'],
                ':password' => sha1($_POST['login-password']),
            ]) ;
                if ($user = $stmt->fetch())
                {
                    $_SESSION['auth']  = $user ;
                    header('Location: /') ;
                    return ; 
                } else {
                    $message = 'You entered incorrect email or password , please try again'; 
                }
        } 
        
            $view_login = new \App\View\Login() ; 
            $data = [
                "title" => "Log in"  ,
                "messange" => $message 
            ]; 
            $view_login->render($data ) ;   
        
        
    }
    public function run_logout()
    {
        unset($_SESSION['auth']) ; 
        header('Location: /') ; 
        return ;
    }
}
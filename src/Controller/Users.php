<?php 
namespace App\Controller ; 
class Users 
{
    public function run()
    {
        $pdo = \App\Service\DB::get_pdo() ; 
        $stmt = $pdo->prepare("
            SELECT `id` , `email` , `username` , `privilege` 
            FROM `users`
        ") ;
        $stmt->execute() ;
        $view_users =  new \App\View\Users();
        $data = [ 
            "title" => "Users Browsers" ,   
            "page_name" => "Users here:", 
            "users" => $stmt->fetchAll()  
        ] ; 
        $view_users->render($data) ;
    }
    public function runAdd()
    {
        $adding_user = new \App\View\Users\Form() ;
        $data = [ 
            "title" => "Add user" ,
            "page_name" => "Add your new user",  
        ] ; 
        $adding_user->render($data) ;
        
    }
}
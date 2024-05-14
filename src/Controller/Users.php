<?php 
namespace App\Controller ; 
class Users 
{
    public function run()
    {
        $view_users =  new \App\View\Users();
        $data = [
            "title" => "Users" ,
            "page_name" => "Users here:"
        ] ; 
        $view_users->render($data) ;
    }
}
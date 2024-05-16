<?php 
namespace App\Controller ; 
class Users 
{
    public function run()
    {
        $view_users =  new \App\View\Users();
        $data = [
            "title" => "Users Browsers" ,
            "page_name" => "Users her e:"
        ] ; 
        $view_users->render($data) ;
    }
}
<?php 
namespace App\Controller ;
class Insta 
{
    public function run()
    {
        $view_users =  new \App\View\Insta();
        $data = [
            "title" => "Instagarm accounts" ,
            "page_name" => "Your instagram accounts:"
        ] ; 
        $view_users->render($data) ;
    }
}

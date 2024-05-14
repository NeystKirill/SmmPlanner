<?php 
namespace App\Controller ; 
class Main 
{
    public function run()
    {
        $view =  new \App\View\Main();
        $data = [
            "title" => "Home" ,
            "page_name" => "Your InstaPlanner"
        ] ; 
        $view->render($data) ;
    }
}
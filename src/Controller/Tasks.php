<?php 
namespace App\Controller ; 
class Tasks 
{
    public function run()
    {
        $view_users =  new \App\View\Tasks();
        $data = [
            "title" => "Tasks" ,
            "page_name" => "Current Tasks:"
        ] ; 
        $view_users->render($data) ;
    }
}
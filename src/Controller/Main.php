<?php 
namespace App\Controller ; 
class Main 
{
    /**
     * Выведения главной страницы сайта 
     */
    public function run()
    {
        try 
        {
            $current_user_id = $_SESSION['auth']['id'];
            $stmt = \App\Service\DB::getPdo()->prepare("
                SELECT `icon`
                FROM `users` 
                WHERE `id` = :current_user_id");
            $stmt->execute([':current_user_id' => $current_user_id]);
            $icon = $stmt->fetch();
        } catch (\PDOException $e)
        {
            error_log("Icon error: ". $e->getMessage());
            return;
        }
        $view =  new \App\View\Main();
        $data = [
            "title" => "Home" ,
            "page_name" => "Your InstaPlanner" ,
            "user" => $icon
        ] ; 
        $view->render($data) ;
    }
}
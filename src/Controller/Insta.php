<?php 
namespace App\Controller ;
class Insta 
{
     /**
     * Метод для получения валидатора.
     * 
     * @return \App\Service\Validator
     */
    public function run(): void 
    {
        $pdo = \App\Service\DB::getPdo(); 
        $stmt = $pdo->prepare("
            SELECT `id`, `username` , `creator`
            FROM `insta-accounts`
        ");
        try {
            $stmt->execute();
            $accounts = $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage()); 
            $this->renderError('An error occurred while retrieving the accounts' , '/') ;  
        }
        
        $view_accounts =  new \App\View\Insta();
        $data = [
            "title" => "Instagarm accounts" ,
            "page_name" => "Your instagram accounts:" ,
            "users" => $accounts
        ] ; 
        $view_accounts->render($data) ;
    }
    public function runAdd(): void 
    {
        $validator = $this->getValidator();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validator->check($_POST))
        { 
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
            {
                die('CSRF token validation failed');
            }
            $db = \App\Service\DB::getPdo();
            $stmt = $db->prepare("
                INSERT INTO `insta-accounts` (`username` , `password`)
                VALUES  (:username , :password)
                ");
            try {
                $stmt->execute([
                    'username' => $_POST['new-Name'],
                    'password' => sha1($_POST['new-Password']),
                ]);  
                header('Location: /insta'); 
                return;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                $this->renderError("An error occurred while adding the account." , '/insta/add') ; 
                } 
        } 

        $adding_account = new \App\View\InstaAccounts\Form(); 
        $data = [
            "title" => "Add instagram account",
            "page_name" => "Add new instagram account",  
            "data" => $_POST, 
            "messange" => $validator->get_messages(), 
            "check" => $validator->check($_POST)  ,
            "action_to" => $_SERVER['REQUEST_URI']
        ];

        $adding_account->render($data);
    }
    public function runChange($privilege): void  
    {
        if (($privilege == 1 && $_GET['creator'] != $_SESSION['auth']['username']) || $_GET['creator'] == $_SESSION['auth']['username'])
        {
        if (!isset($_GET['id'])) 
        {
           
            header('Location: /insta') ; 
            return ; 
        }

        $pdo = \App\Service\DB::getPdo(); 
        try {
            $stmt = $pdo->prepare("
                SELECT * 
                FROM `insta-accounts` 
                WHERE `id` = :id    
            ") ;
            $stmt->execute(
                [
                    ':id' => $_GET['id']
                ]
            ) ;
            if (! $user = $stmt->fetch())
            {
                $this->renderError('We can\'t find that account!' , '/insta') ; 
            }
            $validator = $this->getValidator(true);
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validator->check($_POST)) 
            {
                if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) 
                {
                    die('CSRF token validation failed');
                }
                if ($_POST['new-Password'] == '' )
                {
                    $stmt = $pdo->prepare("
                    UPDATE `insta-accounts`
                    SET `username` = :username 
                    WHERE `id` = :id
                    "
                    ) ;
                    $stmt->execute([
                        ':username' => $_POST['new-Name'],
                        ':id' => $_GET['id'] 
                    ]) ;
                    header('Location: /insta') ;
                    return;
                } else {
                    $stmt = $pdo->prepare("
                    UPDATE `insta-accounts`
                    SET `username` = :username, `password` = :password 
                    WHERE `id` = :id
                    "
                    ) ;
                    $stmt->execute([
                        ':username' => $_POST['new-Name'],
                        ':password' => sha1($_POST['new-Password']),
                        ':id' => $_GET['id']
                    ]) ;
                    header('Location: /insta') ;
                }
                return ;   
            }
            $change_account = new \App\View\InstaAccounts\Form();
            $data = [
                "title" => "Change instagram account",
                "page_name" => "change instagram data:",  
                "data" => $user ,
                "messange" => $validator->get_messages(), 
                "action_to" => $_SERVER['REQUEST_URI']
            ];

            $change_account->render($data);
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            $this->renderError('An error occurred while trying to change the account. Please try again later.', '/insta');
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $this->renderError('An unexpected error occurred. Please try again later.', '/insta');
        }
    }else 
    {
        // Показ ошибки, если изменение задачи не разрешено
        $this->renderError('You can\'t change data of this user!', '/insta');
        return ; 
    }   
    }
    public function runDelete($privilege): void 
    {
        if (($privilege == 1 && $_GET['creator'] != $_SESSION['auth']['username']) || $_GET['creator'] == $_SESSION['auth']['username'])
        {
        $pdo = \App\Service\DB::getPdo(); 
        try 
        {
            if (isset($_POST['id']))
            {
                $stmt = $pdo->prepare(
                    "
                    DELETE 
                    FROM `insta-accounts`
                    WHERE `id` = :id
                    "
                ) ;
                $stmt->execute([
                    ':id' => $_POST['id']
                ]);
                $stmt->fetch() ;
                header('Location: /insta') ; 
                return ; 
            }
            if (!isset($_GET)) 
            {
            
                header('Location: /insta') ; 
                return ; 
            }
            
            
            $stmt = $pdo->prepare("
                SELECT * 
                FROM `insta-accounts` 
                WHERE `id` = :id    
            ") ;
            $stmt->execute(
                [
                    ':id' => $_GET['id']
                ]
            ) ;
            if (! $user = $stmt->fetch())
            {
                $this->renderError('We cant find that user!' , '/') ; 
            }
            
            $delete = new \App\View\InstaAccounts\FormDelete ;
            $data = [
                "title" => "Delete Instagram account",
                "page_name" => "Delete account data:",  
                "data" => $user ,
                "action_to" =>  [
                    'delete' => $_SERVER['REQUEST_URI'],
                    'cancel' => '/insta'
                ]]; 
            $delete->render($data) ; 
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            $this->renderError('An error occurred while trying to delete the user. Please try again later.' , '/') ; 
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $this->renderError('An unexpected error occurred. Please try again later.' , '/') ; 
        }
    } else 
    {      
        // Показ ошибки, если изменение задачи не разрешено
        $this->renderError('You can\'t change data of this user!', '/insta');
        return ; 
    }

    }
     /**
     * Метод для получения валидатора.
     * 
     * @return \App\Service\Validator
     */
    public function getValidator(bool $ischange = false ): \App\Service\Validator
    {
        $validator = new \App\Service\Validator();
        $validator
            ->set_rule('new-Name', function($value) {
                return !preg_match('/[@#&%$!?*+=\/\\|\[\]{}()\"\'\:;<>,\- ]/' ,  $value); 
            }, 'Name include banned symbols')

            ->set_rule('new-Name', function($value) {
                return preg_match('/^.{3,30}$/', $value); 
            }, 'Name length is incorrect, expected 3-30 symbols')

            ->set_rule('new-Password-check', function($value, $data) {
                return isset($data['new-Password']) && $data['new-Password'] === $value; 
            }, 'Not the same password') 
            ->set_rule('new-Name', function($value) {
                return \App\Service\Validator::exist_account($value) ;
            }, 'Account doesn\'t exist') ;

            if ($ischange) 
            {
                $validator->set_rule('new-Password', function($value) {
                    return $value == '' || preg_match('/.{4,8}$/', $value); 
                }, 'Password is incorrect, expected 4-8 symbols') ;
            } else 
            {
                $validator->set_rule('new-Password', function($value) {
                    return preg_match('/.{4,8}$/', $value); 
                }, 'Password is incorrect, expected 4-8 symbols') ; 
            } 
        return $validator; 
    }
     /**
     * Метод для отображения ошибки пользователю.
     * 
     * @param string $message - Сообщение об ошибке
     * @param string $href - URL для перенаправления
     */
    private function renderError(string $message, string $href): void
    {
        $bug = new \App\Service\SorryBug();
        $data = [
            'problem' => $message,
            'href' => $href
        ];
        $bug->render($data);
        return ; 
    }

}

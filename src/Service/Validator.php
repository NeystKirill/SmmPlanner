<?php 
namespace App\Service; 

class Validator 
{
    private $rules; 
    private $messages;

    public function set_rule(string $name = null, callable $check = null , $message = null) 
    {
        if (!isset($this->rules[$name])) 
        {
            $this->rules[$name] = []; 
            
        }
        $this->rules[$name][] = [
            'check' => $check,
            'message' => $message
        ];
        

        return $this;  
    }

    public function check(array $data) 
    {
        $this->messages = []; 

        foreach ($this->rules as $name => $validators) 
        {
            $value = $data[$name] ?? null;

            foreach ($validators as $validator) 
            {
                if (!$validator['check']($value, $data)) 
                {
                    $this->messages[$name] = $validator['message']; 
                    break; 
                }
            }
        }

        return count($this->messages) == 0;
    }

    static function exist_account($username)
    {
        $url = "https://www.instagram.com/{$username}/";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Для следования за редиректами
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3');
        
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        return $httpCode === 200 ;
    }

    public function get_messages()
    {
        return $this->messages; 
    }
}
 

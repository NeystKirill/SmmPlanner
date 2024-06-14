<?php 
namespace App\Service; 

class Validator 
{
    private $rules; // Массив для хранения правил валидации
    private $messages; // Массив для хранения сообщений об ошибках

    /**
     * Устанавливает правило валидации для определенного поля.
     * 
     * @param string $name Название поля
     * @param callable $check Функция проверки поля
     * @param string $message Сообщение об ошибке, если проверка не пройдена
     * @return $this Возвращает себя для возможности цепочки методов
     */
    public function set_rule(string $name = null, callable $check = null , $message = null): self
    {
        if (!isset($this->rules[$name])) 
        {
            $this->rules[$name] = []; // Инициализация массива для нового поля, если необходимо
        }
        $this->rules[$name][] = [
            'check' => $check,
            'message' => $message
        ]; 
        return $this;  
    }

    /**
     * Проверяет данные на соответствие установленным правилам.
     * 
     * @param array $data Данные для проверки
     * @return bool Возвращает true, если все проверки пройдены успешно
     */
    public function check(array $data): bool 
    {
        $this->messages = []; // Очистка предыдущих сообщений об ошибках

        foreach ($this->rules as $name => $validators) 
        {
            $value = $data[$name] ?? null; // Получение значения поля или null

            foreach ($validators as $validator) 
            {
                if (!$validator['check']($value, $data)) // Выполнение функции проверки
                {
                    $this->messages[$name] = $validator['message']; // Сохранение сообщения об ошибке
                    break; // Прерывание цикла после первой неудачной проверки
                }
            }
        }

        return count($this->messages) == 0; // Возвращает true, если ошибок нет
    }

    /**
     * Проверяет существование аккаунта по имени пользователя на Instagram.
     * 
     * @param string $username Имя пользователя на Instagram
     * @return bool Возвращает true, если аккаунт существует
     */
    static function exist_account($username): bool
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
    
        return $httpCode === 200 ; // 200 OK означает, что страница существует
    }

    /**
     * Возвращает массив сообщений об ошибках валидации.
     * 
     * @return array Массив сообщений об ошибках
     */
    public function get_messages()
    {
        return $this->messages; 
    }
}

<?php

class Curl
{
  /**
   * Экземпляр курла
   */
  private $ch;
  /**
   * Хост - базовая часть урла без слеша на конце
   */
  private $host;

  /**
   * Инициализация класса для конкретного домена
   */
  public static function app($host)
  {
    return new self($host);
  }

  private function __construct($host)
  {
    $this->ch = curl_init();
    $this->host = $host;
    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
  }
  /**
   * Закрытие соединения
   */
  public function __destruct()
  {
    curl_close($this->ch);
  }
  /**
   * Установка опций курла
   */
  public function set($option, $value)
  {
    curl_setopt($this->ch, $option, $value);
    return $this;
  }
  /**
   * Метод запроса на адрес
   */
   public function request($url)
   {
     curl_setopt($this->ch, CURLOPT_URL, $this->makeUrl($url));
     $data = curl_exec($this->ch);
     return $data;
   }
   /**
    * Метод преобразует url /
    */
   private function makeUrl($url)
   {
     if('/' !== isset($url[0])){
       $url = '/' . $url;
     }
      return $this->host . $url;
   }
}

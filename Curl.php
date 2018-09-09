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
   /**
    * Метод преобразует $data, отделяя заголовки от тела сообщения
    */
   private function processResult($data)
   {
      $p_n = "\n";
      $p_rn = "\r\n";

      $h_end_n = strpos($data, $p_n . $p_n); // int or false
      $h_end_rn = strpos($data, $p_rn . $p_rn); // int or false
      $start = $h_end_n; // h_end_n int
		$p = $p_n;		 // \n

		if($h_end_n === false || $h_end_rn < $h_end_n){
			$start = $h_end_rn;
			$p = $p_rn;
		}

		$headers_part = substr($data, 0, $start);
		$body_part = substr($data, $start + strlen($p) * 2);

		$lines = explode($p, $headers_part);
		$headers = array();

		$headers['start'] = $lines[0];

		for($i = 1; $i < count($lines); $i++){
			$del_pos = strpos($lines[$i], ':');
			$name = substr($lines[$i], 0, $del_pos);
			$value = substr($lines[$i], $del_pos + 2);
			$headers[$name] = $value;
		}

		return array(
			'headers' => $headers,
			'html' => $body_part
		);

   }
}

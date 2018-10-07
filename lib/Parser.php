<?php

/**
 * Class Parser for native parse
 */
class Parser
{
    /**
     * Cursor 
     * 
     * @var int
     */
    private $cur;
    
    /**
     * String
     * 
     * @var string
     */
    private $str;
    
    /**
     * 
     * @param string $str
     * @return string
     */
    public static function app($str): string
    {
        return new self($str);
    }
    
    /**
     * Constructor class Parser
     * 
     * @param string $str
     */
    private function __construct($str)
    {
        $this->str = $str;
        $this->cur = 0;
    }
    
    /**
     * 
     * @param type $pattern
     * @return boolean
     */
    public function moveTo($pattern)
    {
        $res = strpos($this->str, $pattern, $this->cur);
        
        if ($res === false) {
            return -1;
        }
            
         $this->cur = $res;
         
         return true;
    }
    
    /**
     * 
     * @param type $pattern
     * @return boolean
     */
    public function moveAfter($pattern)
    {
        $res = strpos($this->str, $pattern, $this->cur);
        
        if ($res === false) {
            return -1;
        }
            
         $this->cur = $res + strlen($pattern);
         
         return true;
    }
    
    /**
     * 
     * @param type $pattern
     * @return type
     */
    public function readTo($pattern)
    {
        $res = strpos($this->str, $pattern, $this->cur);
        
        if ($res === false) {
            return -1;
        }
            
        $out = substr($this->str, $this->cur, $res - $this->cur);          
        $this->cur = $res;
        
        return $out;
    }
    
   /* 
    
    public function readFrom($pattern){
    
    }
    
    subtag('<table class="infobox', '<table', '</table>')
    
    public function subtag($start, $open, $close){
    
    } */
}
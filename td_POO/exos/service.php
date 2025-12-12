<?php
class Service {

    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getData()
    {
        if(!$this->isValid())
        {
            trigger_error('Not an URL', E_USER_ERROR);
        }
        return file_get_contents($this->url);
    }

    private function isValid()
    {
        return preg_match('/^https?:\/\/(?:www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b(?:[-a-zA-Z0-9()@:%_\+.~#?&\/=]*)$/', $this->url);
    }
}


class MyClass {
    public function carreEnDessousDeDix($num) {
        if ($num >= 10) {
            throw new InvalidArgumentException('Le nombre doit être strictement inférieur à 10.');
        }
        return $num * $num;
    }
}
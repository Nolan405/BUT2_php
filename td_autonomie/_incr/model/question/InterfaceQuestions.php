<?php

namespace model\question;

interface Interfacequestions{

    public function getName();

    public function getType();

    public function getText();

    public function getAnswer();
    
    public function getScore();

    public function getChoices();
}
?>
<?php

namespace model\question;

class Questions implements InterfaceQuestions{
  
  private string $name;
  private string $type;
  private string $text;
  private string $answer;
  private int $score;
  private array $choices;

  public function __construct(string $name, string $type, string $text, string $answer, int $score, array $choices) {
      $this->name = $name;
      $this->type = $type;
      $this->text = $text;
      $this->answer = $answer;
      $this->score = $score;
      $this->choices = $choices;
  }

  public function getName() {
    return $this->name;
  }

  public function getType() {
    return $this->type;
  }

  public function getText() {
    return $this->text;
  }

  public function getAnswer() {
    return $this->answer;
  }

  public function getScore() {
    return $this->score;
  }

  public function getChoices() {
    return $this->score;
  }
}
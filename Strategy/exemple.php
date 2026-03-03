<?php

interface Rules {
  function colorRepartition();
}

class CodeNames implements Rules {
  private $rules;

  public function __construct()
  {
  }

  public function colorRepartition() {
    $this->rules->colorRepartition();
  }

  public function setRules(Rules $rules) {
    $this->rules = $rules;
  }
}

class TwoPlayersStrategy implements Rules {
  
  public function colorRepartition() {
    echo "Répartition des couleurs pour 2 joueurs (vert/blanc/noir)";
  }
}

class FourPlayersStrategy implements Rules {
  
  public function colorRepartition() {
    echo "Répartition des couleurs pour 4 joueurs (rouge/bleu/blanc/noir)";
  }
}

$game = new CodeNames();
$twoplayers = new TwoPlayersStrategy();
$fourplayers = new FourPlayersStrategy();

$game->setRules($twoplayers);
$game->colorRepartition();

$game->setRules($fourplayers);
$game->colorRepartition();
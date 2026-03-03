<?php

interface ChairInterface {
  function sit();
  function balance();
}

class Chair implements ChairInterface {
  function sit() {
    echo "Vous êtes assis sur la chaise";
  }

  function balance() {
    echo "Vous vous balancez sur la chaise";
  }
}

class Tabouret implements ChairInterface {
  function sit() {
    echo "Vous êtes assis sur le tabouret";
  }
  
  function balance() {
    echo "Vous vous balancez sur le tabouret";
  }
}

interface ChairFactoryInterface {
  function create(string $chair): ChairInterface;
}

class ChairFactory implements ChairFactoryInterface{
  public function __construct() {
  }

  public function create(string $chair): ChairInterface {
    switch($chair) {
      case "chair": 
        return new Chair();
        break;
      case "tabouret":
        return new Tabouret();
        break;
      default:
        throw new UnexpectedValueException("Format '$chair' not supported");
    }
    
  }
}

$factory = new ChairFactory();
$factory->create("chair");
$factory->create("tabouret");
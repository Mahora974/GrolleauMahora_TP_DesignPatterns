<?php

// Interface commune

interface Vehicule
{
    public function price(): float;
    public function optionList(): string;
}

// Composant Concret
// Classe de base, sans décorateurs
class Voiture implements Vehicule
{
    public float $price = 20000;

    public function price(): float
    {
        return $this->price;
    }

    public function optionList(): string
    {
        return '';
    }
}

// Décorateur de base
// Permet de récupérer l'objet de base et d'appliquer la logique suplémentaire des décorateurs au composant concret
abstract class VoitureDecorateur implements Vehicule
{
    public Vehicule $voiture;

    public function __construct(Vehicule $voiture)
    {
        $this->voiture = $voiture;
    }

    public abstract function price(): float;
    public abstract function optionList(): string;
}

// Décorateur concret
// Applique ses traitements supplémentaire à l'objet de base via le décorateur de base
class ToitOuvrant extends VoitureDecorateur
{

    public function price(): float
    {
        return $this->voiture->price() + 200;
    }

    public function optionList(): string
    {
        return $this->voiture->optionList() . ' - Toit ouvrant';
    }
}

// Décorateur concret
// Applique ses traitements supplémentaire à l'objet de base via le décorateur de base
class CameraRecul extends VoitureDecorateur
{
    public function price(): float
    {
        return $this->voiture->price() + 150.6;
    }

    public function optionList(): string
    {
        return $this->voiture->optionList() . ' - Caméra de recul';
    }
}


$basicCar = new Voiture();
var_dump($basicCar->price());
var_dump($basicCar->optionList());

$oneOption = new ToitOuvrant(new Voiture());
var_dump($oneOption->price());
var_dump($oneOption->optionList());

$twoOption = new CameraRecul(new ToitOuvrant(new Voiture()));
var_dump($twoOption->price());
var_dump($twoOption->optionList());

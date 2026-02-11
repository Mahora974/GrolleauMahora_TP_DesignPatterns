<?php

interface Poubelle
{
    public function sortirLaPoubelle(): void;
    public function rangerLaPoubelle(): void;
}

class Eboueurs
{
    /** @var Poubelle[] $poubelles */
    private array $poubelles = [];


    public function addPoubelle(Poubelle $poubelle)
    {
        $this->poubelles[] = $poubelle;
    }
    public function removePoubelle(Poubelle $poubelle)
    {
        unset($this->poubelles[key($poubelle)]);
    }

    public function attentionPassage()
    {
        echo "Début du passage : \n ";
        foreach ($this->poubelles as $poubelle) {
            $poubelle->sortirLaPoubelle();
        }
    }

    public function finDuPassage()
    {
        echo "Fin du passage : \n ";
        foreach ($this->poubelles as $poubelle) {
            $poubelle->rangerLaPoubelle();
        }
    }
}


class PoubellePrivée implements Poubelle
{
    private bool $plein = true;
    private bool $sortie = false;


    public function sortirLaPoubelle(): void
    {
        if ($this->plein) {
            $this->sortie = true;
            echo "La poubelle est sortie \n ";
        }
    }

    public function rangerLaPoubelle(): void
    {
        if ($this->sortie) {
            $this->sortie = false;
            $this->plein = false;
            echo "La poubelle est rangée \n ";
        }
    }
}

class PoubellePublique implements Poubelle
{

    public function sortirLaPoubelle(): void
    {
        echo "La poubelle est sortie \n ";
    }

    public function rangerLaPoubelle(): void
    {
        echo "La poubelle est rangée \n ";
    }
}

$eboueur = new Eboueurs();
$eboueur->addPoubelle(new PoubellePrivée());
$eboueur->addPoubelle(new PoubellePrivée());
$eboueur->addPoubelle(new PoubellePrivée());
$eboueur->addPoubelle(new PoubellePublique());

$eboueur->attentionPassage();
$eboueur->finDuPassage();

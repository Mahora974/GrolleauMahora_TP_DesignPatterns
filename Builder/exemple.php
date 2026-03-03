<?php

interface Drawing {
  public function sketch();
  public function lineart();
  public function applats();
  public function highlights();
  public function shadows();
}

class DigitalDrawingBuilder implements Drawing {

  private $drawing;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->drawing = new DigitalDrawing();
    }

    public function sketch() {
      $this->drawing->steps[] = 'Réaliser le croquis';
    }

    public function lineart() {
      $this->drawing->steps[] = 'Tracer les contours';
    }

    public function applats()
    {
      $this->drawing->steps[] = 'Mettre les applats de couleurs';
    }

    public function highlights()
    {
           $this->drawing->steps[] = 'Ajouter les lumières';
    }

    public function shadows() {
      $this->drawing->steps[] = 'Ajouter les ombres';
    }
}

class DigitalDrawing {
  public $steps = [];
}

class TradDrawingBuilder implements Drawing {

  private $drawing;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->drawing = new TradDrawing();
    }

    public function sketch() {
      $this->drawing->steps[] = 'Chercher les crayons et réaliser le croquis';
    }

    public function lineart() {
      $this->drawing->steps[] = 'Tracer les contours';
    }

    public function applats()
    {
      $this->drawing->steps[] = 'Mettre les applats de couleurs';
    }

    public function highlights()
    {
      $this->drawing->steps[] = 'Ajouter les lumières';
    }

    public function shadows() {
      $this->drawing->steps[] = 'Ajouter les ombres';
    }
}

class TradDrawing {
  public $steps = [];
}
class DrawingDirector {
  private $builder;

  public function setBuilder(Drawing $builder): void
    {
        $this->builder = $builder;
    }

    public function justSketch() {
      $this->builder->sketch();
    }

    public function coloringDrawing() {
      $this->builder->sketch();
      $this->builder->lineart();
    }

    public function fullpiece() {
      $this->builder->sketch();
      $this->builder->lineart();
      $this->builder->applats();
      $this->builder->highlights();
      $this->builder->shadows();
    }
}

$director = new DrawingDirector();
$digitalBuilder = new DigitalDrawingBuilder();
$director->setBuilder($digitalBuilder);
$director->justSketch();

$tradBuilder = new TradDrawingBuilder();
$director->setBuilder($tradBuilder);
$director->justSketch();
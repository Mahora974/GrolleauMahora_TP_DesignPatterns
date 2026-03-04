<?php

interface Car {
  public function lockDoors();
}

interface Scoot {
  public function raiseFrontWheel();
}

class ElectricCar implements Car {
  function lockDoors() {
    echo "Click";
  }
}

class ElectricScoot implements Scoot {
  function raiseFrontWheel() {
    echo "Brrrr Brrrr";
  }
}

class DieselCar implements Car {
  function lockDoors() {
    echo "Click";
  }
}

class DieselScoot implements Scoot {
  function raiseFrontWheel() {
    echo "Brrrr Brrrr";
  }
}

interface VehiculeFactoryInterface {
  function createScoot(): Scoot;
  function createCar(): Car;
}

class ElectricVehiculeFactory implements VehiculeFactoryInterface{
  public function __construct() {
  }

  public function createScoot(): Scoot {
    return new ElectricScoot();
  }

  public function createCar(): Car {
    return new ElectricCar();
  }
}

class DieselVehiculeFactory implements VehiculeFactoryInterface{
  public function __construct() {
  }

  public function createScoot(): Scoot {
    return new DieselScoot();
  }

  public function createCar(): Car {
    return new DieselCar();
  }
}
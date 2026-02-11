<?php

// Classe qui va être notre singleton
class Application
{

    private static ?Application $instance = null; // Stockage de l'instance
    private string $test = "Hello"; // Variable pour tester

    // Privatisation du constructeur -> impossible d'appeler new Application() en dehors de la classe
    private function __construct() {}

    // Méthode de récupération de l'instance
    public static function getApplication()
    {
        // Si l'instance n'existe pas, on la créer
        if (!self::$instance) {
            self::$instance = new Application();
        }
        return self::$instance;
    }

    public function getTest(): string
    {
        return $this->test;
    }

    public function setTest(string $newTest): void
    {
        if (!preg_match('/[a-z][A-Z]/', $newTest)) {
            throw new InvalidArgumentException('$test is invalid');
        }
        $this->test = $newTest;
    }
}

$application = Application::getApplication();
var_dump($application);
$application->setTest("changed");
var_dump($application);

// Même en essayant de créer une autre application, on retrouve le même objet ($test reste modifié)
// Dans une classe classique, var_dump($notNewApplication); aurait retouné "Hello"
$notNewApplication = Application::getApplication();
var_dump($notNewApplication);

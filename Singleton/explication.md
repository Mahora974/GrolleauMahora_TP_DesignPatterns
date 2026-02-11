# Singleton

## Problèmatique de départ

**Premier problème :** Quand une classe est instanciée classiquement, un nouvel objet est créé à chaque fois. En effet, si l'objet n'est pas stocké dans une variable, il est impossible de le récupérer et il sera supprimé à la fin de son utilisation. 

Donc, si on a besoin d'avoir une seule instance persistante, il est impossible de garantir de garder le même objet partout dans le code.

**Deuxième problème :** Lorsqu'on a besoin d'une même information partout, on a tendance à la stocker dans une variable globale, car cela permet déjà d'éviter de répéter du même code partout. Seulement, celle-ci peut être modifiée de partout et peut entraîner des bugs.

> En résumé, l'**uncité** (éviter la création de plusieurs objets ou la duplication de code), la **persistance** (garder en mémoire ce même objet), la **disponibilité** (rendre l'objet disponible partout) et l'**intégrité** (garantir que la donnée soit la bonne) de la donnée : voilà les 4 points que le singelton va chercher à résoudre.

## Principe et fonctionnement

Le principe du **Singleton** est donc de rendre disponible **globalement** des informations **persistantes** en crééant une classe qui n'aura qu'une seule instance, disponible partout.

Pour cela, on va **privatiser** le constructeur de la classe (pour ne pas autoriser la création d'instance de n'importe où), et créer une méthode **statique** qui va retourner l'instance stockée. Si elle n'existe pas, la méthode appelera le constructeur pour la créer.

## Structure

La structure est assez simple : on part d'une classe, et on encapsule la méthode ``__construct`` en `private`. On ajoute une nouvelle méthode **statique** qui se chargera de retourner l'objet stocké ou de le créer s'il n'existe pas.

On va également prévoir une variable **statique** et **privée** pour stocker l'instance.

[Retrouvez ici un exemple](exemple.php)

## Avantages / Inconvénients

|                                                      Avantages                                                     |                                                    Inconvénients                                                   |
|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| La classe a forcément une seule instance                                                                           | En résolvant plusieurs problème, le singleton casse le **SRP** (Single Responsability Principle)                   |
| L'instance est accessible de n'importe où                                                                          | Les tests unitaires peuvent être compliqué si la dépendance a été mal gérée                                        |
| Facile à rédiger                                                                                                   | Peut rendre le traçage des erreurs plus compliqué.                                                                 |

## Cas d'usages

 - Eviter de configurer la connexion à la base de données plusieurs fois
 - Stocker avec un meilleur contrôle d'intégrité les variables globales
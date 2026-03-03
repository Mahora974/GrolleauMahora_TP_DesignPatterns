# State

[Retour au sommaire](../readme.md)

## Problèmatique de départ

Certains objets navigue entre plusieurs états fixes, et pour chaque états, les méthodes et les états auquels ils peuvent transistionner sont différents. Cela peut être gérer par des if ou des switch, mais en cas de différences importantes ou de beaucoup d'états, le code peut devenir très lourd.

## Principe et fonctionnement

Le principe est de séparer les différents **états** par classes implémentant la même interface commune et que la **classe parent** délègue toute ses tâches à l'état en cours.

Ce design pattern est similaire aux **[strategies](../Strategy/explication.md)**, à la différence que les états peuvent se voir entre eux alors que les stratégies non.

## Structure

La **classe parent** qui naviguera entre cette étape contient tous les comportements que l'objet devra t'avoir qu'importe son état. Elle stockera également en attribut l'état actuel de l'objet.

On créée ensuite une interface qui contient toutes les méthodes relative aux états et on l'implémente dans la classe parent et dans les états.

Les **états** peuvent aussi changer l'état de la classe parent.

[Exemple](./exemple.php)

## Avantages / Inconvénients

|                                                      Avantages                                                     |                                                    Inconvénients                                                   |
|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| Les différents états sont séparés : SRP | Risque de duplication de code  |
| Ajout d'état sans modifier l'existant : Open/Close Principle |  |
| Simplification du code |  |

## Cas d'usage

- Ticketing
- Jeux vidéos 
- 
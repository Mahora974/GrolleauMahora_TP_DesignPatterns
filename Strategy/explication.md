# Strategy

[Retour au sommaire](../readme.md)

## Problèmatique de départ

Lors du développement, on peut être ammené à faire grossir une fonction existante pour gérer plusieurs cas. Seulement, si cette fonction grossi trop, elle peut devenir immaintenable.

## Principe et fonctionnement

Pour résoudre ce cas de figure, on a besoin de séparer les cas. C'est là que les **stratégies** interviennent. 

Le principe est de séparer les cas de la fonctions en plusieurs **stratégies** qui implémente la même **interface**. La **stratégie** est choisie au moment de l'instanciation de l'objet. Les **stratégies** sont appelées par un **contexte** (la classe originale ou la fonction était présente).

## Structure

On créée une interface qui contient la fonction qui doit être séparée par cas. L'interface est implementée dans la classe originale (le **contexte**), et cette classe aura également un attribut pour stocker sa stratégie. 
Chacune des **stratégies** implémentera également la même interface.

[Exemple](./exemple.php)

## Avantages / Inconvénients

|                                                      Avantages                                                     |                                                    Inconvénients                                                   |
|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| Séparation des détails par stratégie | Le code qui appelle les statégies doit savoir laquelle choisir |
| On peut ajouter des cas sans modifier un bloc de code existant : principe ouvert/fermé | Certains langages permettent d'avoir le même résultats sans s'encombrer de nouvelles classes et interfaces |
| Le code est plus lisible |  |

## Cas d'usage

- Grande fonction avec beaucoup de cas assez différents à refactoriser pour la maintenabilité
- Classes très similaires en dehors d'une fonction commune qui change de logique (mais pas d'intention)
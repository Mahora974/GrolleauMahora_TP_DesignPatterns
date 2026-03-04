# Abstract Factory

[Retour au sommaire](../readme.md)

## Problèmatique de départ

Quand on créée différentes classes avec différentes variantes réparties sur ses classes, il peut être difficile de trouver un moyen simple et propre de créer des objets avec la bonne classe et la bonne variante.

## Principe et fonctionnement

L'idée, pour résoudre ce problème, est de faire une interface de **Factory** (voir [Factory Method](../Factory_Method/explication.md)). Chaque classe aura sa **Factory** avec ses différentes variantes qui implémente l'interface de **Factory**.

De la même manière les variantes d'un classe sont réunis sous la même interface qui est appelée dans l'interface de **Factory**

## Structure

Chaque famille de classe à son **interface** qui sera appelée dans l'interface pour les Factories, appelée **Abstract Factory** (ou **fabrique abstraite** en français).

Cette **fabrique abstraite** est implementée dans les **fabriques concrètes** qui sont spécialisées par variante.

[Exemple](./exemple.php)

## Avantages / Inconvénients


|Avantages|Inconvénients|
|---------|-------------|
| Séparation de la création des objets de leur classe : Principe de responsabilité unique | Ajoute beaucoup de sous classe : peut rendre le code complexe |
| Ajout facile de nouveau éléments dans le Factory : principe ouvert/fermé |  |

## Cas d'usage

- Les objets changent régulièrement de types
- On ne connait pas le type de l'objet à l'avance
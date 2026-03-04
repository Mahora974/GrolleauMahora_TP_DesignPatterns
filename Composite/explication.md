# Composite

[Retour au sommaire](../readme.md)

## Problèmatique de départ

En développement, on peut se retrouver avec des **classes récursives**, c'est-à-dire qu'elle peuvent contenir des objets de la même classe en attributs. Seulement, dans ce cas, il peut être difficile de faire des calculs sur tout les enfants de l'objets "parents" (tous les objets qui sont emboité et sous emboité), car une simple boucle ne pourra pas tout parcourir.

## Principe et fonctionnement

Le principe du design **composite** est donc d'implementer une interface qui va contenir une fonction de calcul dans tout les objets qui vont être impliqué. Ensuite, chaque objet va faire le calcul uniquement pour ses enfants directs (qui conteindront les résultats de ses petits-enfants). 

## Structure

Une interface avec la fonction de calcul est implémentée dans les classes finales (qui ne peuvent pas imbriquer d'objets) et dans les classes imbriquante. Les éléments finaux font le calcul tandis que les élément qui imprique font la somme du résultat du calcul de ses enfants.

La classe qui peut imbriquer des éléments à également un attribut pour stocker ses enfants.

[Exemple](./exemple.php)

## Avantages / Inconvénients


|Avantages|Inconvénients|
|---------|-------------|
| Facile d'introduire des nouveaux type d'éléments à l'aborescence : principe ouvert/fermé | Peut devenir trop génériques selon les cas |
| Simplifie le code dans les architectures en arborescende |  |

## Cas d'usage

- Arborescences (Tickets avec sous tickets, dossiers & fichiers...)
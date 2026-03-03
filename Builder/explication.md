# Builder

[Retour au sommaire](../readme.md)

## Problèmatique de départ

La construction d'un objet avec plein de variations peut être longue et complexe. Soit on se retrouve avec un énorme constructeur avec plein de paramètres dont très peu qui sont utilisé en même temps, soit on multiplie les classes pour chaque variation.

## Principe et fonctionnement

Pour résoudre ce problème, on peut créer une classe **Builder** (ou constructeur ou monteur en français). Le builder est une classe qui va contenir une série de méthodes qui vont servir d'**étapes** d'instanciation. 

Il n'est pas obligatoire d'éxecuter toutes les étapes donc on garde la variabilité.

On peut également définir une classe directeur, qui va appeler les méthodes dans le bon ordre. On peut faire sans et appeler les méthodes directement dans la logique, cependant elle permet la réusabilité.

## Structure

On créée d'abord une interface **builder** pour définir les étapes commune à tout les **builders concrets**

Ensuite, on l'implémente dans tous les **builder concrets** qui s'occuperont de la production d'objets qui ne sont pas obligé d'avoir ni les mêmes comportements ni les mêmes caractéristiques.

Si on veut utiliser un **directeur**, on le créée en injectant l'interface **builder**.



[Exemple](./exemple.php)

## Avantages / Inconvénients

|Avantages|Inconvénients|
|---------|-------------|
| Séparation du code de construction de l'objet et l'objet en lui même | Augmente la complexité du code car ajoute beaucoup de classes |
| Le code est facilement réutilisatble |  |


## Cas d'usage

- Classes complexes et avce beaucoup de variations à refacto
- Refacto des classes avec des constructeurs avec ENORMEMENT de paramètres facultatifs
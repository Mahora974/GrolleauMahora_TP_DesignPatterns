# Adapter

[Retour au sommaire](../readme.md)

## Problèmatique de départ

Quand on doit transférer ou récupérer des données d'un élément externe, on a pas de prise sur le type et le format des données attendues/reçues. Pour que tout fonctionne correctement, il faut adapter les données, mais si on les modifie partout, on peut créer des bugs et en cas de changement de sources externe, il y a beaucoup de code à modifier.

## Principe et fonctionnement

Pour cela, on met en place un adaptateur. Le principe est de créer une classe qui va "traduire" notre code pour l'adapter aux sources externe sans impacter le reste du code

## Structure

Les **classes clientes** - qui auront besoin de la structure externe pour fonctionner - implémente une **interface** qui sera aussi implémentée par l'**adaptateur**. L'adaptateur est une classe qui encapsule la classe qui gère la connexion (le **service**) à la structure externe et convertit les données clients en données pour la structure externe.

[Exemple](./exemple.php)

## Avantages / Inconvénients

|                                                      Avantages                                                     |                                                    Inconvénients                                                   |
|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| La "traduction" des données est séparée du reste pour limiter les impacts : principe de reponsabilité unique| Peut rendre le code trop complexe |
| Ajout de nouveaux adapteurs sans avoir à modifier le code : principe ouvert/fermé |                                                                                                                    |
|                                                        |                                                                                                                    |

## Cas d'usage

- Architecture Hexagonale
- Presque sûre que ça peut servir dans un orm pour faire la liason à la base de données peut importe le langage sans que ça impacte les fonctions. J'ai essayé de faire ça en exemple mais j'arrivais pas à m'en sortir.
- Dès qu'on fait appel à une api externe
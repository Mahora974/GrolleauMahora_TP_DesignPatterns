# Command

[Retour au sommaire](../readme.md)

## Problèmatique de départ

Il peut arriver de vouloir créer une classe générique, par exemple un élément graphique, et de finir par créer plein de sous classe parce qu'elle n'est pas assez spécialisée.

Il peut également arriver que la même logique est besoin d'être appelée au même endroit.

## Principe et fonctionnement

Pour résoudre ces deux problèmes, on peut utiliser une interface de **Command** qui applique le principle de responsabilité unique en isolant la logique répétée et en interceptant le lien entre l'interface graphique et la logique métier.

## Structure

Le **demandeur** est une classe qui stocke dans ses attribut la commande qu'il doit executer. 
L'**Interface de commande** type l'attribut du **demandeur** et est implémenté dans les **commandes concrètes**. Généralement, cet interface ne contient qu'une méthode pour executer la commande.
Ensuite, la **commande concrète** appelle la bonne méthode de la classe **récepteur** qui contient toute la logique métier.

[Exemple](./exemple.php)

## Avantages / Inconvénients

|Avantages|Inconvénients|
|---------|-------------|
| Découplage des appels de commande et des éxecutions | Complexifie le code en ajoutant une nouvelle couche |
| Facile d'ajouter des commande sans modifier le code |  |
| Différer les execution |  |
| Permet de mettre en place des actions réversibles |  |

## Cas d'usage

- Tâches planifiées
- Réversion d'action
- Files d'attentes
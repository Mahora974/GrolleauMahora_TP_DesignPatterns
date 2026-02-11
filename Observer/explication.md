# Observer

## Problèmatique de départ

Quand on veut qu'un élément attende un événement déclanché par un autre élément, on a deux choix : 

- L'élément qui attend l'événement doit vérifier régulièrement si l'événement s'est produit ou non:
- L'éléemnt qui produit l'événement prévient tout le monde que l'événement est arrivé; 

Dans les deux cas, le nombre de "disscussions" est très élevé.

## Principe et fonctionnement

Afin de savoir quelle classe doit être tenu au courant d'un événement, on ajoute un attribut qui contient un tableau **abonnés** et des méthodes publiques pour s'abonner ou se désabonner depuis la classe qui émet l'événement, qui s'appelle le **diffuseur**.

Pour s'assurer que tout les **abonnés** puisse être notifié, ils doivent tous implenter la même **interface**, et le diffuseur ne communiquera avec eux que via cette **interface**

## Structure

D'abord, on a la classe du **diffuseur**. Cette classe va contenir au moins un attribut qui représente un tableau **d'abonnés**, deux méthodes publiques pour s'abonner ou se désabonner et une méthode de mise à jour, pour envoyer les changements aux abonnés.

Les **abonnés** partage tous la même interface, qui permettera d'appeller la même fonction lors que la diffusion peut importe la classe de l'**abonné**.

[Exemple](exemple.md)

## Avantages / Inconvénients

|                                                      Avantages                                                     |                                                    Inconvénients                                                   |
|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| On peut ajouter facilement des nouveaux abonnés sans modifier le diffuseur -> principe d'ouverture/fermeture       | Il n'y a pas focrément d'ordre dans l'appel des abonnés                                                            |
| Permet d'appliquer le **Single Responsability Principle** (SRP) -> une responsabilité par diffuseurs               |                                                                                                                    |
| Evite la forte dépendance à une classe grâce à l'interface                                                         |                                                                                                                    |

## Cas d'usages

- Envoi d'une newsletter,
- Demande de revatillement d'un distributeur automatique,
- Architecture Event Driven (?)

# Decorator

## Problèmatique de départ

**Premier problème :** Pour ajouter des comportement sur une classe, une des solutions utilisées est de créer de l'héritage. Cependant, cette nouvelle classe ne peut avoir d'un seul parent. le parent fait partie de l'enfant.

**Deuxième problème :** Il n'est pas possible de remplacer partiellement un objet. Une fois une instance créée, ses d'attributs et ses méthodes ne peuvent pas changer. 

En gros, on veut pouvoir utiliser les spécificités de plusieurs classes enfant sans créer de sous classe.

## Principe et fonctionnement

Le principe d'un **décorateur** (ou **emballeur**, ou **empaqueteur**) est de pouvoir "décorer" un objet existant. 

Plus précisement, il va s'agir d'appliquer par dessus la logique existante de la classe de base - appelée **composant concret** - la logique de classes enfants - appelées **décorateurs concrets**. 

L'idée, c'est que plutôt que toute la logique soit effectuée côté enfant en héritant de la logique du parent, le parent effectue d'abord sa logique puis le ou les enfants ajoute une couche supplémentaire. 

Pour faire le lien entre le **composant concret** et les **décorateurs concrets**, il y a tout d'abord une **interface commune**, mais aussi et surtout un **décorateur de base**

Le **décorateur de base** est une classe abstraite qui va implémenter le **composant concret** via l'injection de dépendance. Il va injecter ce composant via un paramètre du constructeur et le stocker en attribut pour pouvoir le léguer à ses classes étendues (les **décorateurs concrets**)

## Structure

On part d'une **interface**, qui va définir toutes les fonctionnalités attendues à la fois par le **composant concret** et les **décorateurs**.

On implémente cette **interface** dans le **composant concret**, qui va définir le comportement par défaut des objets.

On créé ensuite une classe abstraite implémentant également l'**interface** qui sera le **décorateur de base**. Ce décorateur va définir un attribut qui servira à stocker l'instance du **composant concret**.

Enfin, on créé les **décorateurs concrets** qui étendent le **décorateur de base** (et donc par conséquent l'interface). Ils vont surcharger les fonctions du **composant concret** pour y ajouter leur logique spécifique. 

[Consulter l'exemple](exemple.php)

## Avantages / Inconvénients

|                                                      Avantages                                                     |                                                    Inconvénients                                                   |
|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------|
| On peut ajouter du comportement au moment de l'execution plutôt que statiquement dans le code                      | Difficile de supprimer ou de déplacer un emballeur sans casser des chose                                           |
| Permet d'appliquer le **Single Responsability Principle** (SRP) -> une responsabilité par emballeur                | Le code peut être difficilement lisible                                                                            |
| Permet de d'appliquer plusieurs couche de comportements suppléméntaires (emballeurs) à une même classe             | C'est assez difficile à comprendre (En tout cas moi j'ai eu du mal)                                                |

## Cas d'usage

Dès qu'on va avoir besoin d'appliquer des couches de logique en plus tout en respectant le principe d'ouvert/fermé.s
# Swissdle
## Description
Swissdle est une application sur laquel l'utilisateur doit, chaque jours, essayer de deviner une ville de Suisse. 

Dès que l'utilisateur fait une proposition de ville, des indices s'affiche à l'écran pour qu'il sache s'il ce raproche de la ville du jour ou non.

Ce concept est inspiré de différents jeux comme [Wordle](https://www.nytimes.com/games/wordle/index.html), [Loldle](https://loldle.net/) et [Globle](https://globle-game.com/).

## Captures 

Quand l'utilisateur arrive sur le site il sera accueilli avec cette page:
![image](https://github.com/HE-Arc/Swissdle/assets/82332623/3ccbcfb4-46f1-48a0-a369-22170fe91f00)

Il a ensuite la possibilité de faire un guess :
![image](https://github.com/HE-Arc/Swissdle/assets/82332623/695254bb-36f9-4e85-9dfa-8e48446f1c25)

Il devra essayer jusqu'à ce qu'il trouve la bonne ville :
![image](https://github.com/HE-Arc/Swissdle/assets/82332623/2cea4d81-2b78-4d24-8ad0-6b42d5024d76)

## Comment mettre en place le projet ?
### 1 Clone

Premièrement, cloner le repository.

En http :

```bash
git clone https://github.com/HE-Arc/Swissdle.git
```
ou par ssh :

```bash
git clone git@github.com:HE-Arc/Swissdle.git
```

### 2 Structure du projet

Le projet contient les dossiers suivants :

- backend-laravel -->
- frontend-vue -->
- data -->


### 3 Démarrer Docker

Si ce n'est pas déjà fait, démarrer Docker.

Lorsque celui-ci à démarrer, vérifier qu'il est bien en mode "Linux Containers".

### 4 Ubuntu pour Windows

Ouvrir Ubuntu et se déplacer à l'endroit où le projet a été cloné.

> ℹ️ Pour accéder au disque de la machine "hôte" depuis Ubuntu, se rendre dans le dossier `/mnt` :
>
>```bash
>cd /mnt
>```
> Si l'on liste les sous dossier de ce répertoire, on retrouve nos disques :
>```bash
>ls -la # ou ll
>```
> Sortie :
>```bash
>total 12
>drwxr-xr-x  8 root    root    4096 Dec 10 13:12 .
>drwxr-xr-x 24 root    root    4096 Dec 18 21:18 ..
>drwxrwxrwx  1 thombre thombre  512 Dec 17 20:09 c
>drwxrwxrwx  1 thombre thombre 4096 Dec 13 22:45 d
>drwxrwxrwx  1 thombre thombre 4096 Dec 15 00:10 e
>drwxrwxrwx  2 root    root    4096 Dec 10 13:12 f
>drwxrwxrwt  5 root    root     120 Dec 18 21:18 wsl
>drwxrwxrwt  8 root    root     320 Dec 18 21:18 wslg
>```

### 5 Setup du backend laravel

Une fois dans le dossier où le repository a été cloné, se déplacer dans `backend-laravel` :

```bash
cd backend-laravel
```

#### 5.1 Composer

Obtenir les dépendances du backend laravel avec la commande suivante :
```bash
composer install
```

#### 5.2 Mise en place du `.env`

Executer la commande suivante :
```bash
cp .env.example .env
```

#### 5.3 Lancement des conteneurs

>💡 
>Pour pouvoir utiliser sail plus simplement, rajouter un alias dans le `~/.bashrc` :
>```bash
>nano ~/.bashrc
>```
>Ajouter la ligne :
>`alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`
>à la fin du `~/.bashrc`.\
>Sauvegarder puis quitter l'édition.

Lancer la commande :
```bash
sail up -d
```
#### 5.4 Création et peuplement de la base de données

Lancer les migrations :
```bash
sail artisan migrate
```

Peupler la base de données :
```bash
sail artisan db:seed
```

### 6 Setup du front-end

Revenir à la racine du projet et se déplacer dans le dossier `frontend-vue` :
```bash
cd frontend-vue
```

#### 6.2 Dépendances npm

Installez les dépendances nécessaires :
```bash
npm install
```

#### 6.3 Lancer le frontend

lancez le mode de développement avec la commande :
```bash
npm run serve
```

Assurez-vous d'avoir [Node.js](https://nodejs.org/) installé sur votre machine avant d'exécuter ces commandes. Le processus d'installation des dépendances peut prendre quelques instants. Une fois terminé, le Frontend sera accessible en mode développement.
### 7 Accès à l'application en local

Dès maintenant il doit être possible de se rendre sur `localhost:8080` sans rencontrer d'erreurs.

## Ressources supplémentaires
Vous pouvez accéder à swissdle [ici](https://swissdle.k8s.ing.he-arc.ch)

Manuel de développeur [ici](../../wiki/Manuel-developpeur)

Et accéder à la documentation de notre API [ici](https://swissdle.k8s.ing.he-arc.ch/api/documentation#/)

## Participant
- Thomas Bruno
- Salmon Mathias
- Santschi Loïc

% WebEvenementiel documentation - Queries

# Fonctionnement des requêtes

Le front-end et le back-end communiquent via des requêtes HTTP : 
pour effectuer une action ou demander des informations, le 
front-end envoi une requête de type `POST`, elle est traitée par 
le back-end et une réponse formatée au format `JSON` est renvoyée.

Les requêtes sont composées d'un champs `cmd` qui indique 
l'action à exécuter et de paramètres variant selon les 
différentes actions. La réponse est toujours composée d'un 
champs `success` qui indique si l'action a réussi et d'un 
champs `errorCode` qui est égal a un code d'erreur positif 
dans le cas ou l'action a échoué, la réponse contient aussi les
informations demandée (s'il y en a).

Par exemple, le contenu de la variable `$_POST` pour une requête 
de connexion :

```
[
    'cmd': 'signin',
    'username': 'thelegend27',
    'password': 'supersecurepassword'
]
```

# Liste des actions

## `signin` : Connexion

Vérifie que l'utilisateur existe dans la base de données et que 
le mot de passe correspond. La connexion est maintenue dans une 
session et les informations de l'utilisateur connecté peuvent 
être lues via la commande `getuser`.

**Requête** :

- `'cmd': 'signin`
- `'login'` : Pseudo
- `'password'` : Mot de passe

**Réponse** :

- `'success'` : True si la connexion réussi, false si non

## `signup` : Inscription

Inscrit un nouvel utilisateur dans la base de données.

**Requête** :

- `'cmd': 'signup'`
- `'login'` : Pseudo
- `'email'` : Adresse e-mail
- `'password'` : Mot de passe
- `'firstName'` : Prénom
- `'lastName'` : Nom
- `'civility'` : Civilité (1 pour homme et 2 pour femme)
- `'birthday'` : Date de naissance (dd/mm/yyy)
- `'cellphone'` : Numéro de téléphone
- `'citycode'` : Code postal
- `'cityname'` : Nom de la ville

**Réponse** :

- `'success'` : True si l'utilisateur a été inscrit dans la base 
de données
- `'parameterName'` : Le nom du parametre incorrect (s'il y en a 
un incorrect, dans ce cas `'errorCode'` est égal à 1 ou 2)

## Get informations of connected user

**Request**:

`'cmd': 'getuser'`

**Response**:

```json
{
    "id" : "<user_id>",
    "username": "<user name>",
    "email": "<user_email>",
    "firstname": "<first name>",
    "lastname": "<last name>",
    "active": "<is_user_active>", // Un utilisateur est actif s'il s'est inscrit
    "civility": "<user_civility>" // 1 pour homme et 2 pour femme
}
```

## Create an event

**Request**:

`'cmd': 'createevent'`

`'name': '<events_name>'`

`'beginDate': '<events_start_date>' // YYYY-MM-DD`

`'endDate': '<events_end_date>' // YYYY-MM-DD`

`'beginTime': '<events_start_time>' // hh-mm`

`'endTime': '<events_end_time>' // hh-mm`

`'streetNumber': '<street_number>'`

`'streetName': '<street_name>'`

`'cityCode': '<city_code>'`

`'cityName': '<city_name>'`

`'description': '<description>'`

**Response**:

```json
{
    "id": "<event_id>",
    "name": "<event_name>",
    "beginDate": "<event_begin_date>", // YYYY-MM-DD
    "endDate": "<event_end_date>", // YYYY-MM-DD
    "beginTime": "<event_begin_time>", // hh-mm
    "endTime": "<event_end_time>", // hh-mm
    "active": "<is_event_active>",
    "description": "<description>",
    "addressId": "<address_id>",
    "organizerId": "<organizer_id>",
}
```

## Invite someone to an event

Invites a new guest to an event. Checks if the email exists in that event and send an automatic email to the guest.

**Request**:

`'cmd': 'invite'`

`'eventId': '<events_id>'`

`'firstName': '<first_name>'`

`'lastName': '<last_name>'`

`'email': '<email>'`

**Response**:

...
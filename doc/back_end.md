% Documentation technique - Back-end
% Gestion d'événements
\newpage

# Structure générale

## Fonctionnement

Le back-end constitue la logique de l'application, il est en charge de lier le
front-end à la base de données en recevant des requêtes HTTP, effectuant les
requêtes SQL correspondantes, éventuellement validant les données
(particulièrement celles qui seront inscrites dans la base de données) et en
envoyant une réponse pouvant être lue par le front-end.

### QueryParser

Classe abstraite, reçoit une chaîne de caractères représentant la requête HTTP
reçue, son rôle est d'en extraire la commande et les paramètres pour créer
l'action correspondante.

### Action

Classe abstraite, représente une action à effectuer pour satisfaire une requête
du front-end. Cette action pourrait par exemple être "Chercher les informations
de l'évènement d'ID 32 et lister tout les invités de cet évènement", ou "Ajouter
un utilisateur à la base". Le rôle de cette classe est donc de réaliser les
opérations nécessaires et de créer le réponse qui sera renvoyée au front-end.

### Response

Classe abstraite, permet de créer la chaîne de caractères constituant la réponse
d'une action.

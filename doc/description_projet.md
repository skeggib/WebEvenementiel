% Proposition de projet
% Gestion d’événements
\newpage

# Motivation

Lors de l'organisation d'un évènement, la collecte d'informations est une tâche
cruciale d'un point de vue logistique car elle permet de prévoir à l'avance les
besoins et d'estimer les ressources nécessaires au bon déroulement de celui-ci.
Souvent, cette tâche est réalisée manuellement, en envoyant des invitations par
email aux personnes concernées, attendant un retour indiquant si elles seront
présentes ou non. Il est parfois aussi intéressant de connaitre le nombre ou la
liste de personnes effectivement présentes à l'évènement, en leur demandant par
exemple d'émarger à l'entrée.

Cette tâche étant laborieuse, l'idée est de l'automatiser via une application
web permettant une gestion d'évènements aisée.

# Fonctionnalités attendues

L'application web proposera de créer des évènements, en y ajoutant des
participants qui recevront un email d'invitation, ils pourront ainsi répondre
à l'invitation via un lien hypertexte.

Si l'organisateur le désir, chaque participant recevra un code QR unique
permettant de l'identifier. Ce code QR pourra être imprimé sous forme de badge
et lui donnera accès à l'évènement. La lecture des codes QR à l'entrée permettra
aussi à l'organisateur d'obtenir une liste complète de personnes présentes.

# Fonctionnalités facultatives

Il serait intéressant de développer une application Android permettant de
scanner les codes QR des participants, mettant à jour une base de données liée
à l'application web.

# Technologies prévues

## Front-end

- HTML/CSS
- Javascript

## Back-end

- PHP
- Base de données PostgreSQL ou MySQL
- Serveur Linux
- Apache

## Outils de développement

- Git (hébergé sur gitlab.com ou github.com)

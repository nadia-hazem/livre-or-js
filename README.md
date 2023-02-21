# Livre d'or js/php
## Guestbook with js and php
--
Guestbook allowing your users to leave their opinions on your site. This project is carried out using classes in particular to represent users.

A database named “livreor” using phpmyadmin. In this database, a “users” table which contains the following fields:
- id, int, primary key and Auto Increment
- login, varchar of size 255
- password, varchar of size 255

A “comments” table which contains the following fields:
- id, int, primary key and Auto Increment
- comment, text
- user_id, int
- date, datetime

And the different pages:

- A home page that presents the site (index.php)
- A page containing a registration form and a login form. Connection and registration must be done asynchronously with JavaScript.
Validation of forms must be done without page reloading (Existing user, unconfirmed password, etc.).


![Screenshot](https://github.com/nadia-hazem/livre-or-js/blob/ad5ced5c7d42ee4dd0b2742229eecff7081d3735/screenshot.png)

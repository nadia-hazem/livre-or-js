# livre-or-js
##Guestbook with js and php
--
Create a guestbook allowing your users to leave their opinions on your site. This project must be carried out using the classes in particular to represent your users.
To start, create your database named “livreor” using phpmyadmin. In this database, create a “users” table which contains the following fields:
- id, int, primary key and Auto Increment
- login, varchar of size 255
- password, varchar of size 255
Create a “comments” table that contains the following fields:
- id, int, primary key and Auto Increment
- comment, text
- user_id, int
- date, datetime
Now that the database is ready, you will need to create different pages:
- A home page that presents your site (index.php)
- A page containing a registration form and a registration form.
connection. Connection and registration must be done asynchronously with JavaScript. Validation of forms must be done without page reloading (Existing user, unconfirmed password, etc.).

![Screenshot](main/screenshot.png)

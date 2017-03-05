% WebEvenementiel documentation - Back-end

# General structure

The goal of the back-end is to process and transfer data between the front-end and the database. The front-end sends a request using the HTTP protocol asking for data, the back-end extract the data from the database, format it in JSON and send it through the HTPP protocol. The script `WebEvenementiel.php` is the main entry of the back-end :

First, a **QueryParser** object is created, it takes the `$_POST` variable, read it and creates the corresponding **Action** object (see *Queries.md*).

The created **Action** object can be executed to perform the request send by the front-end, this action can consists of reading or writing data from the database. Once the action is performed, a **Response** object is created.

The **Response** object contains the response that will be sent to the front-end, it can be actual data or an error. The **Sender** class transform a **Response** to a JSON formatted string and send it using the function *echo*.
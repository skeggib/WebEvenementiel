% WebEvenementiel documentation - Queries

# Format of a request

A request is contained in the `$_POST` global variable. `$_POST['cmd']` is a string that describe the request, if additional informations are needed, they can be specified in other cells of the variable `$_POST`.

For example, the following request attempt an user login :

```
Contents of the $_POST variables :

[
    'cmd': 'signin',
    'username': 'thelegend27',
    'password': 'supersecurepassword'
]
```

# Format of a response

The response is formatted in JSON and sent via the HTTP protocol. A response always contains a value named "success" which can be true or false, when this value is false the response contains also a value named "error" which contains the error message from the back-end.

# Existing queries

## Sign-in

Checks if the user exists in the database and that the password matches. A PHP session is used to keep the connection open.

**Request**:

`'cmd': 'signin`

`'login': '<login>'`

`'password': '<password>'`

**Response**:

...

## Sign-up

Registers a new user. Checks if the user exists and that the given informations are valid.

**Request**:

`'cmd': 'signup'`

`'login': '<login>'`

`'password': '<password>'`

`'firstName': '<first_name>'`

`'lastName': '<last_name>'`

**Response**:

...

## Get informations of connected user

**Request**:

`'cmd': 'getuser'`

**Response**:

```json
{
    "username": "<user name>",
    "firstname": "<first name>",
    "lastname": "<last name>",
    ...
}
```

## Get the list of events of an user

Lists all events that belongs to the connected user.

**Request**:

`'cmd': 'listevents'`

**Response**:

...

## Get an event

Reads the event general informations and the list of guests. Checks if the event belongs to the connected user.

**Request**:

`'cmd': 'getevent'`

`'id': '<event_id>'`

**Response**:

...

## Create an event

Creates a new event.

**Request**:

`'cmd': 'createevent'`

`'name': '<events_name>'`

`'starttime': '<events_start_time>'`

`'endtime': '<events_end_time>'`

...

**Response**:

...

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
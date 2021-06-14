# userService
## Endpoints

###### -/user/register
Checks if the user exists, if not, it enters data into the database.

Params:
login, 
email,
password
###### -/user/login
Checks if the user exists, if the password is valid returns true.

Params:
login,
password

###### -/user/show
Testing the connection to db. Returns a list of all users.

# Doc
### GET /user/show HTTP/1.1
**Host: localhost:8080
Content-Type: text/html**


**Response:**
"String"

**Example:**
All users:
1 test2 2021-06-13 14:05:16
2 12345 2021-06-13 18:24:54
3 t 2021-06-13 22:29:27
4 te 2021-06-13 22:32:07



### POST /user/register HTTP/1.1
**Host: localhost:8080
Content-Type: text/html**

{
  "login": "string",
  "email": "string",
  "password": "string"
}

**Example:**
{
  "login": "jankowalski",
  "email": "jankkowalski@kowal.com",
  "password": "qwerty123"
}

**Response:**
"boolean"

**Example:**
true


### POST /user/login HTTP/1.1
**Host: localhost:8080
Content-Type: text/html**

{
  "login": "string",
  "password": "string"
}

**Example:**
{
  "login": "jankowalski",
  "password": "qwerty123"
}

**Response:**
"boolean"

**Example:**
false

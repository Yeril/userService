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

# rcpslite
Vue JS Frontend and PHP API Backend to manage subscribers

## Prerequisites

- Nginx
- PHP 7.2
- MySQL >= 5.5
- Redis-Server

### Installation

Access your MySQL server and create the database and tables using the database.sql file.
Edit the file api/config/database.php with your MySQL directives as host, username and password.
Edit the nginx.conf with your root directories to api, that has to point do rcpslite root directory and for the frontend that needs to point to rcpslite/frontend/dist.

### User Interface

Visit `http://localhost:8888` to view the frontend.

### Backend Description
`http://localhost/api/subscriber/read.php` - POST - Lists all the subscribers.
`http://localhost/api/subscriber/create.php` - POST - Creates a subscriber.
  JSON example:
  <code>
    {
    "email" : "johndoe@example.com",
    "name" : "John Doe",
    "state" : "active",
    "fields" : [   
                     { "title" : "address",  
                       "type" : "string",
                       "value" : "5th street" },

                     { "title" : "birthdate",  
                       "type"  : "date",
                       "value" : "1979/07/15" }
                 ]
    }
  </code>
  `http://localhost/api/subscriber/read_one.php?id=1` - GET - Get one subscriber.
  `http://localhost/api/subscriber/update.php` - POST - Update a subscriber.
    JSON example:
    <code>
    {
    "email" : "johndoe@example.com",
    "name" : "John Doe",
    "state" : "active",
    "fields" : [   
                     { "title" : "address",  
                       "type" : "string",
                       "value" : "5th street" },

                     { "title" : "birthdate",  
                       "type"  : "date",
                       "value" : "1979/07/15" }
                 ]
    }
    </code>
  `http://localhost/api/subscriber/delete.php` - POST - Deletes the given subscriber.
    JSON example:
    <code>
      {
        "id" : "1"
      }
    </code>
  `http://localhost/api/subscriber/search.php?s=john` - GET - Look for a subscriber with email or name that contains string john.
  `http://localhost/api/subscriber/read_paging.php` - POST - Returns subscribers with paging information.

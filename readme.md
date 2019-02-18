# Laravel API test

Features

- Stores and retrieves data from a SQL type database
- Creates and Authenticates users with a username and password and issues JWT
Tokens
- User endpoints should require an authenticated request using JWT tokens
- Endpoint so users can create posts
- Endpoint so users can comment on posts, including their own
- Public endpoints to get all posts, comments

Database used is MySql. Dump included under database folder.

Test User and Login.
email: email@testemail.com
password: secret

Endpoints

api/login - POST request with email and password and returns token in JSON format.
Sample response:
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvbG9naW4iLCJpYXQiOjE1NTA1MjU4MTEsImV4cCI6MTU1MDUyOTQxMSwibmJmIjoxNTUwNTI1ODExLCJqdGkiOiJMSklXT2dtdXRveURRSWJHIn0.vrecZ_FWOpFgZ4A5NtjFpy3Kt71dfuTC-nmdyWcdAGg"
}

api/user - GET request with header Authorization: Bearer + token and returns user info in JSON format.
Sample Response:
{
    "user": {
        "id": 1,
        "name": "test",
        "email": "test@testemail.com",
        "created_at": "2019-02-18 07:02:57",
        "updated_at": "2019-02-18 07:02:57"
    }
}

api/posts - POST request with title, body and auth token. Creates post and returns post info in JSON format
Sample Response: 
{
    "title": "Post 1 Title",
    "body": "Post 1 Body",
    "user_id": 1,
    "updated_at": "2019-02-18 21:49:27",
    "created_at": "2019-02-18 21:49:27",
    "id": 1
}

api/posts/{id} - GET request with auth token. Returns post in JSON format
Sample Response:
{
    "id": 1,
    "title": "Post 1 Title",
    "body": "Post 1 Body",
    "excerpt": "",
    "user_id": 1,
    "created_at": "2019-02-18 21:49:27",
    "updated_at": "2019-02-18 21:49:27"
}

api/posts - GET request with auth token. Returns all posts in JSON format
Sample Response:
[
    {
        "id": 1,
        "title": "Post 1 Title",
        "body": "Post 1 Body",
        "excerpt": "",
        "user_id": 1,
        "created_at": "2019-02-18 21:49:27",
        "updated_at": "2019-02-18 21:49:27"
    },
    {
        "id": 2,
        "title": "Post 2 Title",
        "body": "Post 2 Body",
        "excerpt": "",
        "user_id": 1,
        "created_at": "2019-02-18 21:56:53",
        "updated_at": "2019-02-18 21:56:53"
    }
]

api/comments - POST request with comment body and auth token. Creates comment and returns comment info in JSON format
Sample response: 
{
    "body": "Comment 1 Body",
    "post_id": "1",
    "user_id": 1,
    "updated_at": "2019-02-18 22:01:09",
    "created_at": "2019-02-18 22:01:09",
    "id": 1
}

api/comments - GET request with auth token. Returns all comments in JSON format
Sample Response:
[
    {
        "id": 1,
        "body": "Comment 1 Body",
        "created_at": "2019-02-18 22:01:09",
        "updated_at": "2019-02-18 22:01:09",
        "post_id": 1,
        "user_id": 1
    },
    {
        "id": 2,
        "body": "Comment 2 Body",
        "created_at": "2019-02-18 22:02:37",
        "updated_at": "2019-02-18 22:02:37",
        "post_id": 2,
        "user_id": 1
    }
]
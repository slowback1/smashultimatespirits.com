<?php
    include './models/Response.php';

    $body = array(
        "message" => "this is a route tree for the Smash Ultimate Spirits API, assume all GET params are in the url, and all POST, PUT, and DELETE params are in a JSON body.  If 'Requires Authentication' is true, then a header named 'token' that contains a user's JWT is required for authentication",
        "routes" => array(
            "Spirits" => array(
                "Add" => array(
                    "Allowed Method" => "POST",
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id"   => "int",
                        "name" => "string",
                        "game" => "string",
                        "series" => "string",
                        "description" => "string",
                        "author" => "string"
                    ),
                    "Description" => "Add a spirit into the database"
                ),
                "Delete" => array(
                    "Allowed Method" => "DELETE",
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id" => "int"
                    ),
                    "Description" => "Deletes a spirit from the database"
                ),
                "Edit" => array(
                    "Allowed Method" => "PUT",
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id"   => "int",
                        "name" => "string",
                        "game" => "string",
                        "series" => "string",
                        "description" => "string",
                        "author" => "string"
                    ),
                    "Description" => "Edits a spirit from the database.  Id is the only required param."
                ),
                "Get" => array(
                    "Allowed Method" => "GET",
                    "Requires Authentication" => false,
                    "Params" => array(
                        "id" => "int OR 'r'",
                        "range" => "string with the form 'int'-'int'"
                    ),
                    "Description" => "Gets spirits based on params.  No params will retrieve all spirits, id with an int will retrieve the one spirit with that id, id with r will retrieve a random spirit, and range will retrieve all spirits with the two ints provided, inclusive."
                ),
                "Search" => array(
                    "Allowed Method" => "GET",
                    "Requires Authentication" => false,
                    "Params" => array(
                        "type" => "enum(0 => name, 1 => game,2 => series)",
                        "query" => "string",
                        "quantity" => "int"
                    ),
                    "Description" => "returns spirit data based on search results.  Quantity is optional, and if not given, will default to 30."
                )
            ),
            "Quiz" => array(
                "Add" => array(
                    "Allowed Method" => "POST",
                    "Requires Authentication" => true,
                    "Params" => array(
                        "question" => "string",
                        "corAns" => "int",
                        "wrongAns1" => "int",
                        "wrongAns2" => "int",
                        "wrongAns3" => "int"
                    ),
                    "Description" => "adds a quiz question to the database.  Wrong answers 1, 2, and 3 can have 0 as an input to have a random wrong answer."
                ),
                "Delete" => array(
                    "Allowed Method" => "DELETE",
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id" => "int"
                    ),
                    "Description" => "deletes a quiz question from the database."
                ),
                "Edit" => array(
                    "Allowed Method" => "PUT",
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id" => "int",
                        "question" => "string",
                        "corAns" => "int",
                        "wrongAns1" => "int",
                        "wrongAns2" => "int",
                        "wrongAns3" => "int"
                    ),
                    "Description" => "edits a quiz question.  Id is the only required parameter"
                ),
                "Get" => array(
                    "Allowed Method" => "GET",
                    "Requires Authentication" => false,
                    "Params" => array(
                        "id" => "int"
                    ),
                    "Description" => "gets quiz question from database.  Id is optional, and if not given, returns all quiz questions instead."
                ),
                "Verify" => array(
                    "Allowed Method" => "GET",
                    "Requires Authentication" => false,
                    "Params" => array(
                        "id" => "int",
                        "answer" => "int"
                    ),
                    "Description" => "returns true or false, depending on if user gets question is correct."
                )
            ),
            "User" => array(
                "ChangePassword" => array(
                    "Allowed Method" => "PUT",
                    "Requires Authentication" => true,
                    "Params" => array(
                        "username" => "string",
                        "oldpassword" => "string",
                        "newpassword" => "string"
                    ),
                    "Description" => "changes password.  Returns a new JWT"
                ),
                "Delete" => array(
                    "Allowed Method" => "DELETE",
                    "Requires Authentication" => true,
                    "Params" => "none",
                    "Description" => "Deletes user account from database"
                ),
                "Login" => array(
                    "Allowed Method" => "POST",
                    "Requires Authentication" => false,
                    "Params" => array(
                        "username" => "string",
                        "password" => "string"
                    ),
                    "Description" => "Attempts to log in user.  Will send a JWT if authorization is successful."
                ),
                "Register" => array(
                    "Allowed Method" => "POST",
                    "Requires Authentication" => false,
                    "Params" => array(
                        "username" => "string",
                        "password" => "string",
                        "secretMessage" => "string"
                    ),
                    "Description" => "Attempts to register a new user.  Will send a JWT if authorization is successful"
                ),
                "Verify" => array(
                    "Allowed Method" => "GET",
                    "Requires Authentication" => true,
                    "Params" => "none",
                    "Description" => "verifies that user is logged in"
                )
            )

        )
    );
    $res = new Response(ResponseCodes::Ok, $body);
    echo $res->build();

?>
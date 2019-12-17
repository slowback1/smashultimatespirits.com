<?php
    include './models/Response.php';

    $body = array(
        "message" => "this is a route tree for the Smash Ultimate Spirits API, assume all GET params are in the url, and all POST, PUT, and DELETE params are in a JSON body.  If 'Requires Authentication' is true, then a header named 'token' that contains a user's JWT is required for authentication.  If IsPublic is true, CORS will allow any origin URIs, otherwise, CORS will only allow origins from smashultimatespirits.com",
        "routes" => array(
            "spirits" => array(
                "Add" => array(
                    "Allowed Method" => "POST",
                    "Route" => "/spirits/add/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id"   => "int [REQUIRED]",
                        "name" => "string [REQUIRED]",
                        "game" => "string [REQUIRED]",
                        "series" => "string [REQUIRED]",
                        "description" => "string [REQUIRED]",
                        "author" => "string [REQUIRED]"
                    ),
                    "Description" => "Add a spirit into the database"
                ),
                "Delete" => array(
                    "Allowed Method" => "DELETE",
                    "Route" => "/spirits/delete/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id" => "int [REQUIRED]"
                    ),
                    "Description" => "Deletes a spirit from the database"
                ),
                "Edit" => array(
                    "Allowed Method" => "PUT",
                    "Route" => "/spirits/edit/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id"   => "int [REQUIRED]",
                        "name" => "string [REQUIRED]",
                        "game" => "string [REQUIRED]",
                        "series" => "string [REQUIRED]",
                        "description" => "string [REQUIRED]",
                        "author" => "string"
                    ),
                    "Description" => "Edits a spirit from the database.  Id is the only required param."
                ),
                "Get" => array(
                    "Allowed Method" => "GET",
                    "Route" => "/spirits/get/",
                    "IsPublic" => true,
                    "Requires Authentication" => false,
                    "Params" => array(
                        "id" => "int OR 'r' [OPTIONAL]",
                        "range" => "string with the form 'int'-'int' [OPTIONAL]"
                    ),
                    "Description" => "Gets spirits based on params.  No params will retrieve all spirits, id with an int will retrieve the one spirit with that id, id with r will retrieve a random spirit, and range will retrieve all spirits with the two ints provided, inclusive."
                ),
                "Search" => array(
                    "Allowed Method" => "GET",
                    "Route" => "/spirits/search/",
                    "IsPublic" => true,
                    "Requires Authentication" => false,
                    "Params" => array(
                        "type" => "string (either 'name', 'game1', 'game2', or 'series') [REQUIRED]",
                        "query" => "string [REQUIRED]",
                        "quantity" => "int [REQUIRED]"
                    ),
                    "Description" => "returns spirit data based on search results.  Quantity is optional, and if not given, will default to 30."
                )
            ),
            "Quiz" => array(
                "Add" => array(
                    "Allowed Method" => "POST",
                    "Route" => "/quiz/add/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => array(
                        "question" => "string [REQUIRED]",
                        "corAns" => "int [REQUIRED]",
                        "wrongAns1" => "int [REQUIRED]",
                        "wrongAns2" => "int [REQUIRED]",
                        "wrongAns3" => "int [REQUIRED]"
                    ),
                    "Description" => "adds a quiz question to the database.  Wrong answers 1, 2, and 3 can have 0 as an input to have a random wrong answer."
                ),
                "Delete" => array(
                    "Allowed Method" => "DELETE",
                    "Route" => "/quiz/delete/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id" => "int [REQUIRED]"
                    ),
                    "Description" => "deletes a quiz question from the database."
                ),
                "Edit" => array(
                    "Allowed Method" => "PUT",
                    "Route" => "/quiz/edit/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => array(
                        "id" => "int [OPTIONAL]",
                        "question" => "string [OPTIONAL]",
                        "corAns" => "int [OPTIONAL]",
                        "wrongAns1" => "int [OPTIONAL]",
                        "wrongAns2" => "int [OPTIONAL]",
                        "wrongAns3" => "int [OPTIONAL]"
                    ),
                    "Description" => "edits a quiz question.  Id is the only required parameter"
                ),
                "Get" => array(
                    "Allowed Method" => "GET",
                    "Route" => "/quiz/get/",
                    "IsPublic" => false,
                    "Requires Authentication" => false,
                    "Params" => array(
                        "id" => "int [OPTIONAL]"
                    ),
                    "Description" => "gets quiz question from database.  Id is optional, and if not given, returns all quiz questions instead."
                ),
                "Verify" => array(
                    "Allowed Method" => "GET",
                    "Route" => "/quiz/verify/",
                    "IsPublic" => false,
                    "Requires Authentication" => false,
                    "Params" => array(
                        "id" => "int [REQUIRED]",
                        "answer" => "int [REQUIRED]"
                    ),
                    "Description" => "returns true or false, depending on if user gets question is correct."
                )
            ),
            "User" => array(
                "ChangePassword" => array(
                    "Allowed Method" => "PUT",
                    "Route" => "/user/changepassword/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => array(
                        "username" => "string [REQUIRED]",
                        "oldpassword" => "string [REQUIRED]",
                        "newpassword" => "string [REQUIRED]"
                    ),
                    "Description" => "changes password.  Returns a new JWT"
                ),
                "Delete" => array(
                    "Allowed Method" => "DELETE",
                    "Route" => "/user/delete/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => "none",
                    "Description" => "Deletes user account from database"
                ),
                "Login" => array(
                    "Allowed Method" => "POST",
                    "Route" => "/user/login/",
                    "IsPublic" => false,
                    "Requires Authentication" => false,
                    "Params" => array(
                        "username" => "string [REQUIRED]",
                        "password" => "string [REQUIRED]"
                    ),
                    "Description" => "Attempts to log in user.  Will send a JWT if authorization is successful."
                ),
                "Register" => array(
                    "Allowed Method" => "POST",
                    "Route" => "/user/register/",
                    "IsPublic" => false,
                    "Requires Authentication" => false,
                    "Params" => array(
                        "username" => "string [REQUIRED]",
                        "password" => "string [REQUIRED]",
                        "secretKey" => "string [REQUIRED]"
                    ),
                    "Description" => "Attempts to register a new user.  Will send a JWT if authorization is successful"
                ),
                "Verify" => array(
                    "Allowed Method" => "GET",
                    "Route" => "/user/verify/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => "none",
                    "Description" => "verifies that user is logged in"
                )
            ),
            "ChangeLog" => array(
                "Get" => array(
                    "Allowed Method" => "GET",
                    "Route" => "/changelog/get/",
                    "IsPublic" => false,
                    "Requires Authentication" => true,
                    "Params" => array(
                        "range" => "string with the form 'int'-'int' [OPTIONAL]"
                    ),
                    "Description" => "Grabs Changelog from database.  Range param is optional."
                )
            )

        )
    );
    $res = new Response(ResponseCodes::Ok, $body);
    echo $res->build();

?>
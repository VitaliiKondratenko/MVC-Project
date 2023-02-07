<?php
return array(
    "client/logIn" => "client/logIn",
    "client/exit" => "client/exit",
    "client/userOrders" => "client/userOrders",
    "client/showForm/LogIn" => "client/showFormLogIn",
    "client/sessionLogIn" => "client/sessionLogIn",
    "client/registration" => "client/registr",
    "basket/submitOrder" => "basket/submitOrder",
    "basket/recountAmount" => "basket/recount",
    "basket/delItem/([0-9]+)" => "basket/delItem/$1",
    "basket/basketClean" => "basket/clean",
    "basket/show" =>"basket/show",
    "basket/add/([0-9]+)/([0-9]+)" => "basket/add/$1/$2",
    "search/([a-z-.]+)" => "tovar/search/$1",
    "search/(0)" => "tovar/search/0",
    "categories/show" => "categories/show",
    "tovar/showPodrobnee/([0-9]+)/([0-9]+)" => "tovar/showPodrobnee/$1/$2",
    "tovar/showSearchPodrob/([0-9]+)/([a-z-.]+)" => "tovar/showSearchPodrob/$1/$2",
    "tovar/show/([0-9]+)/([a-z]+)/1/([0-9]+)" => "tovar/show/$1/$2/$3/$4",
    "tovar/show/([0-9]+)/([a-z]+)/0/([0-9]+)" => "tovar/show/$1/$2/$3/$4",
    "main/index" => "main/index",
    "main/contacts" => "main/contacts",
);
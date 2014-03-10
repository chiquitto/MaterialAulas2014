<?php

require 'IPizzaria.php';
require 'IPizza.php';
require 'Pizzaria.php';
require 'Pizza.php';
require 'PizzaBacon.php';
require 'PizzaCalabresa.php';

$pizzaria = new Pizzaria();

$pizzaBacon = $pizzaria->factory('bacon');
$pizzaCalabresa = $pizzaria->factory('calabresa');
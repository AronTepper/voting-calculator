<?php

require 'ResultCalculator.php';
require 'TotalResult.php';
require 'PartyResult.php';
require 'Vote.php';

$resultCalculator = new ResultCalculator();

function createVote(int $id, bool $isFor, string $personName, string $partyName): Vote
{
    $vote = new Vote();
    $vote->setId($id);
    $vote->setIsFor($isFor);
    $vote->setPersonName($personName);
    $vote->setPartyName($partyName);

    return $vote;
}

$votes = [
    createVote(1, true, "Alice", "Burgers in Beweging"),
    createVote(2, false, "Bob", "Landgenoten"),
    createVote(3, true, "Charlie", "Partij voor de Burger"),
    createVote(4, false, "Dave", "Groenland"),
    createVote(5, true, "Eve", "Radicaal Burgerland"),
    createVote(6, true, "Fiona", "Burgers in Beweging"),
    createVote(7, false, "George", "Landgenoten"),
    createVote(8, true, "Hannah", "Partij voor de Burger"),
    createVote(9, false, "Ian", "Groenland"),
    createVote(10, true, "Jasmine", "Radicaal Burgerland"),
    createVote(11, true, "Kevin", "Burgers in Beweging"),
    createVote(12, false, "Laura", "Landgenoten"),
    createVote(13, true, "Michael", "Partij voor de Burger"),
    createVote(14, false, "Nina", "Groenland"),
    createVote(15, true, "Oscar", "Radicaal Burgerland"),
    createVote(16, false, "Paul", "Burgers in Beweging"),
    createVote(17, true, "Quinn", "Landgenoten"),
    createVote(18, false, "Rachel", "Partij voor de Burger"),
    createVote(19, true, "Steve", "Groenland"),
    createVote(20, false, "Tina", "Radicaal Burgerland"),
    createVote(21, true, "Uma", "Burgers in Beweging"),
    createVote(22, false, "Victor", "Landgenoten"),
    createVote(23, true, "Wendy", "Partij voor de Burger"),
    createVote(24, false, "Xander", "Groenland"),
    createVote(25, true, "Yara", "Radicaal Burgerland"),
    createVote(26, false, "Zack", "Burgers in Beweging"),
    createVote(27, true, "Abby", "Landgenoten"),
    createVote(28, false, "Ben", "Partij voor de Burger"),
    createVote(29, true, "Cathy", "Groenland"),
    createVote(30, false, "Daniel", "Radicaal Burgerland"),
];

$result = $resultCalculator->calculateResult($votes);

echo $result;


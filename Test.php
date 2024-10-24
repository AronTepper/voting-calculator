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
];

$result = $resultCalculator->calculateResult($votes);

echo $result;


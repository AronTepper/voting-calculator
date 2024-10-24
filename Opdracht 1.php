<?php

$totalCitizens = 20000;
$votedYes = 0;
$votedNo = 0;
$noOpinion = 0;
$divisibilityYes = 4;
$divisibilityNo = 7;
$divisibilityNoOpinion = $divisibilityYes * $divisibilityNo;

for ($i = 1; $i <= $totalCitizens; $i++) {
    if ($i % $divisibilityNoOpinion === 0) {
        $noOpinion++;
    } elseif ($i % $divisibilityYes === 0) {
        $votedYes++;
    } elseif ($i % $divisibilityNo === 0) {
        $votedNo++;
    }
}

echo "Aantal burgers die 'wel' hebben geantwoord: $votedYes\n";
echo "Aantal burgers die 'niet' hebben geantwoord: $votedNo\n";
echo "Aantal burgers die 'welniet' hebben geantwoord: $noOpinion\n";
?>

<?php

$totalCitizens = 20000;
$votedYes = 0;
$votedNo = 0;
$votedNoOpinion = 0;
$divisibilityYes = 4;
$divisibilityNo = 7;
$divisibilityNoOpinion = $divisibilityYes * $divisibilityNo;

for ($i = 1; $i <= $totalCitizens; $i++) {
    if ($i % $divisibilityNoOpinion === 0) {
        $votedNoOpinion++;
    } elseif ($i % $divisibilityYes === 0) {
        $votedYes++;
    } elseif ($i % $divisibilityNo === 0) {
        $votedNo++;
    }
}

function calculateExtraLetters($letters) {
    $totalExtraLetters = $letters;
    $newLetters = $letters;

    while ($newLetters >= 10) {
        $extraLetters = floor($newLetters / 10);
        $totalExtraLetters += $extraLetters;
        $newLetters = $extraLetters;
    }

    return $totalExtraLetters;
}

$nonResponders = $totalCitizens - ($votedYes + $votedNo + $votedNoOpinion);
$totalLetters = $totalCitizens + calculateExtraLetters($nonResponders);
echo "Maximaal aantal brieven: " . $totalLetters  . "\n";
?>

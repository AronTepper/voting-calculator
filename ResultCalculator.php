<?php

class ResultCalculator
{

    /**
     * @param Vote[] $votes
     *
     * @return string
     */
    public function calculateResult(array $votes): string
    {
        $totalResult = new TotalResult();

        foreach ($votes as $vote) {
            $partyName = $vote->getPartyName();

            if (!isset($partyResults[$partyName])) {
                $partyResult = new GO\Stemgedrag\Models\PartyResult();
                $partyResult->setPartyName($partyName);
                $partyResult->setAmountFor(0);
                $partyResult->setAmountAgainst(0);
                $partyResults[$partyName] = $partyResult;
            }

            if ($vote->isFor()) {
                $partyResults[$partyName]->setAmountFor($partyResults[$partyName]->getAmountFor() + 1);
            } else {
                $partyResults[$partyName]->setAmountAgainst($partyResults[$partyName]->getAmountAgainst() + 1);
            }
        }

        $totalResult->setPartyResults($partyResults);

        $totalFor = 0;
        $totalAgainst = 0;

        foreach ($partyResults as $partyResult) {
            $totalFor += $partyResult->getAmountFor();
            $totalAgainst += $partyResult->getAmountAgainst();
        }

        $totalResult->setIsAccepted($totalFor > $totalAgainst);

        $result = $totalResult->isAccepted() ? "aangenomen" : "afgewezen";

        return "Deze stemming is " . $result . ".";
    }

}
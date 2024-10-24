<?php

class ResultCalculator
{
    /**
     * @var int
     */
    private $totalVotesFor = 0;

    /**
     * @var int
     */
    private $totalVotesAgainst = 0;

    /**
     * @var TotalResult
     */
    private $totalResult;

    /**
     * @var GO\Stemgedrag\Models\PartyResult[]
     */
    private $partyResults = [];

    public function __construct()
    {
        $this->totalResult = new TotalResult();
        $this->partyResults = [];
    }

    /**
     * @param Vote[] $votes
     *
     * @return string
     */
    public function calculateResult(array $votes): string
    {
        foreach ($votes as $vote) {
            $partyName = $vote->getPartyName();

            if (!isset($this->partyResults[$partyName])) {
                $partyResult = new GO\Stemgedrag\Models\PartyResult();
                $partyResult->setPartyName($partyName);
                $partyResult->setAmountFor(0);
                $partyResult->setAmountAgainst(0);
                $this->partyResults[$partyName] = $partyResult;
            }

            if ($vote->isFor()) {
                $this->partyResults[$partyName]->setAmountFor($this->partyResults[$partyName]->getAmountFor() + 1);
                $this->totalVotesFor++;
            } else {
                $this->partyResults[$partyName]->setAmountAgainst($this->partyResults[$partyName]->getAmountAgainst() + 1);
                $this->totalVotesAgainst++;
            }
        }

        $this->totalResult->setPartyResults($this->partyResults);

        $resultsByParty = "Stemmen per partij:\n \n";
        foreach ($this->partyResults as $partyResult) {

            $resultsByParty .= "Partij: " . $partyResult->getPartyName() . "\n";
            $totalPartyVotes = $partyResult->getAmountFor() + $partyResult->getAmountAgainst();
            $resultsByParty .= "Totaal stemmen: " . $totalPartyVotes . "\n";
            $resultsByParty .=  "Voor: " . $partyResult->getAmountFor() . "\n";
            $resultsByParty .=  "Tegen: " . $partyResult->getAmountAgainst() . "\n \n";
        }

        $this->totalResult->setIsAccepted($this->totalVotesFor > $this->totalVotesAgainst);

        $result = $this->totalResult->isAccepted() ? "aangenomen" : "afgewezen";


        return $resultsByParty . "Deze stemming is " . $result . " met " . $this->totalVotesFor . " stemmen voor en " . $this->totalVotesAgainst . " stemmen tegen. \n";
    }
}

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
    public function calculateResult(array $votes): string {
        foreach ($votes as $vote) {
            $this->updatePartyResults($vote);
        }

        $this->totalResult->setPartyResults($this->partyResults);
        $this->totalResult->setIsAccepted($this->totalVotesFor > $this->totalVotesAgainst);

        return $this->generateResultOutput();
    }

    private function updatePartyResults(Vote $vote): void
    {
        $partyName = $vote->getPartyName();
        if (!isset($this->partyResults[$partyName])) {
            $partyResult = new GO\Stemgedrag\Models\PartyResult();
            $partyResult->setPartyName($partyName);
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

    private function generateResultOutput(): string
    {
        $resultsByParty = "Stemmen per partij:\n\n";
        foreach ($this->partyResults as $partyResult) {
            $totalPartyVotes = $partyResult->getAmountFor() + $partyResult->getAmountAgainst();
            $resultsByParty .= sprintf(
                "Partij: %s\nTotaal stemmen: %d\nVoor: %d\nTegen: %d\n\n",
                $partyResult->getPartyName(),
                $totalPartyVotes,
                $partyResult->getAmountFor(),
                $partyResult->getAmountAgainst()
            );
        }

        $result = $this->totalResult->isAccepted() ? "aangenomen" : "afgewezen";
        return $resultsByParty . "Deze stemming is " . $result . " met " . $this->totalVotesFor . " stemmen voor en " . $this->totalVotesAgainst . " stemmen tegen.\n";
    }
}

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




        //TODO implement calculation method.




        if ($totalResult->isAccepted()) {
            $result = "aangenomen";
        } else {
            $result = "afgewezen";
        }

        echo "Deze stemming is " + $result + ".";
    }

}
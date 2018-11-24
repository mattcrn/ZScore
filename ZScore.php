<?php

namespace ZScore;

class ZScore
{

    private $minAverageViews = 50;
    private $days;
    private $totalViews;
    private $totalSquaredViews;

    function __construct($days = 0, $totalViews = 0, $totalSquaredViews = 0)
    {
        if (is_int($days) && ($days >= 0) && is_int($totalViews) && ($totalViews >= 0) && is_int($totalSquaredViews) && ($totalSquaredViews >= 0)) {

            $this->days = $days;
            $this->totalViews = $totalViews;
            $this->totalSquaredViews = $totalSquaredViews;

        } else {

            throw new Exception("The ZScore Object must get initialized with positive numbers!", 1);

        }

    }

    public function update($views)
    {

        if (!(is_int($views) && ($views >= 0))) {
            throw new Exception(" ZScore::update(): views needs to be a positive number", 1);
        }

        $this->days++;
        $this->totalViews += $views;
        $this->totalSquaredViews += pow($views, 2);

    }

    private function standardDeviation()
    {
        return sqrt(($this->totalSquaredViews / $this->days) - pow($this->averageViews(), 2));
    }

    private function averageViews()
    {
        return $this->totalViews / $this->days;
    }

    public function calcZScore($views)
    {
        if (!(is_int($views) && ($views >= 0))) {
            throw new Exception("Views needs to be a positive number", 1);
        }

        if($this->days < 2) {
            return 0;
        }

        if($this->averageViews() < $this->minAverageViews) {
            return 0;
        }

        if($this->standardDeviation() == 0) {
            return $views - $this->averageViews();
        }

        return ($views - $this->averageViews()) / $this->standardDeviation();

    }


    /**
     * Get the value of days
     */ 
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Get the value of totalViews
     */ 
    public function getTotalViews()
    {
        return $this->totalViews;
    }

    /**
     * Get the value of totalSquaredViews
     */ 
    public function getTotalSquaredViews()
    {
        return $this->totalSquaredViews;
    }
}

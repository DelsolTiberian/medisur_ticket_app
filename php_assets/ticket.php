<?php

class ticket
{
    public $status;
    public $type;
    public $date;
    public $amount;
    public $owner;
    public $description;
    public $justification;

    function __construct($status, $type, $date, $amount, $owner, $description, $justification) {
        $this->status = $status;
        $this->type = $type;
        $this->date = $date;
        $this->amount = $amount;
        $this->owner = $owner;
        $this->description = $description;
        $this->justification = $justification;
    }

    function display() {
        $str = "<div>";
        switch ($this->status) {

        }
    }
}
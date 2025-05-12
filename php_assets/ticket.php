
<?php

class Ticket
{
    public $status;
    public $type;
    public $date;
    public $amount;
    public $owner;
    public $description;
    public $justification;

    function __construct($info) {
        $this->status = $info['status'];
        $this->type = $info['expense_category_name'];;
        $this->date = $info['creation_datetime'];
        $this->amount = $info['amount'];
        $this->owner = $info['last_name'] . " " . $info['first_name'];
        $this->description = $info['description'];
        $this->justification = $info['receipt'];
    }

    function display() {
        $str = "<div class='ticket-bg'> <div class='ticket-top'>";
        switch ($this->status) {
            case 3:
                $str .= "<img src='../assets/condition_3.png' alt='status 3'/> ";
                break;
            case 2:
                $str .= "<img src='../assets/condition_2.png' alt='status 2'/> ";
                break;
            default:
                $str .= "<img src='../assets/condition_1.png' alt='status 1'/> ";
        }
        $str .= "<span class='type'>" .  $this->type . "</span> <span class='date'>" . $this-> date . "</span> <span>" . $this -> amount ."€</span> </div> </div>";
        echo $str;


    }
}

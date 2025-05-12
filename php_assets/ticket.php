
<?php

class Ticket
{
    public static $count = 0;
    public $id;
    public $status;
    public $type;
    public $date;
    public $amount;
    public $owner;
    public $description;
    public $justification;

    function __construct($info) {
        $this->id = self::$count;
        self::$count++;
        $this->status = $info['status'];
        $this->type = $info['exp_cat_name'];;
        $this->date = $info['creation_datetime'];
        $this->amount = $info['amount'];
        $this->owner = $info['last_name'] . " " . $info['first_name'];
        $this->description = $info['description'];
        $this->justification = $info['receipt'];
    }

    function display() {
        $str = "<div class='ticket' data-index ='". $this->id . "'' data-status = '" . $this->status . "' data-category = '" . $this->type . "' data-date= '" . $this->date . "' data-amount = '" . $this->amount . "' > 
                    <div class='ticket-top'>";
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
                        $str .= "<span class='type'>"
                            .$this->type .
                        "</span> 
                        <span class='date'>"
                            . $this-> date .
                        "</span> 
                        <span>"
                            . $this -> amount .
                        "€</span> 
                    </div>
                    <div class='ticket-bottom hide'> 
                        <div class='owner'>"
                            . $this->owner .
                        "</div> 
                        <div class='description'>"
                            . $this->description .
                        "</div> 
                        <a class='receipt-download' href='../assets/receipt/" . $this->justification . "' download>
                            <svg width='200' height='200' viewBox='0 0 200 200' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M108.333 16.6667H50C45.5798 16.6667 41.3405 18.4226 38.2149 21.5482C35.0893 24.6738 33.3334 28.9131 33.3334 33.3334V166.667C33.3334 171.087 35.0893 175.326 38.2149 178.452C41.3405 181.577 45.5798 183.333 50 183.333H150C154.42 183.333 158.66 181.577 161.785 178.452C164.911 175.326 166.667 171.087 166.667 166.667V75M108.333 16.6667L166.667 75M108.333 16.6667V75H166.667' stroke='#1E1E1E' stroke-width='25' stroke-linecap='round' stroke-linejoin='round'/></svg>
                            Download
                        </a>
                    </div> 
                </div>";;
        echo $str;
    }
}
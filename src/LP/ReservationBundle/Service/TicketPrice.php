<?php
/**
 * Created by PhpStorm.
 * User: radoncode
 * Date: 22/02/18
 * Time: 13:13
 */

namespace LP\ReservationBundle\Service;

use LP\ReservationBundle\Entity\Ticket;

class TicketPrice
{

    private $birthday;


    public function setFormReduction( $reduction,Ticket $ticket)
    {
        if ($reduction){
            $ticket->setReduction(true);
        }else{
            $ticket->setReduction(false);
        }

    }

    public function setFormBirthday($birthday)
    {

        $this->birthday = $birthday;
    }


    public function formattingDate()
    {

        $now = new \Datetime('now');
        $interval = $this->birthday->diff($now);
        $birthdayFormat = $interval->format('%y');
        $birthday = (int)$birthdayFormat;

        return  $birthday;

    }
    public function priceLoading(Ticket $ticket)
    {


        if ($this->formattingDate()< 4)
        {
            $ticket->setPrice(0);


        } elseif (($this->formattingDate() >= 4) && ($this->formattingDate()< 12))
        {
            $ticket->setPrice(8);
        } elseif (($this->formattingDate() >= 12) && ($this->formattingDate() < 60))
        {
            if ($ticket->getReduction())
            {
                $ticket->setPrice(10);
            } else {
                $ticket->setPrice(16);
            }
        } elseif ($this->formattingDate() >= 60)
        {
            if ($ticket->getReduction())
            {
                $ticket->setPrice(10);
            } else {
                $ticket->setPrice(12);
            }
        }
    }
}




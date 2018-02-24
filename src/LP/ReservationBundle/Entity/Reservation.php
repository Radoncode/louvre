<?php

namespace LP\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LP\ReservationBundle\Entity\Ticket;
use LP\ReservationBundle\Entity\ReservationDate;

/**
 * Reservation
 *
 * @ORM\Table(name="lp_reservation")
 * @ORM\Entity(repositoryClass="LP\ReservationBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var array
     *
     * @ORM\Column(name="type", type="array")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date")
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

 

    /**
     * @var string
     * 
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="LP\ReservationBundle\Entity\Ticket", mappedBy="reservation")
     */
    private $tickets;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservationdate", type="date")
     */
    private $reservationdate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    

    /**
     * Set type
     *
     * @param array $type
     *
     * @return Reservation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return array
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Reservation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Reservation
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return Reservation
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Reservation
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add ticket
     *
     * @param \LP\ReservationBundle\Entity\Ticket $ticket
     *
     * @return Reservation
     */
    public function addTicket(Ticket $ticket)
    {
        $this->tickets[] = $ticket;

        $ticket->setReservation($this);

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \LP\ReservationBundle\Entity\Ticket $ticket
     */
    public function removeTicket(Ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Reservation
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set reservationdate.
     *
     * @param \DateTime $reservationdate
     *
     * @return Reservation
     */
    public function setReservationdate($reservationdate)
    {
        $this->reservationdate = $reservationdate;

        return $this;
    }

    /**
     * Get reservationdate.
     *
     * @return \DateTime
     */
    public function getReservationdate()
    {
        return $this->reservationdate;
    }
}

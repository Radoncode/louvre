<?php

namespace LP\ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LP\ReservationBundle\Entity\Reservation;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ReservationDate
 *
 * @ORM\Table(name="lp_reservation_date")
 * @ORM\Entity(repositoryClass="LP\ReservationBundle\Repository\ReservationDateRepository")
 */
class ReservationDate
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
     * @var \DateTime
     *
     * @ORM\Column(name="dated", type="datetime")
     */
    private $dated;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\OneToMany(targetEntity="LP\ReservationBundle\Entity\Reservation",mappedBy="reservationdate")
     */
    private $reservations;

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
     * Set dated
     *
     * @param \DateTime $dated
     *
     * @return ReservationDate
     */
    public function setDated($dated)
    {
        $this->dated = $dated;

        return $this;
    }

    /**
     * Get dated
     *
     * @return \DateTime
     */
    public function getDated()
    {
        return $this->dated;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return ReservationDate
     */
    public function setNumber($number)
    {
        
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    /**
     * Add reservation
     *
     * @param \LP\ReservationBundle\Entity\Reservation $reservation
     *
     * @return ReservationDate
     */
    public function addReservation(Reservation $reservation)
    {
        $this->reservations[] = $reservation;

        $reservation->setReservationdate($this);

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \LP\ReservationBundle\Entity\Reservation $reservation
     */
    public function removeReservation(Reservation $reservation)
    {
        $this->reservations->removeElement($reservation);
    }

    /**
     * Get reservations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservations()
    {
        return $this->reservations;
    }
}

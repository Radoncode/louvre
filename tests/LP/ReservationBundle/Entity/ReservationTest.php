<?php

namespace Tests\LP\ReservationBundle\Entity;

use PHPUnit\Framework\TestCase;
use LP\ReservationBundle\Entity\Reservation;


class ReservationTest extends TestCase
{
	public function testsetTypeBilletjournee()
	{
		$reservation = new Reservation();
		$result = $reservation->setType('billetjournee');
		                      
		$this->assertSame($reservation,$result);
	}
}

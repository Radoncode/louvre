<?php

namespace Tests\LP\ReservationBundle\Entity;

use LP\ReservationBundle\Entity\ReservationDate;
use PHPUnit\Framework\TestCase;

class ReservationDateTest extends TestCase
{
	public function testsetDatedNow()
	{
		$reservationDate = new ReservationDate();
		$result = $reservationDate->setDated('now');

        $this->assertSame($reservationDate,$result);
	}
}
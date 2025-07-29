<?php

interface ReservationDAO {
    public function addReservation($nbrPersonne, $message, $date, $idUser);
}
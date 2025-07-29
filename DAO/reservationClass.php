<?php

Class Reservation {
    private $id;
    private $nbrPersonne;
    private $message;
    private $dateReservation;
    private $idUser;

    /**
     * @param $id
     * @param $nbrPersonne
     * @param $message
     * @param $idUser
     */
    public function __construct($id, $nbrPersonne, $message, $dateReservation, $idUser)
    {
        $this->id = $id;
        $this->nbrPersonne = $nbrPersonne;
        $this->message = $message;
        $this->dateReservation = $dateReservation;
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNbrPersonne()
    {
        return $this->nbrPersonne;
    }

    /**
     * @param mixed $nbrPersonne
     */
    public function setNbrPersonne($nbrPersonne)
    {
        $this->nbrPersonne = $nbrPersonne;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * @param mixed $dateReservation
     */
    public function setDateReservation($dateReservation): void
    {
        $this->dateReservation = $dateReservation;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

}
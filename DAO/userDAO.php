<?php

interface UserDAO {
  public function getUser($email, $password);
  public function addUser($nom, $prenom, $phone, $email, $password);
}

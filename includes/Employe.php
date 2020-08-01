<?php
class Employe
{
    private $id, $nom, $prenom, $email, $pole, $poste, $date_emb, $statut;
    // private static $id_e = 1;
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPole()
    {
        return $this->pole;
    }
    public function getPoste()
    {
        return $this->poste;
    }
    public function getDate_emb()
    {
        return $this->date_emb;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function __construct($id, $nom, $prenom, $email, $pole, $poste, $date_emb, $statut)
    {
        // self::$id_e++;
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pole = $pole;
        $this->poste = $poste;
        $this->date_emb = $date_emb;
        $this->statut = $statut;
    }

}

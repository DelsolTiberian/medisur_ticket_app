<?php
class Users {
    public $Photo, $Nom, $Prenom, $ID, $Poste, $Email, $MotDepasse, $Createur;

    function __construct($Photo, $Nom, $Prenom, $ID, $Poste, $Email, $MotDepasse, $Createur) {
        $this->Photo = $Photo;  
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->ID = $ID;
        $this->Poste = $Poste;
        $this->Email = $Email;
        $this->MotDepasse = $MotDepasse;
        $this->Createur = $Createur;
    }

    public function getNom() {
        return $this->Nom;
    }

    public function getPrenom() {
        return $this->Prenom;
    }

    public function getPoste() {
        return $this->Poste;
    }

    function display() {
        return "
        <div class='user-card'>
            <div class='user-header'>
                <div class='info'>
                    <img src='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/person-circle.svg' alt='Icon' width='24' height='24' />
                    <span>{$this->Nom} {$this->Prenom}</span>
                </div>
                <span>{$this->ID}</span>
            </div>
            <p>Poste: {$this->Poste}</p>
            <p>Email: {$this->Email}</p>
            <p>Mot de passe: {$this->MotDepasse}</p>
            <div class='user-footer'>
                <span>Créer par: {$this->Createur}</span>
                <span>Modifier par: {$this->Createur}</span>
            </div>
        </div>";
    }
}
?>

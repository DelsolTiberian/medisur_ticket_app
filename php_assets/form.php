<link rel="stylesheet" href="../style/form.css">
<?php

echo '<form class="log-user center" action="index.php" method="post" enctype="multipart/form-data">';
if ($Dprenom == true) {
    echo '<input class="log-input log-user-input" type="text" placeholder="       Prenom" name="first-name"/>';
}
if ($Dnom == true) {
    echo '<input class="log-input log-user-input" type="text" placeholder="       Nom" name="last_name"/>';
}
if ($Dpassword == true) {
    echo '<input class="log-input log-user-input" type="password" placeholder="       Mot De Passe" name="password"/>';
}
if ($Dtypedepense == true) {
    echo '<select class="log-input log-user-input" name="typeDep">
     <option value=""><strong>Type de dépense</strong></option>
     <option value="admin">Admin</option>
     <option value="commercial">Commercial</option>
     <option value="comptable">Comptable</option>
     </select>';
}
if ($Dmontant==true) {
    echo '<input class="log-input log-user-input" type="text" placeholder="       Montant" name="montant"/>';
}
if ($Ddescription==true) {
    echo '<input class="log-justif-description" type="text" placeholder="       Description" name="description"/>';
}

if ($Drole==true) {
    echo '<select class="log-input log-user-input" name="role">
     <option value=""><strong>Rôle Utilisateur</strong></option>
     <option value="admin">Admin</option>
     <option value="commercial">Commercial</option>
     <option value="comptable">Comptable</option>
     </select>';
}

if ($Djustif==true){
    echo '<label class="log-input-file" for="proof"> Importer Justificatif </label>;
     <input type="file" name="prouf" id="proof" accept="application/pdf, image/png, image/jpeg" style="display: none"/>';
}
if ($Dvalidation==true and $Danullation==true){
    echo '<div style="margin: 0 auto; display: flex; gap: 10vh; padding-top: 40vh; justify-content: center;">

   <div style="display: flex; flex-direction: column; align-items: center;">
    <img src="../assets/iconcheck.png" style="max-height: 6vh;" alt="Valider">
    <h2 style="font-family: Roboto, sans-serif; font-size: 200%; text-align: center;">Valider</h2>
     </div>;
    
   <div style="display: flex; flex-direction: column; align-items: center;">;
    <img src="../assets/iconcross.png" style="max-height: 6vh;" alt="Annuler">;
     <h2 style="font-family: Roboto, sans-serif; font-size: 200%; text-align: center;">Annuler</h2>;
    </div>;
   echo </div>';
}
echo '</form>';
?>

<link rel="stylesheet" href="../style/form.css">
<?php
function Form($flags = []) {
    echo '<form class="log-user center" action="index.php" method="post" enctype="multipart/form-data">';

    if (!empty($flags['prenom'])) {
        echo "<input class='log-input log-user-input' type='text' placeholder=' Prenom' name='first-name'/>";
    }

    if (!empty($flags['nom'])) {
        echo "<input class='log-input log-user-input' type='text' placeholder=' Nom' name='last_name'/>";
    }

    if (!empty($flags['userlist'])) {
        echo '<select class="log-input log-user-input" name="role">';
        echo '<option value="">Rôle Utilisateur</option>';
        foreach (['admin', 'tib', 'tsiory'] as $opt) {
            echo "<option value=\"$opt\">$opt</option>";
        }
        echo '</select>';
    }

    if (!empty($flags['password'])) {
        echo '<input class="log-input log-user-input" type="password" placeholder=" Mot De Passe" name="password"/>';
    }

    if (!empty($flags['typedepense'])) {
        echo '<select class="log-input log-user-input" name="typeDep">';
        echo '<option value="">Type de dépense</option>';
        foreach (['admin', 'commercial', 'comptable'] as $opt) {
            echo "<option value=\"$opt\">$opt</option>";
        }
        echo '</select>';
    }

    if (!empty($flags['montant'])) {
        echo "<input class='log-input log-user-input' type='text' placeholder=' Montant' name='montant'/>";
    }

    if (!empty($flags['description'])) {
        echo "<input class='log-justif-description' type='text' placeholder=' Description' name='description'/>";
    }

    if (!empty($flags['role'])) {
        echo '<select class="log-input log-user-input" name="role">';
        echo '<option value="">Rôle Utilisateur</option>';
        foreach (['admin', 'commercial', 'comptable'] as $opt) {
            echo "<option value=\"$opt\">$opt</option>";
        }
        echo '</select>';
    }

    if (!empty($flags['pfp'])) {
        echo '<label class="log-input-file" for="proof">Photo</label>';
        echo '<input type="file" name="prouf" id="proof" accept="application/pdf, image/png, image/jpeg" style="display: none"/>';
    }

    if (!empty($flags['justif'])) {
        echo '<label class="log-input-file" for="proof">Importer Justificatif</label>';
        echo '<input type="file" name="prouf" id="proof" accept="application/pdf, image/png, image/jpeg" style="display: none"/>';
    }

    if (!empty($flags['validation']) && !empty($flags['anullation'])) {
        echo '
        <div class=container-valid>
            <button type="submit" class="sub-button">
                <img src="../assets/iconcheck.png" style="max-height: 6vh;" alt="Valider">
                <h2 class="sub-button-text-alt">Valider</h2>
            </button>

            <a href="../pages/user_main.php" class="sub-button">
                <img src="../assets/iconcross.png" style="max-height: 6vh;" alt="Annuler">
                <h2 class="sub-button-text">Annuler</h2>
            </a>
        </div>';
    }

    echo '</form>';
}
?>


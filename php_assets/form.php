<link rel="stylesheet" href="../style/form.css">
<?php
function Form($flags = []) {
    echo '<form class="log-user center" method="post" enctype="multipart/form-data">';

    if (!empty($flags['prenom'])) {
        echo "<input class='log-input log-user-input' type='text' placeholder=' Prenom' name='first-name'/>";
    }

    if (!empty($flags['nom'])) {
        echo "<input class='log-input log-user-input' type='text' placeholder=' Nom' name='last_name'/>";
    }

    if (!empty($flags['email'])) {
        echo "<input class='log-input-mail log-user-input' type='text' placeholder=' Email' name='email'/>";
    }

    if (!empty($flags['userlist'])) {
        echo '<select class="log-input-scroll log-user-input" name="userlist">';
        echo '<option value="">Utilisateur</option>';

        try {
            $pdo = new PDO("sqlite:../database.sqlite");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT id, first_name, last_name FROM user ORDER BY last_name ASC");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $userId = $row['id'];
                $fullName = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
                echo "<option value=\"$userId\">$fullName</option>";
            }
        } catch (PDOException $e) {
            echo "<option disabled>Erreur de chargement des utilisateurs</option>";
        }

        echo '</select>';
    }

    if (!empty($flags['password'])) {
        echo '<input class="log-input log-user-input" type="password" placeholder=" Mot De Passe" name="password"/>';
    }

    if (!empty($flags['typedepense'])) {
        echo '<select class="log-input-scroll log-user-input" name="typeDep">';
        echo '<option value="">Type de dépense</option>';

        $options = [
            '1' => 'logement',
            '2' => 'restauration',
            '3' => 'transport'
        ];

        foreach ($options as $value => $label) {
            echo "<option value=\"$value\">$label</option>";
        }

        echo '</select>';
    }

    if (!empty($flags['montant'])) {
        echo "<input class='log-input-money log-user-input' type='text' placeholder=' Montant' name='montant'/>";
    }

    if (!empty($flags['description'])) {
        echo "<textarea class='log-justif-description' placeholder='Description' name='description'></textarea>";
    }

    if (!empty($flags['role'])) {
        echo '<select class="log-input-scroll log-user-input" name="role">';
        echo '<option value="">Rôle</option>';

        $options = [
            '1' => 'admin',
            '2' => 'commercial',
            '3' => 'contable'
        ];

        foreach ($options as $value => $label) {
            echo "<option value=\"$value\">$label</option>";
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
                <img src="../assets/validate.png" style="max-height: 6vh;" alt="Valider">
                <h2 class="sub-button-text-alt">Valider</h2>
            </button>

            <a href="../pages/user_main.php" class="sub-button">
                <img src="../assets/cancel.png" style="max-height: 6vh;" alt="Annuler">
                <h2 class="sub-button-text">Annuler</h2>
            </a>
        </div>';
    }

    echo '</form>';
}
?>


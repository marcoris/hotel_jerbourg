<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Umsatz pro Kategorie pro Monat</h2>

    <form action="<?php echo URL; ?>employee/create" method="post">
        <label for="personalnumber">Personalnummer:<span class="required-star">*</span></label><input type="text" id="personalnumber" name="personalnumber"><br>
        <label for="salutation">Anrede:<span class="required-star">*</span></label>
        <select name="salutation" id="salutation">
            <option value="1">Herr</option>
            <option value="0">Frau</option>
        </select><br>
        <label for="firstname">Vorname:<span class="required-star">*</span></label><input type="text" id="firstname" name="firstname"><br>
        <label for="lastname">Name:<span class="required-star">*</span></label><input type="text" id="lastname" name="lastname"><br>
        <label for="category">Kategorie:<span class="required-star">*</span></label>
        <select name="category" id="category">
            <option value="1">Lokführer</option>
            <option value="2">Kontrolleur</option>
            <option value="3">Büro</option>
        </select><br>
        <label for="absence">Absenz:<span class="required-star">*</span></label>
        <select name="absence" id="absence">
            <option value="1">Arbeit</option>
            <option value="2">Ferien</option>
            <option value="3">Krank</option>
        </select><br>
        <label for="login">Login:<span class="required-star">*</span></label><input type="text" id="login" name="login"><br>
        <label for="password">Passwort:<span class="required-star">*</span></label><input type="text" id="password" name="password"><br>
        <label for="role">Rolle:<span class="required-star">*</span></label>
        <select name="role" id="role">
            <option value="3">Mitarbeiter</option>
            <option value="2">Disponent</option>
        </select><br>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
    <hr>
    <h2>Mitarbeiterliste</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nr.</td>
                <th>Personalnummer</td>
                <th>Anrede</td>
                <th>Vorname</td>
                <th>Name</td>
                <th>Login</td>
                <th>Rolle</td>
                <th>Kategorie</td>
                <th>Bearbeiten</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($this->employeeList as $key => $value) {
                if (strtolower($value['absence']) == 3) {
                    echo '<tr class="krank">';
                } elseif (strtolower($value['absence']) == 2) {
                    echo '<tr class="ferien">';
                } else {
                    echo '<tr>';
                }
                echo '<td>' . $i . '.</td>';
                echo '<td>' . $value['personalnumber'] . '</td>';
                echo '<td>';
                if ($value['salutation'] == 1) {
                    echo 'Herr';
                } else {
                    echo 'Frau';
                }
                echo '</td>';
                echo '<td>' . $value['firstname'] . '</td>';
                echo '<td>' . $value['lastname'] . '</td>';
                echo '<td>' . $value['login'] . '</td>';
                echo '<td>';
                if ($value['role'] == 1) {
                    echo 'Admin';
                } else if ($value['role'] == 2) {
                    echo 'Disponent';
                } else {
                    echo 'Mitarbeiter';
                }
                echo '</td>';
                echo '<td>';
                if ($value['category'] == 1) {
                    echo 'Lokführer';
                } else if ($value['category'] == 2) {
                    echo 'Kontrolleur';
                } else {
                    echo 'Büro';
                }
                echo '</td>';
                echo '<td>';
                if ((Session::get('usergroup') == 1) || ($value['role'] >= 2 && Session::get('usergroup') >= 2))
                echo '<a class="btn btn-success" href="' . URL . 'employee/edit/' . $value['employee_id'] . '"><i class="fas fa-pen"></i></a>';
                if ($value['role'] == 3 || ($value['role'] == 2 && Session::get('usergroup') == 1))
                echo '<a class="btn btn-danger delete" href="' . URL . 'employee/delete/' . $value['employee_id'] . '"><i class="fas fa-trash"></i></a>';
                echo '</td>';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
    <label><strong>Legende</strong></label><br>
    <label class="ferien">Ferien</label>
    <label class="krank">Krank</label>
</div>
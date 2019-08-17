<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Mitarbeiter <strong><?php echo $this->employee[0]['login']; ?></strong> bearbeiten</h2>
    <form action="<?php echo URL; ?>employee/editSave/<?php echo $this->employee[0]['employee_id']; ?>" method="post">
        <label for="personalnumber">Personalnummer:<span class="required-star">*</span></label><input type="text" id="personalnumber" name="personalnumber" value="<?php echo $this->employee[0]['personalnumber']; ?>"><br>
        <label for="salutation">Anrede:<span class="required-star">*</span></label>
        <select name="salutation" id="salutation">
        <?php
        for ($i=0; $i < 2; $i++) {
            echo "<option value='$i'";
            if ($this->employee[0]['salutation'] == $i) {
                echo 'selected';
            }
            echo '>';
            if ($i == 1) {
                echo 'Herr';
            } else {
                echo 'Frau';
            }
            echo "</option>";
        }
        ?>
        </select><br>
        <label for="firstname">Vorname:<span class="required-star">*</span></label><input type="text" id="firstname" name="firstname" value="<?php echo $this->employee[0]['firstname']; ?>"><br>
        <label for="lastname">Name:<span class="required-star">*</span></label><input type="text" id="lastname" name="lastname" value="<?php echo $this->employee[0]['lastname']; ?>"><br>
        <label for="category">Kategorie:<span class="required-star">*</span></label>
        <select name="category" id="category">
        <?php
        for ($i=1; $i <= 3; $i++) {
            echo "<option value='$i'";
            if ($this->employee[0]['category'] == $i) {
                echo 'selected';
            }
            echo '>';
            if ($i == 1) {
                echo 'Lokführer';
            } else if ($i == 2) {
                echo 'Kontrolleur';
            } else {
                echo 'Büro';
            }
            echo "</option>";
        }
        ?>
        </select><br>
        <label for="absence">Absenz:<span class="required-star">*</span></label>
        <select name="absence" id="absence">
        <?php
        for ($i=1; $i <= 3; $i++) {
            echo "<option value='$i'";
            if ($this->employee[0]['absence'] == $i) {
                echo 'selected';
            }
            echo '>';
            if ($i == 1) {
                echo 'Arbeit';
            } else if ($i == 2) {
                echo 'Ferien';
            } else {
                echo 'Krank';
            }
            echo "</option>";
        }
        ?>
        </select><br>
        <label for="login">Login:<span class="required-star">*</span></label><input type="text" id="login" name="login" value="<?php echo $this->employee[0]['login']; ?>"><br>
        <label for="password">Passwort:<span class="required-star">*</span></label><input type="text" id="password" name="password"><br>
        <?php
        if ($this->employee[0]['role'] > 1) : ?>
        <label for="role">Rolle:<span class="required-star">*</span></label>
        <select name="role" id="role">
        <?php
        for ($i=3; $i > 1; $i--) {
            echo "<option value='$i'";
            if ($this->employee[0]['role'] == $i) {
                echo 'selected';
            }
            echo '>';
            if ($i == 3) {
                echo 'Mitarbeiter';
            } else {
                echo 'Disponent';
            }
            echo "</option>";
        }
        ?>
        </select><br>
        <?php endif; ?>
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
        <button class="btn btn-primary edit" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>
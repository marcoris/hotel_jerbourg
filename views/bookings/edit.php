<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Rollmaterial <strong><?php echo $this->rollmaterial[0]['number']; ?></strong> bearbeiten</h2>
    <form action="<?php echo URL; ?>rollmaterial/editSave/<?php echo $this->rollmaterial[0]['rollmaterial_id']; ?>" method="post">
    <label for="number">Nummer:<span class="required-star">*</span></label><input type="text" id="number" name="number" value="<?php echo $this->rollmaterial[0]['number']; ?>"><br>
        <label for="type">Typ:<span class="required-star">*</span></label>
        <select name="type" id="type">
        <?php
        for ($i=1; $i < 3; $i++) {
            echo "<option value='$i'";
            if ($this->rollmaterial[0]['type'] == $i) {
                echo 'selected';
            }
            echo '>';
            if ($i == 1) {
                echo 'Lokomotive';
            } else {
                echo 'Waggon';
            }
            echo "</option>";
        }
        ?>
        </select><br>
        <label for="date_of_commissioning">Erste Inbetriebnahme:<span class="required-star">*</span></label><input type="text" id="date_of_commissioning" name="date_of_commissioning" value="<?php echo $this->rollmaterial[0]['date_of_commissioning']; ?>"><br>
        <label for="date_of_last_revision">Letzte Revision:<span class="required-star">*</span></label><input type="text" id="date_of_last_revision" name="date_of_last_revision" value="<?php echo $this->rollmaterial[0]['date_of_last_revision']; ?>"><br>
        <label for="date_of_next_revision">Nächste Revision:<span class="required-star">*</span></label><input type="text" id="date_of_next_revision" name="date_of_next_revision" value="<?php echo $this->rollmaterial[0]['date_of_next_revision']; ?>"><br>
        <label for="class">Klasse:<span class="required-star">*</span></label>
        <select name="class" id="class">
            <?php
            for ($i=0; $i < 3; $i++) {
                echo "<option value='$i'";
                if ($this->rollmaterial[0]['class'] == $i) {
                    echo 'selected';
                }
                echo '>';
                if ($i == 0) {
                    echo '-';
                } else if ($i == 1) {
                    echo '1. Klasse';
                } else {
                    echo '2. Klasse';
                }
                echo "</option>";
            }
            ?>
        </select><br>
        <label for="seating">Sitzplätze:<span class="required-star">*</span></label><input type="number" id="seating" name="seating" value="<?php echo $this->rollmaterial[0]['seating']; ?>"><br>
        <label for="availability">Verfügbar:<span class="required-star">*</span></label>
        <select name="availability" id="availability">
            <option value="1" <?php echo ($this->rollmaterial[0]['availability'] == 1) ? 'selected' : '' ?>>Ja</option>
            <option value="0" <?php echo ($this->rollmaterial[0]['availability'] == 0) ? 'selected' : '' ?>>Nein</option>
        </select><br>
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>
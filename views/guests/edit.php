<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Station <strong><?php echo $this->station[0]['station_name']; ?></strong> bearbeiten</h2>
    <form action="<?php echo URL; ?>station/editSave/<?php echo $this->station[0]['station_id']; ?>" method="post">
    <label for="station_name">Name:<span class="required-star">*</span></label><input type="text" id="station_name" name="station_name" value="<?php echo $this->station[0]['station_name']; ?>"><br>
        <label for="station_time">Zeit:<span class="required-star">*</span></label><input type="text" id="station_time" name="station_time" value="<?php echo $this->station[0]['station_time']; ?>"><br>
        <label for="station_sequence">Reihenfolge:<span class="required-star">*</span></label><input type="text" id="station_sequence" name="station_sequence" value="<?php echo $this->station[0]['sequence']; ?>"><br>
        <label for="station_to_line">Linie:<span class="required-star">*</span></label>
        <select name="station_to_line" id="station_to_line">
        <?php
            foreach($this->getLines as $key => $value) {
                echo '<option value="' . $value['line_id'] . '" ' . ($this->getLineToStation[0]['line_id'] == $value['line_id'] ? 'selected' : '') . '>' . $value['line_name'] . '</option>';
            }
            ?>
        </select><br>
        <label for="station_status">Status:<span class="required-star">*</span></label>
        <select name="station_status" id="station_status">
            <?php
            for ($i=0; $i < 3; $i++) {
                echo "<option value='$i'";
                if ($this->station[0]['station_status'] == $i) {
                    echo 'selected';
                }
                echo '>';
                if ($i == 1) {
                    echo 'Endstation';
                } else if ($i == 2) {
                    echo 'Hauptbahnhof';
                } else {
                    echo 'Station';
                }
                echo "</option>";
            }
            ?>
        </select><br>
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>
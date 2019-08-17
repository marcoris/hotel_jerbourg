<div class="jumbotron jumbotron-fluid loggedin">
    <h2>Linie <strong><?php echo $this->line[0]['line_name']; ?></strong> bearbeiten</h2>
    <form action="<?php echo URL; ?>line/editSave/<?php echo $this->line[0]['line_id']; ?>" method="post">
        <label for="line_name">Linien-Name:<span class="required-star">*</span></label><input type="text" id="line_name" name="line_name" value="<?php echo $this->line[0]['line_name']; ?>"><br>
        <a class="btn btn-primary" href="javascript:history.back();"><i class="fas fa-chevron-left"></i> Zurück</a>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Speichern</button>
    </form>
</div>
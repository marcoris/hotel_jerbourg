        <div class="footer">
            <small><em>(C) <?php echo date("Y"); ?> LOAG - Ländliche Ostbahnen AG</em></small>
        </div>
        <script src="<?php echo URL; ?>public/jquery/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo URL; ?>public/bootstrap/js/bootstrap.min.js"></script>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script src="'.URL.'views/'.$js.'"></script>';
            }
        }
        ?>
    </body>
</html>
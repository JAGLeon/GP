<?php if(isset($this->controlador) && file_exists(str_replace(constant('URL'),"",constant('JSPUB').$this->controlador.".js"))) { ?>
<script src="<?php echo constant('JSPUB').$this->controlador; ?>.js?<?php echo rand(0,300000); ?>"></script>
<?php } ?>
<script src="<?php echo constant('CSSBOOS'); ?>js/bootstrap.min.js"></script>
</body>
</html>
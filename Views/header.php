<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo constant('TITLE')?></title>
    <link rel="stylesheet" href="<?php echo constant("CSSBOOS") ?>css/bootstrap.min.css">
    <script src="<?php echo constant('JSPUBCMM'); ?>jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo constant('JSPUB'); ?>default.js?<?php echo rand(0,300000); ?>" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="<?php echo constant("CSSPUB") ?>default.css?"<?php echo rand(0, 300000) ?>>
    <?php if(isset($this->controlador) && file_exists(str_replace(constant('URL'),"",constant("CSSPUB").$this->controlador.".css"))){ ?>
    <link rel="stylesheet" href="<?php echo constant("CSSPUB").$this->controlador.".css" ?>">
    <?php } ?>
    
</head>
<body>
    
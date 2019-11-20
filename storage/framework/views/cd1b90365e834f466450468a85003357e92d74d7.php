<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
  <link rel="stylesheet" type="text/css" href="/css/menu.css">
  <link rel="stylesheet" type="text/css" href="/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="/css/lightbox.css">
  <link href="http://fonts.googleapis.com/css?family=Russo+One&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
</head>
<body>
<div class="elitteh-container">
    <?php echo $__env->make('parts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="small-3 columns">
          <?php echo $__env->make('parts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="small-9 columns">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<div class="el-contacts-container"></div>
<div class="g-map-canvas-wrapper">
        <div id="g-map-canvas"></div>
        <div class="close-btn"></div>
</div>
<?php echo $__env->make('parts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript" src="/js/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/modernizr.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/foundation.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/lightbox.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/app.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/menu.js" charset="utf-8"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDTXlIctyH7VzpBVZ0HLhryBYDgrkVTYlA&amp;sensor=SET_TO_TRUE_OR_FALSE"></script>
<script type="text/javascript" src="/js/analytics.js" charset="utf-8" style=""></script>
</body>
</html>
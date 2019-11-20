<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="./css/app.css">
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


     <?php echo $__env->make('parts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</body>
</html>
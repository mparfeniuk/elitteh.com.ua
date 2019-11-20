<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo e($name); ?></title>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
  <link rel="stylesheet" type="text/css" href="/css/menu.css">
  <link rel="stylesheet" type="text/css" href="/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="/css/lightbox.css">
  <link href="http://fonts.googleapis.com/css?family=Russo+One&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter47632981 = new Ya.Metrika({
                        id:47632981,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/47632981" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

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
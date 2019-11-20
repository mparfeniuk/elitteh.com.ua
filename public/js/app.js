// Foundation JavaScript
// Documentation can be found at: https://web.archive.org/web/20161018094811/http://foundation_project.zurb.com/docs
Foundation.set_namespace = function() {};
//$(document).foundation();
// Price info
var Prices = (function($){
  var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1),
    ajax = {
      type: "GET",
      async: false,
      url: '/prices.json',
      dataType: "json",
      contentType: "application/json"
    }

  var getPrice = function() {
    var a = $.ajax(ajax),
      res = '';
    a.done(function (data) {
      res = data;
    });
    return res;
  };

  var parsePrice = function() {
    $currentPrice = $('#price-info span[data-currentprice]');
    var jsonObj = getPrice();
    $(jsonObj.prices).each(function(i,v){
      if(v.name == pgurl){
        var currency = (v.currency == 1) ? currency = "грн." : currency = "$";
        if(v.array == 1) {
          $(v.values).each(function(i,v){
            i++;
            $('.price-info span[data-order='+i+']').html(v + " " + currency);
          });
        }
        else {
          $currentPrice.html(v.values + " " + currency);
        }
      }
    });
  }

  // Adminka work
  var parcePriceForAdminka = function() {
    if(pgurl == "price_info"){
      var jsonObj = getPrice();
      $infoForm = $('.price_info_form');
      $getAllInputs = $infoForm.find('.price_info');

      $(jsonObj.prices).each(function(i,v){
        var price = v,
          c_type = "";


        if(price.array == 0) {
          $('.price_info_form .price_info').each(function (i, v) {
            var that = this;
            $cv = $(that).attr('name');

            if ($cv == price.name) {
              $(that).val(price.values);
            }

          });
        } else {
          $('.price_info_form .price_info_array').each(function() {
            c_type = $(this).data('type');
            if (c_type == price.name){
              var t_order = $(this).data('order')-1;
              $(this).val(price.values[t_order]);
            }
          });
        }

      });

    }
  }

  var buildingPriceAgain = function(){

    var newObj = {
        prices : []
      },
      abc;


    $('.price_info_form input').each(function(i,v){
      if($(this).hasClass('price_info')){
        newObj.prices[i] = {
          "name" : $(this).attr('name'),
          "values" : $(this).val(),
          "currency" : 1,
          "array" : 0
        };
      }
      else if($(this).hasClass('price_info_array')) {

        if(typeof $groupe !== "undefined" && $groupe == $(this).data('type')){
          newObj.prices[abc].values.push($(this).val());
        }
        else {
          newObj.prices[i] = {
            "name" : $(this).data('type'),
            "values" : [$(this).val()],
            "currency" : 1,
            "array" : 1
          };

          abc = i;
          $groupe = $(this).data('type');
        }

      }

    });

    var na = [],
      num = 0;

    $.each(newObj.prices, function(i,v){
      if(v != undefined){
        na[num] = v;
        num++;
      }
    });

    newObj.prices = na;
    return (JSON.stringify(newObj, null, '\t'));

  }

  var pushingChanges = function() {
    $('.price_info_form').submit(function(e) {
      e.preventDefault();
      var priceJson = buildingPriceAgain();
      ajax = {
        type: "POST",
        data: "responce="+priceJson,
        url: "/pushPrice",
        success: function(data){
          $('.alert-box.success').removeClass('alert-close').find('span').html(data);
        }
      }
      $.ajax(ajax);
    });
  }

  return {
    parsePrice : parsePrice,
    parcePriceForAdminka : parcePriceForAdminka,
    pushingChanges : pushingChanges
  }


})(jQuery);

var Elitteh = (function($){
  var galMenu = function(){
    var $m_button = $('#cssmenu .elit-galery'),
      $m_block = $('header nav .galery-menu--block');

    $m_button.bind({
      mouseover : function(){
        $m_button.addClass('hovered');
        $m_block.show();
      },
      mouseleave: function(){
        setTimeout(function(){
          (!$m_block.hasClass('hovered')) ? $m_block.hide() : false;
        },200);
        $m_button.removeClass('hovered');
      }
    });

    $m_block.bind({
      mouseover : function(){
        $m_block.addClass('hovered');
      },
      mouseleave: function(){
        $m_block.removeClass('hovered');
        $m_block.hide();
      }
    })

  };

  return {
    galMenu : galMenu
  }
})(jQuery);

$(document).ready(function(){

  //web.archive.org/web/20161018094811/http://jQuery/ ismouseover  method
  (function($){
    $.mlp = {x:0,y:0}; // Mouse Last Position
    function documentHandler(){
      var $current = this === document ? $(this) : $(this).contents();
      $current.mousemove(function(e){jQuery.mlp = {x:e.pageX,y:e.pageY}});
      $current.find("iframe").load(documentHandler);
    }
    $(documentHandler);
    $.fn.ismouseover = function(overThis) {
      var result = false;
      this.eq(0).each(function() {
        var $current = $(this).is("iframe") ? $(this).contents().find("body") : $(this);
        var offset = $current.offset();
        result =    offset.left<=$.mlp.x && offset.left + $current.outerWidth() > $.mlp.x &&
          offset.top<=$.mlp.y && offset.top + $current.outerHeight() > $.mlp.y;
      });
      return result;
    };
  })(jQuery);

  $('.close').click(function(e){
    e.preventDefault();
    $(this).parent().addClass('alert-close');
  });

  $('.passRefreshLink').click(function(e){
    e.preventDefault();
    if($('.passRefresh').hasClass('hide')){
      $('.passRefresh').removeClass('hide').addClass('show');
    }
    else {
      $('.passRefresh').removeClass('show').addClass('hide');
    }
  });
  var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
  $(".elitteh-side-nav li a").each(function(){
    if($(this).attr("href") == "/"+pgurl || $(this).attr("href") == '' )
      $(this).addClass("active");
  })

  $('.elit-contacts, .g-map-canvas-wrapper .close-btn').click(function(e){
    e.preventDefault();
    showTheMap();
  });

  $(document).keyup(function(e){
    if(e.keyCode == 27){
      showTheMap();
    }
  });

  function showTheMap() {
    var container = $('.el-contacts-container, .g-map-canvas-wrapper');
    if(container.css('display') != 'block'){
      container.css('display','block');
      initialize();
    }
    else {
      container.css('display','none');
    };
  };

  function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng(50.260395, 28.702577),
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("g-map-canvas"),
      mapOptions);
    var content = elitteh.company+"<br>"+elitteh.address+"<br><a href='mailto:"+elitteh.email+"'>"+elitteh.email+"</a><br>"+elitteh.phone;
    var infowindow = new google.maps.InfoWindow({
      map: map,
      position: new google.maps.LatLng(50.260395, 28.702577),
      content: content
    });
  };

  Prices.parsePrice();
  Prices.parcePriceForAdminka();
  Prices.pushingChanges();
  Elitteh.galMenu();

});

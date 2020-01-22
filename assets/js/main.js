jQuery(document).ready(function($) {

  $('.hu-header-mob_slide form').submit(function(event) {
    event.preventDefault();

    window.location.href = hu_loadmore_params.blog_url + '?s=' + $('input', this).val();

  });

  $(window).load(function() {

    if ($('.lazy-video').length) {
      $(".lazy-video source").each(function() {
        var sourceFile = $(this).attr("data-src");
        $(this).attr("src", sourceFile);
        var video = this.parentElement;
        video.load();
        video.play();
      });
    }

  });

  if ($('.flex-video').length) {

    console.log($('.flex-video'));
    
    setInterval(function() {
      $(window).trigger('resize');
      $(window).resize();

      $('.flex-video').each(function(index, el) {
        $('.mejs-container', this).height($(this).outerHeight());
      });

    }, 1000);

  }

  if ($('.ml12').length && $(window).width() > 991) {

    // Wrap every letter in a span
    $('.ml12').each(function(index, el) {
      var words = $(this).html().split(" ");
      var _this = $(this);


      $(this).text('');
      
      $.each(words, function(i, v) {

        if (v.includes('<br>')) {
          $(_this).append(v);
        }
        else if (v.includes('&amp;')) {
          $(_this).append($("<span class='word'><span class='letter'>&</span></span>"));
          $(_this).html($(_this).html() + ' ');
        }
        else {
          $(_this).append($("<span class='word'>").html(v.replace(/\S/g, "<span class='letter'>$&</span>")));
          $(_this).html($(_this).html() + ' ');
        }
      });

    });

    $('.ml12').waypoint(function(direction){
      $(this['element']).each(function(index, el) {

        if (!$(this).hasClass('animated')) {
        
          anime.timeline({loop: false})
          .add({
            targets: el.querySelectorAll('.letter'),
            translateX: [40,0],
            translateZ: 0,
            opacity: [0,1],
            easing: "easeOutExpo",
            duration: 1200,
            delay: (el, i) => 500 + 30 * i
          });

          $(this).addClass('animated');

        }

      });
    }, {offset: '90%'});

  }

  if ($('.ml9').length) {

    $('.ml9 .letters').each(function(index, el) {
      var words = $(this).html().split(" ");
      var _this = $(this);

      $(this).text('');
      
      $.each(words, function(i, v) {

        if (v.includes('<br>')) {
          $(_this).append(v);
        }
        else {
          $(_this).append($("<span class='word'>").html(v.replace(/\S/g, "<span class='letter'>$&</span>")));
          $(_this).html($(_this).html() + ' ');
        }
      });

    });

    anime.timeline({loop: false})
    .add({
      targets: '.ml9.active .letter',
      scale: [0, 1],
      duration: 1500,
      elasticity: 0,
      delay: (el, i) => 45 * (i+1) + 1500
    }).add({
      targets: '.ml9.active',
      opacity: 0,
      duration: 1000,
      easing: "easeOutExpo",
      delay: 4000
    });

    if ($('.hu-home-intro h1').length) {

      var hu_header_timer = 6500;

      setInterval(function() {

        var hu_is_next_slide_header = false;

        $('.hu-home-intro h1').each(function(index, el) {

          if ($(this).hasClass('active') && !hu_is_next_slide_header) {
            $(this).removeClass('active');

            if ($(this).next('h1').length) {
              $(this).next('h1').addClass('active');
            }
            else {
              $('.hu-home-intro h1').first().addClass('active');
            }
            hu_is_next_slide_header = true;
            // $('.letter', this).css('transform', '0');

          }

        });

        anime.timeline({loop: false})
          .add({
            targets: '.ml9.active .letter',
            scale: [0, 1],
            duration: 1500,
            elasticity: 0,
            delay: (el, i) => 45 * (i+1)
          }).add({
            targets: '.ml9.active',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 4000
          }).add({
            targets: '.ml9',
            opacity: 1
          });

      }, hu_header_timer);

    }

  }

  var can_animate_header = true;
  $('.hu-header-trigger').on('click touch', function(event) {
    event.preventDefault();

    if (!can_animate_header) {
      return;
    }

    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
      $('#hu-wrapper').removeClass('hu-active_slide');
      $('.hu-header-mob_slide').removeClass('active');
    }
    else {
      $(this).addClass('active');
      $('#hu-wrapper').addClass('hu-active_slide');
      $('.hu-header-mob_slide').addClass('active');
    }

  });

  if ($(window).width() > 1200) {

    $('.hu-header-drop > span').hover(function() {
      $('.hu-header-dropdown').fadeIn(400);
    }, function() {
      $('.hu-header-dropdown').fadeOut(400);
    });

  }
  else {

    $('.menu-item-has-children > a').each(function(index, el) {
      $(this).append('<div class="ae-plus"><i></i><i></i></div>');
    });

    $(document.body).on('click touch', '.menu-item-has-children a .ae-plus', function(event) {
      event.preventDefault();

      if ($(this).closest('li').hasClass('active')) {
        $(this).closest('li').removeClass('active');
        $(this).removeClass('active');
        $(this).closest('li').find('.sub-menu').slideUp(400);
      }
      else {
        $(this).closest('li').addClass('active');
        $(this).addClass('active');
        $(this).closest('li').find('.sub-menu').slideDown(400);
      }

    });

  }

  if ($('.myCountdown').length) {
    loopcounter('myCountdown');
  }

  if ($('.mo-anim-text').length && $(window).width() > 991) {

    var animated_texts = [];

    $('.mo-anim-text').each(function(index, el) {
      $(this).addClass('mo-anim-text-' + index);
    });

    $('.mo-anim-text').waypoint(function(direction){
      $(this['element']).each(function(index, el) {

        if (!$(this).hasClass('animated')) {

          animated_texts.push(
            lining(el, {
              'autoResize': true
            })
          );

          $(this).addClass('animated');
        }

      });
    }, {offset: '90%'});

  }

  if ($(window).width() > 991) {

    // var mo_allow_anim = false;

    // setTimeout(function(){

      $('.mo-anim-fade_time').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Under_Small 1s ' + $(this).data('delay') + 's forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-fadein_time').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Apear 1s ' + $(this).data('delay') + 's forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-under').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Under 1s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-under_slow').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Under 2s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-fade').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Apear 1s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-fade_slow').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Apear 2s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-right').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Right 1s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-right_slow').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Right 2s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-left').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Left 1s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-left_slow').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Left 2s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-drop').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Drop 1s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-drop_slow').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).css('animation', 'Drop 2s forwards');
        });
      }, {offset: '90%'});

      $('.mo-anim-image').waypoint(function(e, direction){
        $(this['element']).each(function(index, el) {
          $(this).addClass('animated');
        });
      }, {offset: '90%'});

    // }, 0);

  }

  $('.hu-header-search-icon i').on('click touch', function(event) {
    event.preventDefault();
    
    if ($(this).hasClass('fa-search')) {
      $('#ajaxsearchlite1').css('display', 'block');
      $(this).closest('.hu-header-search-icon').addClass('active');
    }
    else {
      $('#ajaxsearchlite1').css('display', 'none');
      $(this).closest('.hu-header-search-icon').removeClass('active');
    }

  });

});

function getURLParameters(paramName)
{
    var sURL = window.document.URL.toString();
    if (sURL.indexOf("?") > 0)
    {
        var arrParams = sURL.split("?");
        var arrURLParams = arrParams[1].split("&");
        var arrParamNames = new Array(arrURLParams.length);
        var arrParamValues = new Array(arrURLParams.length);

        var i = 0;
        for (i = 0; i<arrURLParams.length; i++)
        {
            var sParam =  arrURLParams[i].split("=");
            arrParamNames[i] = sParam[0];
            if (sParam[1] != "")
                arrParamValues[i] = unescape(sParam[1]);
            else
                arrParamValues[i] = "No Value";
        }

        for (i=0; i<arrURLParams.length; i++)
        {
            if (arrParamNames[i] == paramName)
            {
                //alert("Parameter:" + arrParamValues[i]);
                return arrParamValues[i];
            }
        }
        return "";
    }
}

function is_null(num) {
    if (num == null || typeof num == typeof undefined || num !== num) {
        return true;
    }
    else {
        return false;
    }
}

function copyStringToClipboard(str) {
   // Create new element
   var el = document.createElement('textarea');
   // Set value (string to be copied)
   el.value = str;
   // Set non-editable to avoid focus and move outside of view
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   // Select text inside element
   el.select();
   // Copy text to clipboard
   document.execCommand('copy');
   // Remove temporary element
   document.body.removeChild(el);
}

var supports_video_autoplay = function(callback) {

  var v = document.createElement("video");
  v.paused = true;
  var p = "play" in v && v.play();
  
  typeof callback === "function" && callback(!v.paused || "Promise" in window && p instanceof Promise);
  
};


(function($) {
  var injector, methods;
  injector = function(t, splitter, klass, after) {
    var a, inject;
    a = t.html().split(splitter);
    inject = "";
    if (a.length) {
      $(a).each(function(i, item) {
        return inject += "<span class=\"" + klass + (i + 1) + "\">" + item + "</span>" + after;
      });
      return t.empty().append(inject);
    }
  };
  methods = {
    line: function() {
      return this.each(function() {
        var collection, counter, inject, lastY, words;
        injector($(this), " ", "word", " ");
        words = $(this).find("span[class^='word']");
        collection = [];
        lastY = 0;
        inject = "";
        counter = 1;
        words.each(function(i) {
          var y;
          y = $(this).offset().top;
          if (y !== lastY && i !== 0) {
            inject += "<span class='text-line" + counter + "'>" + (collection.join('')) + "</span>";
            collection = [];
            counter++;
          }
          collection.push($(this).html() + " ");
          if (i === words.length - 1) {
            inject += "<span class='text-line" + counter + "'>" + (collection.join('')) + "</span>";
          }
          return lastY = y;
        });
        return $(this).empty().append(inject);
      });
    },
    unline: function() {
      this.each(function() {
        var inject, lines;
        lines = $(this).find("span[class^='text-line']");
        if (lines.length) {
          inject = "";
          lines.each(function() {
            return inject += $(this).html();
          });
          return $(this).empty().append(inject);
        }
      });
      return this;
    }
  };
  return $.fn.lining = function(method) {
    if (method && methods[method]) {
      return methods[method].apply(this, [].slice.call(arguments, 1));
    } else if (method === "line" || !method) {
      return methods.line.apply(this, [].slice.call(arguments, 0));
    }
    $.error("Method " + method + " does not exist on jQuery.lining");
    return this;
  };
})(jQuery);

// ---
// generated by coffee-script 1.9.2
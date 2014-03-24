(function() {
  // http://www.zachstronaut.com/posts/2009/01/18/jquery-smooth-scroll-bugs.html
  var scrollElement = 'html, body';
  var $scrollElement;

  $(function() {
    $('html, body').each(function () {
      var initScrollLeft = $(this).attr('scrollLeft');
      
      $(this).attr('scrollLeft', initScrollLeft + 1);
      if ($(this).attr('scrollLeft') == initScrollLeft + 1) {
        scrollElement = this.nodeName.toLowerCase();
        $(this).attr('scrollLeft', initScrollLeft);
        return false;
      }    
    });
    $scrollElement = $(scrollElement);
  });

  /* Smooth scrolling of links between panels */
  $(function() {
    var $panels = $('.panel');

    $panels.each(function() {
      var $panel = $(this);
      var hash = '#' + this.id;

      $('a[href="' + hash + '"]').click(function(event) {
        $scrollElement.stop().animate({
          scrollLeft: $panel.offset().left
        }, 500, 'swing', function() {
          window.location.hash = hash;
        });

        event.preventDefault();
      });
    });
  });

  /* Panel waypoints for setting high-level location classes on body. */
  $(function() {
    var $body = $('body');

    $('.panel')
      .waypoint(function(direction) {
        $body.toggleClass(this.id + '-visible', direction === 'right');
      }, {
        offset: '50%',
        horizontal: true
      })
      .waypoint(function(direction) {
        $body.toggleClass(this.id + '-visible', direction === 'left');
      }, {
        offset: '-50%',
        horizontal: true
      });
  });

  /* Force snap to panel on resize. */
  $(function() {
    var $window = $(window);
    var timer;

    $window.resize(function() {
      window.clearTimeout(timer);
      timer = window.setTimeout(function() {
        var hash = window.location.hash ? window.location.hash : '#index';

        $scrollElement.stop().animate({
          scrollLeft: $(hash).offset().left
        }, 200);
      }, 100);
    });
  });

  /* Fix scroll snapping during browser finds */
  $(function() {
    var $window = $(window);
    var timer;

    /* Most finds will scroll a single panel. */
    var scrollToPanel = function(panel) {
      $scrollElement.scrollLeft($(panel).offset().left);
    };

    /* Others will scroll between panels but not cause a panel scroll */
    var scrollToClosestPanel = function() {
      var currentScroll = $window.scrollLeft();
      var panelOffsets = $.map($('.panel').get(), function(el) {
        return $(el).offset().left;
      });
      var closestOffset = 0;
      var closestDistance = 99999999;

      $.each(panelOffsets, function(i, offset) {
        var offsetDistance = Math.abs(currentScroll - offset);
        if(offsetDistance < closestDistance) {
          closestDistance = offsetDistance;
          closestOffset = offset;
        }
      });
      $scrollElement.scrollLeft(closestOffset);
    };

    $('.panel').scroll(function() {
      window.clearTimeout(timer);
      timer = window.setTimeout(scrollToPanel, 50, this);
    });

    /* 50ms is enough time to let the animation between panels do its
       thing without triggering this debounced panel snap. */
    $window.scroll(function() {
      window.clearTimeout(timer);
      timer = window.setTimeout(scrollToClosestPanel, 50);
    });
  });
  /* Centering for index and Shortcut panels */
  $(function() {
    var $window = $(window);
    var $centered = $('#index .inner, #blog .inner')

    var center = function() {
      var winHeight = $.waypoints('viewportHeight');

      $centered.each(function() {
        var $el = $(this);
        var top = (winHeight - $el.height()) / 2;

        top = top > 80 ? top : 80;
        $el.css('top', top);
      })
    };

    center();
    $window.load(center).resize(center);
  });
})();
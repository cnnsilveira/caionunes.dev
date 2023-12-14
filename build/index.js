/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scss/style.scss */ "./src/scss/style.scss");
/* harmony import */ var _js_FrontPage__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/FrontPage */ "./src/js/FrontPage.js");
/* harmony import */ var _js_Header__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/Header */ "./src/js/Header.js");
/* harmony import */ var _js_Particles__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js/Particles */ "./src/js/Particles.js");
/* harmony import */ var _js_StringEffect__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./js/StringEffect */ "./src/js/StringEffect.js");
/* harmony import */ var _js_ScrollingEvents__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./js/ScrollingEvents */ "./src/js/ScrollingEvents.js");
// SCSS import.


// Scripts import.





jQuery(document).ready(() => {
  const frontPage = new _js_FrontPage__WEBPACK_IMPORTED_MODULE_1__["default"]();
  const header = new _js_Header__WEBPACK_IMPORTED_MODULE_2__["default"]();
  const particles = new _js_Particles__WEBPACK_IMPORTED_MODULE_3__["default"]();
  const scrollingEvents = new _js_ScrollingEvents__WEBPACK_IMPORTED_MODULE_5__["default"]();
  const stringEffect = new _js_StringEffect__WEBPACK_IMPORTED_MODULE_4__["default"](jQuery('.string-effect'));
});

/***/ }),

/***/ "./src/js/FrontPage.js":
/*!*****************************!*\
  !*** ./src/js/FrontPage.js ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
class FrontPage {
  constructor() {
    this.events();
  }
  events() {
    jQuery($ => {
      function toggleTabContent() {
        $('.cndev__section[data-content="about"] p.content').each((index, selector) => {
          if ($('.cndev__section[data-content="about"] .selector .cndev__button.active').attr('id') === $(selector).data('tab-content')) {
            setTimeout(() => {
              $(selector).slideDown(500);
            }, 400);
          } else {
            $(selector).slideUp(300);
          }
        });
      }

      // Scroll event.
      var heroContent = $(".fade-out-effect");
      var blueBackground = $('.cndev__particles .overlay.bottom');
      $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();
        // Hero fade.
        $(heroContent).css({
          opacity: function () {
            var elementHeight = $(this).height();
            return 0 + (elementHeight - scrollTop) / elementHeight;
          }
        });
        $(blueBackground).css({
          bottom: function () {
            return -scrollTop;
          }
        });
      });

      // Background movement.
      var movementStrength = 50;
      var height = movementStrength / $(window).height();
      var width = movementStrength / $(window).width();
      $(window).mousemove(e => {
        var pageX = e.pageX - $(window).width() / 2;
        var pageY = e.pageY - $(window).height() / 2;
        var newValueX = width * pageX;
        var newValueY = height * pageY;
        $('.cndev__particles canvas').css("right", newValueX + "px ");
        $('.cndev__particles canvas').css("bottom", newValueY + "px");
      });

      // Scrolling to sections.
      $('.cndev__section_link').on('click', event => {
        $('html, body').animate({
          scrollTop: $('.cndev__section[data-content="' + $(event.target).data('content') + '"]').offset().top
        }, 0);
      });

      // Tabs content.
      toggleTabContent();
      $('.cndev__section[data-content="about"] .selector .cndev__button').on('click', event => {
        $(event.target).addClass('active');
        $(event.target).siblings().removeClass('active');
        toggleTabContent();
      });

      // Prev/next section icons.
      const availableSections = {
        'about': 'Who\'s Caio?',
        'projects': 'My work',
        'contact': 'Get in touch'
      };
      const firstSection = Object.keys(availableSections)[0];
      const lastSection = Object.keys(availableSections).pop();
      const reverseKeys = Object.keys(availableSections).reverse();
      // Prev loop.
      $('.cndev__prev_section').on('click', e => {
        let nextChecker = 0;
        let toReturn;
        $.each(reverseKeys, (index, key) => {
          var value = availableSections[key];
          if (0 < nextChecker) {
            showHideIcons(e.target, key, firstSection);
            $('.cndev__next_section').show();
            $('h2.section-title').html(value);
            $('h2.section-title').attr('id', key);
            $('#cndev__current-section').val(key);
            toReturn = key;
            return false;
          }
          if (value === $('h2.section-title').html()) {
            nextChecker++;
          }
        });
        contentChange(toReturn);
      });
      // Next loop.
      $('.cndev__next_section').on('click', e => {
        let nextChecker = 0;
        let toReturn;
        $.each(availableSections, (key, value) => {
          if (0 < nextChecker) {
            showHideIcons(e.target, key, lastSection);
            $('.cndev__prev_section').show();
            $('h2.section-title').html(value);
            $('h2.section-title').attr('id', key);
            $('#cndev__current-section').val(key);
            toReturn = key;
            return false;
          }
          if (value === $('h2.section-title').html()) {
            nextChecker++;
          }
        });
        contentChange(toReturn);
      });
      function showHideIcons(element, key, section) {
        if (key === section) {
          $(element).hide();
        } else {
          $(element).show();
        }
      }
      // Content.
      function contentChange(key) {
        $('.cndev__section[data-content="about"] .content').each((index, selector) => {
          if ($(selector).data('content') === key) {
            $(selector).show();
          } else {
            $(selector).hide();
          }
        });
      }
      ;
      $('.project-thumb--click').on('click', e => {
        toggleProjects($(e.target).parent(), $('[data-project-id]'));
      });
      function toggleProjects(thumb, element) {
        $(element).each((index, selector) => {
          if ($(selector).data('project-id') === $(thumb).data('project-id')) {
            $(selector).addClass('active');
            $(thumb).parent().addClass('active');
          } else {
            $(selector).removeClass('active');
            $(thumb).parent().removeClass('active');
          }
        });
      }
    });
  }
}
/* harmony default export */ __webpack_exports__["default"] = (FrontPage);

/***/ }),

/***/ "./src/js/Header.js":
/*!**************************!*\
  !*** ./src/js/Header.js ***!
  \**************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
class Header {
  constructor() {
    this.events();
  }
  events() {
    jQuery(function ($) {
      /**
       * onClassChange extension.
       * @source https://stackoverflow.com/questions/19401633/how-to-fire-an-event-on-class-change-using-jquery
       */
      $.fn.onClassChange = function (cb) {
        return $(this).each((_, el) => {
          new MutationObserver(mutations => {
            mutations.forEach(mutation => cb && cb(mutation.target, mutation.target.className));
          }).observe(el, {
            attributes: true,
            attributeFilter: ['class'] // only listen for class attribute changes 
          });
        });
      };

      // Loader spinner

      $(window).on('load', () => {
        setTimeout(() => {
          $('.cndev__loader').toggleClass('loading complete');
          setTimeout(() => {
            $('.cndev__loader').slideUp(500);
            setTimeout(() => {
              $('.cndev__loader').remove();
            }, 600);
          }, 1500);
        }, 750);
      });

      // Scroll event.
      if ($(window).scrollTop() > 0 && !$('body').hasClass('scrolled')) {
        $('body').addClass('scrolled');
      }
      $(window).scroll(function () {
        if ($(this).scrollTop() > $(window).height() / 2) {
          $('body').addClass('scrolled');
        } else {
          $('body').removeClass('scrolled');
        }
      });

      // Scroll to top.
      $('header .cndev__svg, .cndev__header--scroll').on('click', () => {
        $('html, body').animate({
          scrollTop: 0
        }, 0);
      });

      // Inner content.

      $("header").onClassChange((el, newClass) => {
        if ($('header').hasClass('scrolled')) {
          $('.cndev__header--inner').css({
            background: 'linear-gradient(360deg, #0807082a, #00000000)',
            backdropFilter: 'blur(20px)',
            width: '1000px'
          });
        } else {
          $('.cndev__header--inner').css({
            width: '135px'
          });
          setTimeout(() => {
            $('.cndev__header--inner').css({
              background: 'none',
              blur: '0px'
            });
          }, 250);
        }
      });
    });
  }
}
/* harmony default export */ __webpack_exports__["default"] = (Header);

/***/ }),

/***/ "./src/js/Particles.js":
/*!*****************************!*\
  !*** ./src/js/Particles.js ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
class Particles {
  constructor() {
    this.events();
  }
  events() {
    jQuery(function ($) {
      particlesJS("particles-js", {
        particles: {
          number: {
            value: 160,
            density: {
              enable: false,
              value_area: 800
            }
          },
          color: {
            value: "#ffffff"
          },
          shape: {
            type: "circle",
            stroke: {
              width: 0,
              color: "#000000"
            },
            polygon: {
              nb_sides: 3
            },
            image: {
              src: "img/github.svg",
              width: 100,
              height: 100
            }
          },
          opacity: {
            value: 1,
            random: true,
            anim: {
              enable: true,
              speed: 1,
              opacity_min: 0,
              sync: false
            }
          },
          size: {
            value: 1,
            random: false,
            anim: {
              enable: true,
              speed: 0,
              size_min: 0,
              sync: true
            }
          },
          line_linked: {
            enable: false,
            distance: 150,
            color: "#ffffff",
            opacity: 0.4,
            width: 1
          },
          move: {
            enable: true,
            speed: 0.05,
            direction: "top",
            random: true,
            straight: false,
            out_mode: "out",
            bounce: false,
            attract: {
              enable: false,
              rotateX: 600,
              rotateY: 600
            }
          }
        },
        interactivity: {
          detect_on: "canvas",
          events: {
            onhover: {
              enable: false,
              mode: "grab"
            },
            onclick: {
              enable: false,
              mode: "repulse"
            },
            resize: true
          },
          modes: {
            grab: {
              distance: 73.08694910712106,
              line_linked: {
                opacity: 1
              }
            },
            bubble: {
              distance: 250,
              size: 0,
              duration: 2,
              opacity: 0,
              speed: 3
            },
            repulse: {
              distance: 400,
              duration: 0.4
            },
            push: {
              particles_nb: 4
            },
            remove: {
              particles_nb: 2
            }
          }
        },
        retina_detect: true
      });
    });
  }
}
/* harmony default export */ __webpack_exports__["default"] = (Particles);

/***/ }),

/***/ "./src/js/ScrollingEvents.js":
/*!***********************************!*\
  !*** ./src/js/ScrollingEvents.js ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const basicScroll = __webpack_require__(/*! basicscroll */ "./node_modules/basicscroll/dist/basicScroll.min.js");
class ScrollingEvents {
  constructor() {
    this.events();
  }
  events() {
    jQuery(function ($) {
      const aboutSectionFade = basicScroll.create({
        elem: document.querySelector('.cndev__section[data-content="about"]'),
        from: 'top-bottom',
        to: 'middle-middle',
        props: {
          '--opacity': {
            from: .0,
            to: 1
          }
        }
      });
      aboutSectionFade.start();
    });
  }
}
/* harmony default export */ __webpack_exports__["default"] = (ScrollingEvents);

/***/ }),

/***/ "./src/js/StringEffect.js":
/*!********************************!*\
  !*** ./src/js/StringEffect.js ***!
  \********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var StringEffect = function (el) {
  'use strict';

  var m = this;
  jQuery($ => {
    m.init = function () {
      m.codeletters = "&#*+%?£@§$";
      m.message = 0;
      m.current_length = 0;
      m.fadeBuffer = false;
      m.messages = $(el).data('strings');
      setTimeout(m.animateIn, 0);
    };
    m.generateRandomString = function (length) {
      var random_text = '';
      while (random_text.length < length) {
        random_text += m.codeletters.charAt(Math.floor(Math.random() * m.codeletters.length));
      }
      return random_text;
    };
    m.animateIn = function () {
      if (m.current_length < m.messages[m.message].length) {
        m.current_length = m.current_length + 2;
        if (m.current_length > m.messages[m.message].length) {
          m.current_length = m.messages[m.message].length;
        }
        var message = m.generateRandomString(m.current_length);
        $(el).html(message);
        setTimeout(m.animateIn, 20);
      } else {
        setTimeout(m.animateFadeBuffer, 20);
      }
    };
    m.animateFadeBuffer = function () {
      if (m.fadeBuffer === false) {
        m.fadeBuffer = [];
        for (var i = 0; i < m.messages[m.message].length; i++) {
          m.fadeBuffer.push({
            c: Math.floor(Math.random() * 12) + 1,
            l: m.messages[m.message].charAt(i)
          });
        }
      }
      var do_cycles = false;
      var message = '';
      for (var i = 0; i < m.fadeBuffer.length; i++) {
        var fader = m.fadeBuffer[i];
        if (fader.c > 0) {
          do_cycles = true;
          fader.c--;
          message += m.codeletters.charAt(Math.floor(Math.random() * m.codeletters.length));
        } else {
          message += fader.l;
        }
      }
      $(el).html(message);
      if (do_cycles === true) {
        setTimeout(m.animateFadeBuffer, 50);
      } else {
        setTimeout(m.cycleText, 2000);
      }
    };
    m.cycleText = function () {
      m.message = m.message + 1;
      if (m.message >= m.messages.length) {
        m.message = 0;
      }
      m.current_length = 0;
      m.fadeBuffer = false;
      $(el).html('');
      setTimeout(m.animateIn, 200);
    };
    m.init();
  });
};
/* harmony default export */ __webpack_exports__["default"] = (StringEffect);

/***/ }),

/***/ "./node_modules/basicscroll/dist/basicScroll.min.js":
/*!**********************************************************!*\
  !*** ./node_modules/basicscroll/dist/basicScroll.min.js ***!
  \**********************************************************/
/***/ (function(module) {

!function(t){if(true)module.exports=t();else {}}((function(){return function t(n,o,e){function r(i,c){if(!o[i]){if(!n[i]){var f=undefined;if(!c&&f)return require(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var s=o[i]={exports:{}};n[i][0].call(s.exports,(function(t){return r(n[i][1][t]||t)}),s,s.exports,t,n,o,e)}return o[i].exports}for(var u=undefined,i=0;i<e.length;i++)r(e[i]);return r}({1:[function(t,n,o){n.exports=function(t){var n=2.5949095;return(t*=2)<1?t*t*((n+1)*t-n)*.5:.5*((t-=2)*t*((n+1)*t+n)+2)}},{}],2:[function(t,n,o){n.exports=function(t){var n=1.70158;return t*t*((n+1)*t-n)}},{}],3:[function(t,n,o){n.exports=function(t){var n=1.70158;return--t*t*((n+1)*t+n)+1}},{}],4:[function(t,n,o){var e=t("./bounce-out");n.exports=function(t){return t<.5?.5*(1-e(1-2*t)):.5*e(2*t-1)+.5}},{"./bounce-out":6}],5:[function(t,n,o){var e=t("./bounce-out");n.exports=function(t){return 1-e(1-t)}},{"./bounce-out":6}],6:[function(t,n,o){n.exports=function(t){var n=t*t;return t<4/11?7.5625*n:t<8/11?9.075*n-9.9*t+3.4:t<.9?4356/361*n-35442/1805*t+16061/1805:10.8*t*t-20.52*t+10.72}},{}],7:[function(t,n,o){n.exports=function(t){return(t*=2)<1?-.5*(Math.sqrt(1-t*t)-1):.5*(Math.sqrt(1-(t-=2)*t)+1)}},{}],8:[function(t,n,o){n.exports=function(t){return 1-Math.sqrt(1-t*t)}},{}],9:[function(t,n,o){n.exports=function(t){return Math.sqrt(1- --t*t)}},{}],10:[function(t,n,o){n.exports=function(t){return t<.5?4*t*t*t:.5*Math.pow(2*t-2,3)+1}},{}],11:[function(t,n,o){n.exports=function(t){return t*t*t}},{}],12:[function(t,n,o){n.exports=function(t){var n=t-1;return n*n*n+1}},{}],13:[function(t,n,o){n.exports=function(t){return t<.5?.5*Math.sin(13*Math.PI/2*2*t)*Math.pow(2,10*(2*t-1)):.5*Math.sin(-13*Math.PI/2*(2*t-1+1))*Math.pow(2,-10*(2*t-1))+1}},{}],14:[function(t,n,o){n.exports=function(t){return Math.sin(13*t*Math.PI/2)*Math.pow(2,10*(t-1))}},{}],15:[function(t,n,o){n.exports=function(t){return Math.sin(-13*(t+1)*Math.PI/2)*Math.pow(2,-10*t)+1}},{}],16:[function(t,n,o){n.exports=function(t){return 0===t||1===t?t:t<.5?.5*Math.pow(2,20*t-10):-.5*Math.pow(2,10-20*t)+1}},{}],17:[function(t,n,o){n.exports=function(t){return 0===t?t:Math.pow(2,10*(t-1))}},{}],18:[function(t,n,o){n.exports=function(t){return 1===t?t:1-Math.pow(2,-10*t)}},{}],19:[function(t,n,o){n.exports={backInOut:t("./back-in-out"),backIn:t("./back-in"),backOut:t("./back-out"),bounceInOut:t("./bounce-in-out"),bounceIn:t("./bounce-in"),bounceOut:t("./bounce-out"),circInOut:t("./circ-in-out"),circIn:t("./circ-in"),circOut:t("./circ-out"),cubicInOut:t("./cubic-in-out"),cubicIn:t("./cubic-in"),cubicOut:t("./cubic-out"),elasticInOut:t("./elastic-in-out"),elasticIn:t("./elastic-in"),elasticOut:t("./elastic-out"),expoInOut:t("./expo-in-out"),expoIn:t("./expo-in"),expoOut:t("./expo-out"),linear:t("./linear"),quadInOut:t("./quad-in-out"),quadIn:t("./quad-in"),quadOut:t("./quad-out"),quartInOut:t("./quart-in-out"),quartIn:t("./quart-in"),quartOut:t("./quart-out"),quintInOut:t("./quint-in-out"),quintIn:t("./quint-in"),quintOut:t("./quint-out"),sineInOut:t("./sine-in-out"),sineIn:t("./sine-in"),sineOut:t("./sine-out")}},{"./back-in":2,"./back-in-out":1,"./back-out":3,"./bounce-in":5,"./bounce-in-out":4,"./bounce-out":6,"./circ-in":8,"./circ-in-out":7,"./circ-out":9,"./cubic-in":11,"./cubic-in-out":10,"./cubic-out":12,"./elastic-in":14,"./elastic-in-out":13,"./elastic-out":15,"./expo-in":17,"./expo-in-out":16,"./expo-out":18,"./linear":20,"./quad-in":22,"./quad-in-out":21,"./quad-out":23,"./quart-in":25,"./quart-in-out":24,"./quart-out":26,"./quint-in":28,"./quint-in-out":27,"./quint-out":29,"./sine-in":31,"./sine-in-out":30,"./sine-out":32}],20:[function(t,n,o){n.exports=function(t){return t}},{}],21:[function(t,n,o){n.exports=function(t){return(t/=.5)<1?.5*t*t:-.5*(--t*(t-2)-1)}},{}],22:[function(t,n,o){n.exports=function(t){return t*t}},{}],23:[function(t,n,o){n.exports=function(t){return-t*(t-2)}},{}],24:[function(t,n,o){n.exports=function(t){return t<.5?8*Math.pow(t,4):-8*Math.pow(t-1,4)+1}},{}],25:[function(t,n,o){n.exports=function(t){return Math.pow(t,4)}},{}],26:[function(t,n,o){n.exports=function(t){return Math.pow(t-1,3)*(1-t)+1}},{}],27:[function(t,n,o){n.exports=function(t){return(t*=2)<1?.5*t*t*t*t*t:.5*((t-=2)*t*t*t*t+2)}},{}],28:[function(t,n,o){n.exports=function(t){return t*t*t*t*t}},{}],29:[function(t,n,o){n.exports=function(t){return--t*t*t*t*t+1}},{}],30:[function(t,n,o){n.exports=function(t){return-.5*(Math.cos(Math.PI*t)-1)}},{}],31:[function(t,n,o){n.exports=function(t){var n=Math.cos(t*Math.PI*.5);return Math.abs(n)<1e-14?1:1-n}},{}],32:[function(t,n,o){n.exports=function(t){return Math.sin(t*Math.PI/2)}},{}],33:[function(t,n,o){n.exports=function(t,n){n||(n=[0,""]),t=String(t);var o=parseFloat(t,10);return n[0]=o,n[1]=t.match(/[\d.\-\+]*\s*(.*)/)[1]||"",n}},{}],34:[function(t,n,o){"use strict";Object.defineProperty(o,"__esModule",{value:!0}),o.create=void 0;var e=u(t("parse-unit")),r=u(t("eases"));function u(t){return t&&t.__esModule?t:{default:t}}function i(t){return(i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}var c,f,a,s=[],p="undefined"!=typeof window,l=function(){return(document.scrollingElement||document.documentElement).scrollTop},d=function(){return window.innerHeight||window.outerHeight},m=function(t){return!1===isNaN((0,e.default)(t)[0])},b=function(t){var n=(0,e.default)(t);return{value:n[0],unit:n[1]}},h=function(t){return null!==String(t).match(/^[a-z]+-[a-z]+$/)},w=function(t,n){return!0===t?n.elem:t instanceof HTMLElement==!0?n.direct:n.global},y=function(t,n){var o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:l(),e=arguments.length>3&&void 0!==arguments[3]?arguments[3]:d(),r=n.getBoundingClientRect(),u=t.match(/^[a-z]+/)[0],i=t.match(/[a-z]+$/)[0],c=0;return"top"===i&&(c-=0),"middle"===i&&(c-=e/2),"bottom"===i&&(c-=e),"top"===u&&(c+=r.top+o),"middle"===u&&(c+=r.top+o+r.height/2),"bottom"===u&&(c+=r.top+o+r.height),"".concat(c,"px")},v=function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:l(),o=t.getData(),e=o.to.value-o.from.value,r=n-o.from.value,u=r/(e/100),i=Math.min(Math.max(u,0),100),c=w(o.direct,{global:document.documentElement,elem:o.elem,direct:o.direct}),f=Object.keys(o.props).reduce((function(t,n){var e=o.props[n],r=e.from.unit||e.to.unit,u=e.from.value-e.to.value,c=e.timing(i/100),f=e.from.value-u*c,a=Math.round(1e4*f)/1e4;return t[n]=a+r,t}),{}),a=u>=0&&u<=100,s=u<0||u>100;return!0===a&&o.inside(t,u,f),!0===s&&o.outside(t,u,f),{elem:c,props:f}},x=function(t,n){Object.keys(n).forEach((function(o){return function(t,n){t.style.setProperty(n.key,n.value)}(t,{key:o,value:n[o]})}))};o.create=function(t){var n=null,o=!1,e={isActive:function(){return o},getData:function(){return n},calculate:function(){n=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};if(null==(t=Object.assign({},t)).inside&&(t.inside=function(){}),null==t.outside&&(t.outside=function(){}),null==t.direct&&(t.direct=!1),null==t.track&&(t.track=!0),null==t.props&&(t.props={}),null==t.from)throw new Error("Missing property `from`");if(null==t.to)throw new Error("Missing property `to`");if("function"!=typeof t.inside)throw new Error("Property `inside` must be undefined or a function");if("function"!=typeof t.outside)throw new Error("Property `outside` must be undefined or a function");if("boolean"!=typeof t.direct&&t.direct instanceof HTMLElement==0)throw new Error("Property `direct` must be undefined, a boolean or a DOM element/node");if(!0===t.direct&&null==t.elem)throw new Error("Property `elem` is required when `direct` is true");if("boolean"!=typeof t.track)throw new Error("Property `track` must be undefined or a boolean");if("object"!==i(t.props))throw new Error("Property `props` must be undefined or an object");if(null==t.elem){if(!1===m(t.from))throw new Error("Property `from` must be a absolute value when no `elem` has been provided");if(!1===m(t.to))throw new Error("Property `to` must be a absolute value when no `elem` has been provided")}else!0===h(t.from)&&(t.from=y(t.from,t.elem)),!0===h(t.to)&&(t.to=y(t.to,t.elem));return t.from=b(t.from),t.to=b(t.to),t.props=Object.keys(t.props).reduce((function(n,o){var e=Object.assign({},t.props[o]);if(!1===m(e.from))throw new Error("Property `from` of prop must be a absolute value");if(!1===m(e.to))throw new Error("Property `from` of prop must be a absolute value");if(e.from=b(e.from),e.to=b(e.to),null==e.timing&&(e.timing=r.default.linear),"string"!=typeof e.timing&&"function"!=typeof e.timing)throw new Error("Property `timing` of prop must be undefined, a string or a function");if("string"==typeof e.timing&&null==r.default[e.timing])throw new Error("Unknown timing for property `timing` of prop");return"string"==typeof e.timing&&(e.timing=r.default[e.timing]),n[o]=e,n}),{}),t}(t)},update:function(){var t=v(e),n=t.elem,o=t.props;return x(n,o),o},start:function(){o=!0},stop:function(){o=!1},destroy:function(){s[u]=void 0}},u=s.push(e)-1;return e.calculate(),e},!0===p?(!function t(n,o){var e=function(){requestAnimationFrame((function(){return t(n,o)}))},r=function(t){return t.filter((function(t){return null!=t&&t.isActive()}))}(s);if(0===r.length)return e();var u=l();if(o===u)return e();o=u,r.map((function(t){return v(t,u)})).forEach((function(t){var n=t.elem,o=t.props;return x(n,o)})),e()}(),window.addEventListener("resize",(c=function(){(function(t){return t.filter((function(t){return null!=t&&t.getData().track}))})(s).forEach((function(t){t.calculate(),t.update()}))},f=50,a=null,function(){for(var t=arguments.length,n=new Array(t),o=0;o<t;o++)n[o]=arguments[o];clearTimeout(a),a=setTimeout((function(){return c.apply(void 0,n)}),f)}))):console.warn("basicScroll is not executing because you are using it in an environment without a `window` object")},{eases:19,"parse-unit":33}]},{},[34])(34)}));

/***/ }),

/***/ "./src/scss/style.scss":
/*!*****************************!*\
  !*** ./src/scss/style.scss ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	!function() {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = function(result, chunkIds, fn, priority) {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var chunkIds = deferred[i][0];
/******/ 				var fn = deferred[i][1];
/******/ 				var priority = deferred[i][2];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every(function(key) { return __webpack_require__.O[key](chunkIds[j]); })) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	!function() {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = function(chunkId) { return installedChunks[chunkId] === 0; };
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = function(parentChunkLoadingFunction, data) {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some(function(id) { return installedChunks[id] !== 0; })) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkcaionunes_dev"] = self["webpackChunkcaionunes_dev"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], function() { return __webpack_require__("./src/index.js"); })
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map
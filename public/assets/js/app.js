console.warn("This script is development version.");
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/assets/js/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

"use strict";


module.exports = {
    ACTIVE_CLASS: 'is-active',
    LOCK_CLASS: 'is-lock',
    BREAK_POINT: 980,
    DURATION: 2000,
    $window: $(window),
    $document: $(document),
    $htmlBody: $('html, body'),
    $body: $('body')
};

/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = hack;
function hack() {

    'use strict';

    //htmlタグを変数に

    var htmlTag = document.documentElement;

    //userAgentを変数に
    var userAgent = window.navigator.userAgent.toLowerCase(),
        platform = window.navigator.platform.toLowerCase();

    //OS,ブラウザを変数に
    var uaIe = [/(msie|MSIE)/, /(T|t)rident/];

    //クラス名を変数に
    var browserClass = ['ie', 'windows', 'safari', 'chrome', 'firefox', 'ie 10', 'edge'];

    //スペースを定数に
    var SPACE = ' ';

    //function
    var addClassHack = function addClassHack(conditions, className) {
        if (conditions) {
            htmlTag.className += SPACE + className;
        }
    };

    //ie
    addClassHack(userAgent.match(uaIe[0]) || userAgent.match(uaIe[1]), browserClass[0]);

    //windows
    addClassHack(platform.indexOf('win') !== -1, browserClass[1]);

    //safari
    addClassHack(userAgent.indexOf(browserClass[2]) !== -1 && userAgent.indexOf(browserClass[3]) === -1, browserClass[2]);

    //chrome
    addClassHack(userAgent.indexOf(browserClass[2]) !== -1 && userAgent.indexOf(browserClass[3]) !== -1, browserClass[3]);

    //firefox
    addClassHack(userAgent.indexOf(browserClass[4]) !== -1, browserClass[4]);

    //ie10
    addClassHack(userAgent.indexOf(browserClass[5]) !== -1, 'ie10');

    //edge
    addClassHack(userAgent.indexOf(browserClass[6]) !== -1, browserClass[6]);
}

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = nav;

var _const = __webpack_require__(0);

var _const2 = _interopRequireDefault(_const);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function nav() {
    'use strict';

    var $hamburger = $('.js-hamburger');
    var $nav = $('.js-nav');
    var $body = $('.js-wrap');
    var $documentBody = $(document.body)[0];
    var $HTML_BODY = _const2.default.$htmlBody;
    var scrollPops = void 0;

    $hamburger.on('click', function (e) {
        e.preventDefault();
        $hamburger.toggleClass(_const2.default.ACTIVE_CLASS);
        $nav.toggleClass(_const2.default.ACTIVE_CLASS);

        if ($hamburger.hasClass(_const2.default.ACTIVE_CLASS)) {
            scrollLock();
        } else {
            scrollAble();
        }
    });

    var scrollLock = function scrollLock() {
        scrollPops = $documentBody.scrollTop;
        $body.css({
            top: '-' + scrollPops + 'px'
        });
        $body.addClass(_const2.default.LOCK_CLASS);
    };

    var scrollAble = function scrollAble() {
        $body.removeClass(_const2.default.LOCK_CLASS);
        $body.css({
            top: ''
        });
        $documentBody.scrollTop = scrollPops;
    };
}

/***/ },
/* 3 */
/***/ function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = smoothScroll;

var _const = __webpack_require__(0);

var _const2 = _interopRequireDefault(_const);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function smoothScroll() {

    'use strict';

    var HEADER_HEIGHT = 0;

    var $document = _const2.default.$document;

    var mStopOn = function mStopOn() {
        $document.on('DOMMouseScroll', preventDefault);
        $document.on('mousewheel', preventDefault);
    };

    var mStopOff = function mStopOff() {
        $document.off('DOMMouseScroll', preventDefault);
        $document.off('mousewheel', preventDefault);
    };

    var preventDefault = function preventDefault(event) {
        event.preventDefault();
    };

    var handleClick = function handleClick(e) {
        if (!$(e.currentTarget).hasClass('nolink')) {
            var id = $(e.currentTarget).attr('href'),
                target = $(id).offset().top;
            mStopOn();
            _const2.default.$htmlBody.animate({ scrollTop: target - HEADER_HEIGHT }, 500, mStopOff);
            e.preventDefault();
        }
    };

    $('a.js-scroll').on('click', handleClick);
}

/***/ },
/* 4 */
/***/ function(module, exports, __webpack_require__) {

"use strict";


var _hack = __webpack_require__(1);

var _hack2 = _interopRequireDefault(_hack);

var _smoothScroll = __webpack_require__(3);

var _smoothScroll2 = _interopRequireDefault(_smoothScroll);

var _nav = __webpack_require__(2);

var _nav2 = _interopRequireDefault(_nav);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

(0, _hack2.default)();

(0, _smoothScroll2.default)();

(0, _nav2.default)();

/***/ }
/******/ ]);
//# sourceMappingURL=maps/app.map
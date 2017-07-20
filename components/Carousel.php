<?php namespace Mavitm\Swiper\Components;

use Cms\Classes\ComponentBase;
use Mavitm\Swiper\Models\Group;
use Mavitm\Swiper\Models\Item;

class Carousel extends ComponentBase
{

    public $group, $items, $parameters, $grupOptions;

    public function componentDetails()
    {
        return [
            'name'        => 'Carousel Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [

            'groupid' => [
                'title'       => 'groupid',
                'description' => 'Target group.',
                'type'        => 'dropdown'
            ],

            'initialSlide' => [
                'title'       => 'initialSlide',
                'description' => 'Index number of initial slide.',
                'type'        => 'string',
                'default'     => '0'
            ],

            'direction' => [
                'title'       => 'direction',
                'description' => 'Could be  horizontal  or  vertical  (for vertical slider).',
                'type'        => 'dropdown',
                'default'     => 'horizontal',
                'options'     => ['horizontal'=>'horizontal', 'vertical'=>'vertical'],
            ],

            'speed' => [
                'title'       => 'speed',
                'description' => 'Duration of transition between slides (in ms)',
                'type'        => 'string',
                'default'     => '300'
            ],

            'setWrapperSize' => [
                'title'       => 'setWrapperSize',
                'description' => 'Enabled this option and plugin will set width/height on swiper wrapper equal to total size of all slides. Mostly should be used as compatibility fallback option for browser that don t support flexbox layout well',
                'type'        => 'checkbox',
                'default'     => 'false'
            ],

            'virtualTranslate' => [
                'title'       => 'virtualTranslate',
                'description' => 'Enabled this option and swiper will be operated as usual except it will not move, real translate values on wrapper will not be set. Useful when you may need to create custom slide transition',
                'type'        => 'checkbox',
                'default'     => 'false'
            ],

            'width' => [
                'title'       => 'width',
                'description' => 'Swiper width (in px). Parameter allows to force Swiper width. Useful only if you initialize Swiper when it is hidden.Setting this parameter will make Swiper not responsive',
                'type'        => 'string',
                'default'     => '1920'
            ],

            'height' => [
                'title'       => 'height',
                'description' => 'Swiper height (in px). Parameter allows to force Swiper height. Useful only if you initialize Swiper when it is hidden.Setting this parameter will make Swiper not responsive',
                'type'        => 'string',
                'default'     => '480'
            ],

            'autoHeight' => [
                'title'       => 'autoHeight',
                'description' => 'Set to true and slider wrapper will adopt its height to the height of the currently active slide',
                'type'        => 'checkbox',
                'default'     => 'false'
            ],

            'roundLengths' => [
                'title'       => 'roundLengths',
                'description' => 'Set to true to round values of slides width and height to prevent blurry texts on usual resolution screens (if you have such)',
                'type'        => 'checkbox',
                'default'     => 'false'
            ],

            'nested' => [
                'title'       => 'nested',
                'description' => 'Set to true on nested Swiper for correct touch events interception. Use only on nested swipers that use same direction as the parent one',
                'type'        => 'checkbox',
                'default'     => 'false'
            ],

            'autoplay' => [
                'title'       => 'autoplay',
                'description' => 'Delay between transitions (in ms). If this parameter is not specified, auto play will be disabled If you need to specify different delay for specifi slides you can do it by using  data-swiper-autoplay  (in ms) attribute on slide:  &lt;!-- hold this slide for 2 seconds --&gt; div class "swiper-slide" data-swiper-autoplay "2000" &gt; ',
                'type'        => 'string',
                'default'     => '3000',
                'group'       => 'Autoplay'
            ],

            'autoplayStopOnLast' => [
                'title'       => 'autoplayStopOnLast',
                'description' => 'Enable this parameter and autoplay will be stopped when it reaches last slide (has no effect in loop mode)',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Autoplay'
            ],

            'autoplayDisableOnInteraction' => [
                'title'       => 'autoplayDisableOnInteraction',
                'description' => 'Set to false and autoplay will not be disabled after user interactions (swipes), it will be restarted every time after interaction',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Autoplay'
            ],
            'watchSlidesProgress' => [
                'title'       => 'watchSlidesProgress',
                'description' => 'Enable this feature to calculate each slides progress',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Progress'
            ],

            'watchSlidesVisibility' => [
                'title'       => 'watchSlidesVisibility',
                'description' => ' watchSlidesProgress  should be enabled. Enable this option and slides that are in viewport will have additional visible class',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Progress'
            ],

            'freeMode' => [
                'title'       => 'freeMode',
                'description' => 'If true then slides will not have fixed positions',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Freemode'
            ],

            'freeModeMomentum' => [
                'title'       => 'freeModeMomentum',
                'description' => 'If true, then slide will keep moving for a while after you release it',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Freemode'
            ],

            'freeModeMomentumRatio' => [
                'title'       => 'freeModeMomentumRatio',
                'description' => 'Higher value produces larger momentum distance after you release slider',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Freemode'
            ],

            'freeModeMomentumVelocityRatio' => [
                'title'       => 'freeModeMomentumVelocityRatio',
                'description' => 'Higher value produces larger momentum velocity after you release slider',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Freemode'
            ],

            'freeModeMomentumBounce' => [
                'title'       => 'freeModeMomentumBounce',
                'description' => 'Set to false if you want to disable momentum bounce in free mode',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Freemode'
            ],

            'freeModeMomentumBounceRatio' => [
                'title'       => 'freeModeMomentumBounceRatio',
                'description' => 'Higher value produces larger momentum bounce effect',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Freemode'
            ],

            'freeModeMinimumVelocity' => [
                'title'       => 'freeModeMinimumVelocity',
                'description' => 'Minimum touchmove-velocity required to trigger free mode momentum',
                'type'        => 'string',
                'default'     => '0.02',
                'group'       => 'Freemode'
            ],

            'freeModeSticky' => [
                'title'       => 'freeModeSticky',
                'description' => 'Set to true to enable snap to slides positions in free mode',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Freemode'
            ],
            'effect' => [
                'title'       => 'effect',
                'description' => 'Could be "slide", "fade", "cube", "coverflow" or "flip"',
                'type'        => 'dropdown',
                'default'     => 'slide',
                'options'     => ['slide'=>'slide', 'fade'=>'fade', 'cube'=>'cube', 'coverflow'=>'coverflow', 'flip'=>'flip'],
                'group'       => 'Effects'
            ],

            'parallax' => [
                'title'       => 'parallax',
                'description' => 'Enable, if you want to use "parallaxed" elements inside of slider',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Parallax'
            ],


            'spaceBetween' => [
                'title'       => 'spaceBetween',
                'description' => 'Distance between slides in px.',
                'type'        => 'string',
                'default'     => '0',
                'group'       => 'Slides grid'
            ],

            'slidesPerView' => [
                'title'       => 'slidesPerView',
                'description' => 'Number of slides per view (slides visible at the same time on slider s container).  If you use it with "auto" value and along with loop: true then you need to specify loopedSlides parameter with amount of slides to loop (duplicate)  slidesPerView:  auto  is currently not compatible with multirow mode, when slidesPerColumn &gt; 1  ',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Slides grid'
            ],

            'slidesPerColumn' => [
                'title'       => 'slidesPerColumn',
                'description' => 'Number of slides per column, for multirow layout',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Slides grid'
            ],

            'slidesPerColumnFill' => [
                'title'       => 'slidesPerColumnFill',
                'description' => 'Could be  column  or  row . Defines how slides should fill rows, by column or by row',
                'type'        => 'dropdown',
                'default'     => 'column',
                'options'     => ['column' => 'column', 'row' => 'row'],
                'group'       => 'Slides grid'
            ],

            'slidesPerGroup' => [
                'title'       => 'slidesPerGroup',
                'description' => 'Set numbers of slides to define and enable group sliding. Useful to use with slidesPerView &gt; 1',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Slides grid'
            ],

            'centeredSlides' => [
                'title'       => 'centeredSlides',
                'description' => 'If true, then active slide will be centered, not always on the left side.',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Slides grid'
            ],

            'slidesOffsetBefore' => [
                'title'       => 'slidesOffsetBefore',
                'description' => 'Add (in px) additional slide offset in the beginning of the container (before all slides)',
                'type'        => 'string',
                'default'     => '0',
                'group'       => 'Slides grid'
            ],

            'slidesOffsetAfter' => [
                'title'       => 'slidesOffsetAfter',
                'description' => 'Add (in px) additional slide offset in the end of the container (after all slides)',
                'type'        => 'string',
                'default'     => '0',
                'group'       => 'Slides grid'
            ],

            'grabCursor' => [
                'title'       => 'grabCursor',
                'description' => 'This option may a little improve desktop usability. If true, user will see the "grab" cursor when hover on Swiper',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Grab Cursor'
            ],

            'touchEventsTarget' => [
                'title'       => 'touchEventsTarget',
                'description' => 'Target element to listen touch events on. Can be  container  (to listen for touch events on swiper-container) or  wrapper  (to listen for touch events on swiper-wrapper)',
                'type'        => 'dropdown',
                'default'     => 'container',
                'options'     => ['container' => 'container', 'wrapper' => 'wrapper'],
                'group'       => 'Touches'
            ],

            'touchRatio' => [
                'title'       => 'touchRatio',
                'description' => 'Touch ration',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Touches'
            ],

            'touchAngle' => [
                'title'       => 'touchAngle',
                'description' => 'Allowable angle (in degrees) to trigger touch move',
                'type'        => 'string',
                'default'     => '45',
                'group'       => 'Touches'
            ],

            'simulateTouch' => [
                'title'       => 'simulateTouch',
                'description' => 'If true, Swiper will accept mouse events like touch events (click and drag to change slides)',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Touches'
            ],

            'shortSwipes' => [
                'title'       => 'shortSwipes',
                'description' => 'Set to false if you want to disable short swipes',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Touches'
            ],

            'longSwipes' => [
                'title'       => 'longSwipes',
                'description' => 'Set to false if you want to disable long swipes',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Touches'
            ],

            'longSwipesRatio' => [
                'title'       => 'longSwipesRatio',
                'description' => 'Ratio to trigger swipe to next/previous slide during long swipes',
                'type'        => 'string',
                'default'     => '0.5',
                'group'       => 'Touches'
            ],

            'longSwipesMs' => [
                'title'       => 'longSwipesMs',
                'description' => 'Minimal duration (in ms) to trigger swipe to next/previous slide during long swipes',
                'type'        => 'string',
                'default'     => '300',
                'group'       => 'Touches'
            ],

            'followFinger' => [
                'title'       => 'followFinger',
                'description' => 'If disabled, then slider will be animated only when you release it, it will not move while you hold your finger on it',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Touches'
            ],

            'onlyExternal' => [
                'title'       => 'onlyExternal',
                'description' => 'If true, then the only way to switch the slide is use of external API functions like slidePrev or slideNext',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Touches'
            ],

            'threshold' => [
                'title'       => 'threshold',
                'description' => 'Threshold value in px. If "touch distance" will be lower than this value then swiper will not move',
                'type'        => 'string',
                'default'     => '0',
                'group'       => 'Touches'
            ],

            'touchMoveStopPropagation' => [
                'title'       => 'touchMoveStopPropagation',
                'description' => 'If enabled, then propagation of "touchmove" will be stopped',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Touches'
            ],

            'iOSEdgeSwipeDetection' => [
                'title'       => 'iOSEdgeSwipeDetection',
                'description' => 'Enable to release Swiper events for swipe-to-go-back work in iOS UIWebView',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Touches'
            ],

            'iOSEdgeSwipeThreshold' => [
                'title'       => 'iOSEdgeSwipeThreshold',
                'description' => 'Area (in px) from left edge of the screen to release touch events for swipe-to-go-back in iOS UIWebView',
                'type'        => 'string',
                'default'     => '20',
                'group'       => 'Touches'
            ],

            'touchReleaseOnEdges' => [
                'title'       => 'touchReleaseOnEdges',
                'description' => 'Enable to release touch events on slider edge position (beginning, end) to allow for further page scrolling',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Touches'
            ],

            'passiveListeners' => [
                'title'       => 'passiveListeners',
                'description' => 'Passive event listeners will be used by default where possible to improve scrolling performance on mobile devices. But if you need to use `e.preventDefault` and you have conflict with it, then you should disable this parameter',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Touches'
            ],


            'resistance' => [
                'title'       => 'resistance',
                'description' => 'Set to false if you want to disable resistant bounds',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Touch Resistance'
            ],

            'resistanceRatio' => [
                'title'       => 'resistanceRatio',
                'description' => 'This option allows you to control resistance ratio',
                'type'        => 'string',
                'default'     => '0.85',
                'group'       => 'Touch Resistance'
            ],
            'preventClicks' => [
                'title'       => 'preventClicks',
                'description' => 'Set to true to prevent accidental unwanted clicks on links during swiping',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Clicks'
            ],

            'preventClicksPropagation' => [
                'title'       => 'preventClicksPropagation',
                'description' => 'Set to true to stop clicks event propagation on links during swiping',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Clicks'
            ],

            'slideToClickedSlide' => [
                'title'       => 'slideToClickedSlide',
                'description' => 'Set to true and click on any slide will produce transition to this slide',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Clicks'
            ],


            'allowSwipeToPrev' => [
                'title'       => 'allowSwipeToPrev',
                'description' => 'Set to false to disable swiping to previous slide direction (to left or top)',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Swiping / No swiping'
            ],

            'allowSwipeToNext' => [
                'title'       => 'allowSwipeToNext',
                'description' => 'Set to false to disable swiping to next slide direction (to right or bottom)',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Swiping / No swiping'
            ],

            'noSwiping' => [
                'title'       => 'noSwiping',
                'description' => 'Will disable swiping on elements matched to class specified in  noSwipingClass ',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Swiping / No swiping'
            ],

            'noSwipingClass' => [
                'title'       => 'noSwipingClass',
                'description' => 'If true, then you can add  noSwipingClass  class to swiper s slide to prevent/disable swiping on this element',
                'type'        => 'string',
                'default'     => 'swiper-no-swiping',
                'group'       => 'Swiping / No swiping'
            ],

            'swipeHandler' => [
                'title'       => 'swipeHandler',
                'description' => 'String with CSS selector or HTML element of the container with pagination that will work as only available handler for swiping',
                'type'        => 'string',
                'default'     => '',
                'group'       => 'Swiping / No swiping'
            ],


            'uniqueNavElements' => [
                'title'       => 'uniqueNavElements',
                'description' => 'If enabled (by default) and navigation elements  parameters passed as a string (like  ".pagination" ) then Swiper will look for such elements through child elements first. Applies for pagination, prev/next buttons and scrollbar elements',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Navigation Controls'
            ],


            'pagination' => [
                'title'       => 'pagination',
                'description' => 'String with CSS selector or HTML element of the container with pagination',
                'type'        => 'string',
                'default'     => '',
                'group'       => 'Pagination'
            ],

            'paginationType' => [
                'title'       => 'paginationType',
                'description' => 'String with type of pagination. Can be "bullets", "fraction", "progress" or "custom"',
                'type'        => 'string',
                'default'     => 'bullets',
                'group'       => 'Pagination'
            ],

            'paginationHide' => [
                'title'       => 'paginationHide',
                'description' => 'Toggle (hide/true) pagination container visibility when click on Slider s container',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Pagination'
            ],

            'paginationClickable' => [
                'title'       => 'paginationClickable',
                'description' => 'If true then clicking on pagination button will cause transition to appropriate slide. Only for bullets pagination type',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Pagination'
            ],

            'paginationElement' => [
                'title'       => 'paginationElement',
                'description' => 'Defines which HTML tag will be use to represent single pagination bullet. . Only for bullets pagination type',
                'type'        => 'string',
                'default'     => 'span',
                'group'       => 'Pagination'
            ],
            'nextButton' => [
                'title'       => 'nextButton',
                'description' => 'String with CSS selector or HTML element of the element that will work like "next" button after click on it',
                'type'        => 'string',
                'default'     => '',
                'group'       => 'Navigation Buttons'
            ],

            'prevButton' => [
                'title'       => 'prevButton',
                'description' => 'String with CSS selector or HTML element of the element that will work like "prev" button after click on it',
                'type'        => 'string',
                'default'     => '',
                'group'       => 'Navigation Buttons'
            ],

            'scrollbar' => [
                'title'       => 'scrollbar',
                'description' => 'String with CSS selector or HTML element of the container with scrollbar.',
                'type'        => 'string',
                'default'     => '',
                'group'       => 'Scollbar'
            ],

            'scrollbarHide' => [
                'title'       => 'scrollbarHide',
                'description' => 'Hide scrollbar automatically after user interaction',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Scollbar'
            ],

            'scrollbarDraggable' => [
                'title'       => 'scrollbarDraggable',
                'description' => 'Set to true to enable make scrollbar draggable that allows you to control slider position',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Scollbar'
            ],

            'scrollbarSnapOnRelease' => [
                'title'       => 'scrollbarSnapOnRelease',
                'description' => 'Set to true to snap slider position to slides when you release scrollbar',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Scollbar'
            ],


            'a11y' => [
                'title'       => 'a11y',
                'description' => 'Option to enable keyboard accessibility to provide foucsable navigation buttons and basic ARIA for screen readers',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Accessibility'
            ],

            'prevSlideMessage' => [
                'title'       => 'prevSlideMessage',
                'description' => 'Message for screen readers for previous button',
                'type'        => 'string',
                'default'     => 'Previous slide',
                'group'       => 'Accessibility'
            ],

            'nextSlideMessage' => [
                'title'       => 'nextSlideMessage',
                'description' => 'Message for screen readers for next button',
                'type'        => 'string',
                'default'     => 'Next slide',
                'group'       => 'Accessibility'
            ],

            'firstSlideMessage' => [
                'title'       => 'firstSlideMessage',
                'description' => 'Message for screen readers for previous button when swiper is on first slide',
                'type'        => 'string',
                'default'     => 'This is the first slide',
                'group'       => 'Accessibility'
            ],

            'lastSlideMessage' => [
                'title'       => 'lastSlideMessage',
                'description' => 'Message for screen readers for previous button when swiper is on last slide',
                'type'        => 'string',
                'default'     => 'This is the last slide',
                'group'       => 'Accessibility'
            ],

            'paginationBulletMessage' => [
                'title'       => 'paginationBulletMessage',
                'description' => 'Message for screen readers for single pagination bullet',
                'type'        => 'string',
                'default'     => 'Go to slide {{index}}',
                'group'       => 'Accessibility'
            ],
            'keyboardControl' => [
                'title'       => 'keyboardControl',
                'description' => 'Set to true to enable navigation through slides using keyboard right and left (for horizontal mode), top and borrom (for vertical mode) keyboard arrows',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Keyboard / Mousewheel'
            ],

            'mousewheelControl' => [
                'title'       => 'mousewheelControl',
                'description' => 'Set to true to enable navigation through slides using mouse wheel',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Keyboard / Mousewheel'
            ],

            'mousewheelForceToAxis' => [
                'title'       => 'mousewheelForceToAxis',
                'description' => 'Set to true to force mousewheel swipes to axis. So in horizontal mode mousewheel will work only with horizontal mousewheel scrolling, and only with vertical scrolling in vertical mode.',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Keyboard / Mousewheel'
            ],

            'mousewheelReleaseOnEdges' => [
                'title'       => 'mousewheelReleaseOnEdges',
                'description' => 'Set to true and swiper will release mousewheel event and allow page scrolling when swiper is on edge positions (in the beginning or in the end)',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Keyboard / Mousewheel'
            ],

            'mousewheelInvert' => [
                'title'       => 'mousewheelInvert',
                'description' => 'Set to true to invert sliding direction',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Keyboard / Mousewheel'
            ],

            'mousewheelSensitivity' => [
                'title'       => 'mousewheelSensitivity',
                'description' => 'Multiplier of mousewheel data, allows to tweak mouse wheel sensitivity',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Keyboard / Mousewheel'
            ],

            'mousewheelEventsTarged' => [
                'title'       => 'mousewheelEventsTarged',
                'description' => 'String with CSS selector or HTML element of the container accepting mousewheel events. By default it is swiper-container',
                'type'        => 'string',
                'default'     => 'container',
                'group'       => 'Keyboard / Mousewheel'
            ],

            'hashnav' => [
                'title'       => 'hashnav',
                'description' => 'Set to true to enable hash url navigation to for slides',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Hash/History Navigation'
            ],

            'hashnavWatchState' => [
                'title'       => 'hashnavWatchState',
                'description' => 'Set to true to enable also navigation through slides (when hashnav is enabled) by browser history or by setting directly hash on document location',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Hash/History Navigation'
            ],

            'history' => [
                'title'       => 'history',
                'description' => 'Enables history push state where every slide will have its own url. In this parameter you have to specify main slides url like "slides" and specify every slide url using  data-history  attribute. &lt;!-- will produce "slides/slide1" url in browser history --&gt; &lt; div class = "swiper-slide" data-history = "slide1" &gt; &lt;/ div &gt; ',
                'type'        => 'string',
                'default'     => '',
                'group'       => 'Hash/History Navigation'
            ],

            'replaceState' => [
                'title'       => 'replaceState',
                'description' => 'Works in addition to hashnav or history to replace current url state with the new one instead of adding it to history',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Hash/History Navigation'
            ],
            'preloadImages' => [
                'title'       => 'preloadImages',
                'description' => 'When enabled Swiper will force to load all images',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Images'
            ],

            'updateOnImagesReady' => [
                'title'       => 'updateOnImagesReady',
                'description' => 'When enabled Swiper will be reinitialized after all inner images (&lt;img&gt; tags) are loaded. Required  preloadImages: true ',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Images'
            ],

            'lazyLoading' => [
                'title'       => 'lazyLoading',
                'description' => 'Set to "true" to enable images lazy loading. Note that  preloadImages  should be disabled',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Images'
            ],

            'lazyLoadingInPrevNext' => [
                'title'       => 'lazyLoadingInPrevNext',
                'description' => 'Set to "true" to enable lazy loading for the closest slides images (for previous and next slide images)',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Images'
            ],

            'lazyLoadingInPrevNextAmount' => [
                'title'       => 'lazyLoadingInPrevNextAmount',
                'description' => 'Amount of next/prev slides to preload lazy images in. Can t be less than  slidesPerView ',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Images'
            ],

            'lazyLoadingOnTransitionStart' => [
                'title'       => 'lazyLoadingOnTransitionStart',
                'description' => 'By default, Swiper will load lazy images after transition to this slide, so you may enable this parameter if you need it to start loading of new image in the beginning of transition',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Images'
            ],

            'loop' => [
                'title'       => 'loop',
                'description' => 'Set to true to enable continuous loop mode  If you use it along with  slidesPerView:  auto   then you need to specify  loopedSlides  parameter with amount of slides to loop (duplicate) Also, because of nature of how the loop mode works, it will add duplicated slides. Such duplicated classes will have additional classes:  swiper-slide-duplicate  - represents duplicated slide swiper-slide-duplicate-active  - represents slide duplicated to the currently active slide swiper-slide-duplicate-next  - represents slide duplicated to the slide next to active swiper-slide-duplicate-prev  - represents slide duplicated to the slide previous to active',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Loop'
            ],

            'loopAdditionalSlides' => [
                'title'       => 'loopAdditionalSlides',
                'description' => 'Addition number of slides that will be cloned after creating of loop',
                'type'        => 'string',
                'default'     => '0',
                'group'       => 'Loop'
            ],

            'loopedSlides' => [
                'title'       => 'loopedSlides',
                'description' => 'If you use  slidesPerView: auto   with loop mode you should tell to Swiper how many slides it should loop (duplicate) using this parameter',
                'type'        => 'string',
                'default'     => '',
                'group'       => 'Loop'
            ],

            'zoom' => [
                'title'       => 'zoom',
                'description' => 'Set to true to enable zooming functionality',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Zoom'
            ],

            'zoomMax' => [
                'title'       => 'zoomMax',
                'description' => 'Maximum image zoom multiplier',
                'type'        => 'string',
                'default'     => '3',
                'group'       => 'Zoom'
            ],

            'zoomMin' => [
                'title'       => 'zoomMin',
                'description' => 'Minimal image zoom multiplier',
                'type'        => 'string',
                'default'     => '1',
                'group'       => 'Zoom'
            ],

            'zoomToggle' => [
                'title'       => 'zoomToggle',
                'description' => 'Enable/disable zoom-in by slide s double tap',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Zoom'
            ],
            'control' => [
                'title'       => 'control',
                'description' => 'Pass here another Swiper instance or array with Swiper instances that should be controlled by this Swiper',
                'type'        => 'string',
                'default'     => 'undefined',
                'group'       => 'Controller'
            ],

            'controlInverse' => [
                'title'       => 'controlInverse',
                'description' => 'Set to true and controlling will be in inverse direction',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Controller'
            ],

            'controlBy' => [
                'title'       => 'controlBy',
                'description' => 'Can be   slide   or   container  . Defines a way how to control another slider: slide by slide (with respect to other slider s grid) or depending on all slides/container (depending on total slider percentage)',
                'type'        => 'dropdown',
                'default'     => 'slide',
                'options'     => ['slide' => 'slide', 'container' => 'container'],
                'group'       => 'Controller'
            ],

            'normalizeSlideIndex' => [
                'title'       => 'normalizeSlideIndex',
                'description' => 'Normalize slide index in control mode. See https://github.com/nolimits4web/Swiper/pull/1766',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Controller'
            ],

            'runCallbacksOnInit' => [
                'title'       => 'runCallbacksOnInit',
                'description' => 'Run on[Transition/SlideChange][Start/End] callbacks on swiper initialization. Such callbacks will be fired on initialization in case of your initialSlide is not 0, or you use loop mode',
                'type'        => 'checkbox',
                'default'     => 'true',
                'group'       => 'Callbacks'
            ],

            'observer' => [
                'title'       => 'observer',
                'description' => 'Set to true to enable Mutation Observer on Swiper and its elements. In this case Swiper will be updated (reinitialized) each time if you change its style (like hide/show) or modify its child elements (like adding/removing slides)',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Observer'
            ],

            'observeParents' => [
                'title'       => 'observeParents',
                'description' => 'Set to true if you also need to watch Mutations for Swiper parent elements',
                'type'        => 'checkbox',
                'default'     => 'false',
                'group'       => 'Observer'
            ],


            'containerModifierClass' => [
                'title'       => 'containerModifierClass',
                'description' => 'The beginning of the modifier CSS class that can be added to swiper container depending on different parameters',
                'type'        => 'string',
                'default'     => 'swiper-container-',
                'group'       => 'Namespace'
            ],

            'slideClass' => [
                'title'       => 'slideClass',
                'description' => 'CSS class name of slide',
                'type'        => 'string',
                'default'     => 'swiper-slide',
                'group'       => 'Namespace'
            ],

            'slideActiveClass' => [
                'title'       => 'slideActiveClass',
                'description' => 'CSS class name of currently active slide',
                'type'        => 'string',
                'default'     => 'swiper-slide-active',
                'group'       => 'Namespace'
            ],

            'slideDuplicatedActiveClass' => [
                'title'       => 'slideDuplicatedActiveClass',
                'description' => 'CSS class name of duplicated slide which represents the currently active slide',
                'type'        => 'string',
                'default'     => 'swiper-slide-duplicate-active',
                'group'       => 'Namespace'
            ],

            'slideVisibleClass' => [
                'title'       => 'slideVisibleClass',
                'description' => 'CSS class name of currently visible slide',
                'type'        => 'string',
                'default'     => 'swiper-slide-visible',
                'group'       => 'Namespace'
            ],

            'slideDuplicateClass' => [
                'title'       => 'slideDuplicateClass',
                'description' => 'CSS class name of slide duplicated by loop mode',
                'type'        => 'string',
                'default'     => 'swiper-slide-duplicate',
                'group'       => 'Namespace'
            ],

            'slideNextClass' => [
                'title'       => 'slideNextClass',
                'description' => 'CSS class name of slide which is right after currently active slide',
                'type'        => 'string',
                'default'     => 'swiper-slide-next',
                'group'       => 'Namespace'
            ],

            'slideDuplicatedNextClass' => [
                'title'       => 'slideDuplicatedNextClass',
                'description' => 'CSS class name of duplicated slide which represents the slide next to active slide',
                'type'        => 'string',
                'default'     => 'swiper-slide-duplicate-next',
                'group'       => 'Namespace'
            ],

            'slidePrevClass' => [
                'title'       => 'slidePrevClass',
                'description' => 'CSS class name of slide which is right before currently active slide',
                'type'        => 'string',
                'default'     => 'swiper-slide-prev',
                'group'       => 'Namespace'
            ],

            'slideDuplicatedPrevClass' => [
                'title'       => 'slideDuplicatedPrevClass',
                'description' => 'CSS class name of duplicated slide which represents the slide previous to active slide',
                'type'        => 'string',
                'default'     => 'swiper-slide-duplicate-prev',
                'group'       => 'Namespace'
            ],

            'wrapperClass' => [
                'title'       => 'wrapperClass',
                'description' => 'CSS class name of slides  wrapper',
                'type'        => 'string',
                'default'     => 'swiper-wrapper',
                'group'       => 'Namespace'
            ],

            'bulletClass' => [
                'title'       => 'bulletClass',
                'description' => 'CSS class name of single pagination bullet',
                'type'        => 'string',
                'default'     => 'swiper-pagination-bullet',
                'group'       => 'Namespace'
            ],

            'bulletActiveClass' => [
                'title'       => 'bulletActiveClass',
                'description' => 'CSS class name of currently active pagination bullet',
                'type'        => 'string',
                'default'     => 'swiper-pagination-bullet-active',
                'group'       => 'Namespace'
            ],

            'paginationHiddenClass' => [
                'title'       => 'paginationHiddenClass',
                'description' => 'CSS class name of pagination when it becomes inactive',
                'type'        => 'string',
                'default'     => 'swiper-pagination-hidden',
                'group'       => 'Namespace'
            ],

            'paginationCurrentClass' => [
                'title'       => 'paginationCurrentClass',
                'description' => 'CSS class name of the element with currently active index in "fraction" pagination',
                'type'        => 'string',
                'default'     => 'swiper-pagination-current',
                'group'       => 'Namespace'
            ],

            'paginationTotalClass' => [
                'title'       => 'paginationTotalClass',
                'description' => 'CSS class name of the element with total number of "snaps" in "fraction" pagination',
                'type'        => 'string',
                'default'     => 'swiper-pagination-total',
                'group'       => 'Namespace'
            ],

            'paginationProgressbarClass' => [
                'title'       => 'paginationProgressbarClass',
                'description' => 'CSS class name of pagination progressbar',
                'type'        => 'string',
                'default'     => 'swiper-pagination-progressbar',
                'group'       => 'Namespace'
            ],

            'paginationClickableClass' => [
                'title'       => 'paginationClickableClass',
                'description' => 'CSS class name set to pagination when it is clickable',
                'type'        => 'string',
                'default'     => 'swiper-pagination-clickable',
                'group'       => 'Namespace'
            ],

            'paginationModifierClass' => [
                'title'       => 'paginationModifierClass',
                'description' => 'The beginning of the modifier CSS class name that will be added to pagination depending on parameters',
                'type'        => 'string',
                'default'     => 'swiper-pagination-',
                'group'       => 'Namespace'
            ],

            'buttonDisabledClass' => [
                'title'       => 'buttonDisabledClass',
                'description' => 'CSS class name of next/prev button when it becomes disabled',
                'type'        => 'string',
                'default'     => 'swiper-button-disabled',
                'group'       => 'Namespace'
            ],

            'lazyLoadingClass' => [
                'title'       => 'lazyLoadingClass',
                'description' => 'CSS class name of lazy element',
                'type'        => 'string',
                'default'     => 'swiper-lazy',
                'group'       => 'Namespace'
            ],

            'lazyStatusLoadingClass' => [
                'title'       => 'lazyStatusLoadingClass',
                'description' => 'CSS class name of lazy loading element',
                'type'        => 'string',
                'default'     => 'swiper-lazy-loading',
                'group'       => 'Namespace'
            ],

            'lazyStatusLoadedClass' => [
                'title'       => 'lazyStatusLoadedClass',
                'description' => 'CSS class name of lazy loaded element',
                'type'        => 'string',
                'default'     => 'swiper-lazy-loaded',
                'group'       => 'Namespace'
            ],

            'lazyPreloaderClass' => [
                'title'       => 'lazyPreloaderClass',
                'description' => 'CSS class name of lazy preloader',
                'type'        => 'string',
                'default'     => 'swiper-lazy-preloader',
                'group'       => 'Namespace'
            ],

            'preloaderClass' => [
                'title'       => 'preloaderClass',
                'description' => 'CSS class name of additional lazy preloader',
                'type'        => 'string',
                'default'     => 'preloader',
                'group'       => 'Namespace'
            ],

            'zoomContainerClass' => [
                'title'       => 'zoomContainerClass',
                'description' => 'CSS class name of zoom container',
                'type'        => 'string',
                'default'     => 'swiper-zoom-container',
                'group'       => 'Namespace'
            ],

            'notificationClass' => [
                'title'       => 'notificationClass',
                'description' => 'CSS class name of a11 notification',
                'type'        => 'string',
                'default'     => 'swiper-notification',
                'group'       => 'Namespace'
            ],

        ];
    }

    public function getGroupidOptions(){
        return Group::get()->lists("name","id");
    }

    public function onRun()
    {

        $this->group = $this->page['group'] = Group::find( $this->property('groupid') );

        if( empty($this->group->id) ){
            return null;
        }

        $this->grupOptions = $this->page['grupOptions'] = $this->group->options;
        $this->items = $this->page['items'] = Item::where("group_id", "=", $this->group->id)->get();

        $this->carouselJavascript();

        $this->addJs('/plugins/mavitm/swiper/assets/vendor/swiper/dist/js/swiper.min.js');
        $this->addCss('/plugins/mavitm/swiper/assets/vendor/swiper/dist/css/swiper.min.css');

    }

    public function carouselJavascript(){
        $this->parameters = [];
        $adefault = $this->defineProperties();
        foreach ($this->getProperties() as $key => $value){

            if(isset($adefault[$key]['default']) && $adefault[$key]['default'] != $value){
                if(is_numeric($value)){
                    $this->parameters[$key] = $value;
                }else{
                    $this->parameters[$key] = "'".$value."'";
                }
            }
        }
        if( !empty($this->group->parameters['breakpoints']) ){
            $optScreen = $this->group->parameters['breakpoints'];
            $optJsn = [];
            if(is_array($optScreen)){
                foreach ($optScreen as $screen){
                    $optJsn[$screen['minwidth']] = [
                        "slidesPerView" => $screen['slidesPerView'],
                        "spaceBetween"  => $screen['spaceBetween']
                    ];
                }
                $breakpoints = json_encode($optJsn);
                $this->parameters["breakpoints"] = $breakpoints;
            }
        }
        $this->page['parameters'] = $this->parameters;
    }

}

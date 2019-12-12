;(function(window) {

    'use strict';

    function isIOSSafari() {
        var userAgent;
        userAgent = window.navigator.userAgent;
        return userAgent.match(/iPad/i) || userAgent.match(/iPhone/i);
    };
    function isTouch() {
        var isIETouch;
        isIETouch = navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
        return [].indexOf.call(window, 'ontouchstart') >= 0 || isIETouch;
    };
    var isIOS = isIOSSafari(),
        clickHandler = isIOS || isTouch() ? 'touchstart' : 'click';

    function extend( a, b ) {
        for( var key in b ) { 
            if( b.hasOwnProperty( key ) ) {
                a[key] = b[key];
            }
        }
        return a;
    }

    function Animocon(el, options) {
        this.el = el;
        this.options = extend( {}, this.options );
        extend( this.options, options );

        this.checked = false;

        this.timeline = new mojs.Timeline();
        
        for(var i = 0, len = this.options.tweens.length; i < len; ++i) {
            this.timeline.add(this.options.tweens[i]);
        }

        var self = this;
        this.el.addEventListener(clickHandler, function() {
            if( self.checked ) {
                self.options.onUnCheck();
            }
            else {
                self.options.onCheck();
                self.timeline.replay();
            }
            self.checked = !self.checked;
        });
    }
    $(document).ready(function(){
        Animocon.prototype.options = {
            tweens : [
                new mojs.Burst({})
            ],
            onCheck : function() { return false; },
            onUnCheck : function() { return false; }
        };
    });

    var items = [].slice.call(document.querySelectorAll('.play-button-con'));
    
    function init() {
        
        var el11 = items[0].querySelector('.icobutton'), el11span = el11.querySelector('span');         
        var opacityCurve11 = mojs.easing.path('M0,0 C0,87 27,100 40,100 L40,0 L100,0');
        var scaleCurve11 = mojs.easing.path('M0,0c0,80,39.2,100,39.2,100L40-100c0,0-0.7,106,60,106');
        new Animocon(el11, {
            tweens : [
                new mojs.Shape({
                    parent: 		el11,
                    radius: 		{0: 95},
                    fill: 			'transparent',
                    stroke: 		'#C0C1C3',
                    strokeWidth: {50:0},
                    opacity: 		0.4,
                    duration: 	1000,
                    delay: 			100,
                    easing: 		mojs.easing.bezier(0, 1, 0.5, 1)
                }),
                new mojs.Shape({
                    parent: 	el11,
                    radius: 	{0: 80},
                    fill: 		'transparent',
                    stroke: 	'#C0C1C3',
                    strokeWidth: {40:0},
                    opacity: 	0.2,
                    duration: 1800,
                    delay: 		300,
                    easing: 	mojs.easing.bezier(0, 1, 0.5, 1)
                }),
                new mojs.Tween({
                    duration : 1300,
                    easing: mojs.easing.ease.out,
                    onUpdate: function(progress) {
                        var opacityProgress = opacityCurve11(progress);
                        el11span.style.opacity = opacityProgress;

                        var scaleProgress = scaleCurve11(progress);
                        el11span.style.WebkitTransform = el11span.style.transform = 'scale3d(' + scaleProgress + ',' + scaleProgress + ',9)';

                        var colorProgress = opacityCurve11(progress);
                        el11.style.color = colorProgress >= 1 ? '#E87171' : '#C0C1C3';
                    }
                })
            ],
            onUnCheck : function() {
                el11.style.color = '#C0C1C3';	
            }
        });
    
    }
    
    if (items!='') init();

})(window);
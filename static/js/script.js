$(document).ready(function () {
    $('.accordion__item').click(function () {
        $(this).toggleClass('open');
    });

    $('.header__burger').click(function (event) {
        $('.header__burger,.header__menu').toggleClass('active');
        $('body').toggleClass('lock')
    }); 

    if ($('window').width() <= 768) {
        $('.first_lvl_menu>.sub-menu>li>menu__link').click(function(event) {
            event.preventDefault();
        });
    };

    // (function() {
    //     // Creates a new canvas element and appends it as a child
    //     // to the parent element, and returns the reference to
    //     // the newly created canvas element
    
    
    //     function createCanvas(parent, width, height) {
    //         var canvas = {};
    //         canvas.node = document.createElement('canvas');
    //         canvas.context = canvas.node.getContext('2d');
    //         canvas.node.width = width || 100;
    //         canvas.node.height = height || 100;
    //         parent.appendChild(canvas.node);
    //         return canvas;
    //     }
    
    //     function init(container, width, height, fillColor) {
    //         var canvas = createCanvas(container, width, height);
    //         var ctx = canvas.context;
    //         // define a custom fillCircle method
    //         ctx.fillCircle = function(x, y, radius, fillColor) {
    //             this.fillStyle = fillColor;
    //             this.beginPath();
    //             this.moveTo(x, y);
    //             this.arc(x, y, radius, 0, Math.PI * 2, false);
    //             this.fill();
    //         };
    //         ctx.clearTo = function(fillColor) {
    //             ctx.fillStyle = fillColor;
    //             ctx.fillRect(0, 0, width, height);
    //         };
    //         ctx.clearTo(fillColor || "#ddd");
    
    //         // bind mouse events
    //         canvas.node.onmousemove = function(e) {
    //             if (!canvas.isDrawing) {
    //                return;
    //             }
    //             var x = e.pageX - this.offsetLeft;
    //             var y = e.pageY - this.offsetTop;
    //             var radius = 10; // or whatever
    //             var fillColor = '#ff0000';
    //             ctx.globalCompositeOperation = 'destination-out';
    //             ctx.fillCircle(x, y, radius, fillColor);
    //         };
    //         canvas.node.onmousedown = function(e) {
    //             canvas.isDrawing = true;
    //         };
    //         canvas.node.onmouseup = function(e) {
    //             canvas.isDrawing = false;
    //         };
    //     }
    
    //     var container = document.getElementById('canvas');
    //     init(container, 531, 438, '#ddd');
    
    // })();


    // $(window).mousemove(function(e){
    //     let w = $('.spotlight').innerWidth(),
    //     h = $('.spotlight').innerHeight(),
    //     t = e.pageY - $('.spotlight').offset().top,
    //     l = e.pageX - $('.spotlight').offset().left;
    //     $('.spotlight').css('background-image', 'radial-gradient(circle at ' + (l / w * 100) + '% ' + (t / h * 100) + '%, transparent 80px, rgba(26,9,48,.97) 120px)', 'backdrop-filter', 'blur(5px)');
    // });
    
    (function ($) {
        var methods = {
            init: function (options) {
                return this.each(function () {
                    var $this = $(this),
                        data = $this.data('eraser');
    
                    if (!data) {
                        var width = $(".spotlight_wrap").width(),
                            height = $(".spotlight_wrap").height(),
                            pos = $this.offset(),
                            $canvas = $("<canvas/>"),
                            canvas = $canvas.get(0),
                            size = (options && options.size) ? options.size : 100,
                            completeRatio = (options && options.completeRatio) ? options.completeRatio : .7,
                            completeFunction = (options && options.completeFunction) ? options.completeFunction : null,
                            parts = [],
                            colParts = Math.floor(width / size),
                            numParts = colParts * Math.floor(height / size),
                            n = numParts,
                            ctx = canvas.getContext("2d");
    
                        // replace target with canvas
                        $this.after($canvas);
                        canvas.id = this.id;
                        canvas.className = this.className;
                        canvas.width = width;
                        canvas.height = height;
                        ctx.drawImage(this, 0, 0);
                        $this.remove();
    
                        // prepare context for drawing operations
                        ctx.globalCompositeOperation = "destination-out";
                        ctx.strokeStyle = 'rgba(255,0,0,255)';
                        ctx.lineWidth = size;
    
                        ctx.lineCap = "round";
                        // bind events
                        $canvas.bind('mousedown.eraser', methods.mouseDown);
                        $canvas.bind('touchstart.eraser', methods.touchStart);
                        $canvas.bind('touchmove.eraser', methods.touchMove);
                        $canvas.bind('touchend.eraser', methods.touchEnd);
    
                        // reset parts
                        while (n--) parts.push(1);
    
                        // store values
                        data = {
                            posX: pos.left,
                            posY: pos.top,
                            touchDown: false,
                            touchID: -999,
                            touchX: 0,
                            touchY: 0,
                            ptouchX: 0,
                            ptouchY: 0,
                            canvas: $canvas,
                            ctx: ctx,
                            w: width,
                            h: height,
                            source: this,
                            size: size,
                            parts: parts,
                            colParts: colParts,
                            numParts: numParts,
                            ratio: 0,
                            complete: false,
                            completeRatio: completeRatio,
                            completeFunction: completeFunction
                        };
                        $canvas.data('eraser', data);
    
                        // listen for resize event to update offset values	
                        $(window).resize(function () {
                            var pos = $canvas.offset();
                            data.posX = pos.left;
                            data.posY = pos.top;
                        });
                    }
                });
            },
            touchStart: function (event) {
                var $this = $(this),
                    data = $this.data('eraser');
    
                if (!data.touchDown) {
                    var t = event.originalEvent.changedTouches[0],
                        tx = t.pageX - data.posX,
                        ty = t.pageY - data.posY;
                    methods.evaluatePoint(data, tx, ty);
                    data.touchDown = true;
                    data.touchID = t.identifier;
                    data.touchX = tx;
                    data.touchY = ty;
                    event.preventDefault();
                }
            },
            touchMove: function (event) {
                var $this = $(this),
                    data = $this.data('eraser');
    
                if (data.touchDown) {
                    var ta = event.originalEvent.changedTouches,
                        n = ta.length;
                    while (n--)
                    if (ta[n].identifier == data.touchID) {
                        var tx = ta[n].pageX - data.posX,
                            ty = ta[n].pageY - data.posY;
                        methods.evaluatePoint(data, tx, ty);
                        data.ctx.beginPath();
                        data.ctx.moveTo(data.touchX, data.touchY);
                        data.touchX = tx;
                        data.touchY = ty;
                        data.ctx.lineTo(data.touchX, data.touchY);
                        data.ctx.stroke();
                        event.preventDefault();
                        break;
                    }
                }
            },
            touchEnd: function (event) {
                var $this = $(this),
                    data = $this.data('eraser');
    
                if (data.touchDown) {
                    var ta = event.originalEvent.changedTouches,
                        n = ta.length;
                    while (n--)
                    if (ta[n].identifier == data.touchID) {
                        data.touchDown = false;
                        event.preventDefault();
                        break;
                    }
                }
            },
    
            evaluatePoint: function (data, tx, ty) {
                var p = Math.floor(tx / data.size) + Math.floor(ty / data.size) * data.colParts;
                if (p >= 0 && p < data.numParts) {
                    data.ratio += data.parts[p];
                    data.parts[p] = 0;
                    if (!data.complete) {
                        if (data.ratio / data.numParts >= data.completeRatio) {
                            data.complete = true;
                            if (data.completeFunction != null) data.completeFunction();
                        }
                    }
                }
    
            },
    
            mouseDown: function (event) {
                var $this = $(this),
                    data = $this.data('eraser'),
                    tx = event.pageX - data.posX,
                    ty = event.pageY - data.posY;
                methods.evaluatePoint(data, tx, ty);
                data.touchDown = true;
                data.touchX = tx;
                data.touchY = ty;
                data.ctx.beginPath();
                data.ctx.moveTo(data.touchX - 1, data.touchY);
                data.ctx.lineTo(data.touchX, data.touchY);
                data.ctx.stroke();
                $this.bind('mousemove.eraser', methods.mouseMove);
                $(document).bind('mouseup.eraser', data, methods.mouseUp);
                event.preventDefault();
            },
    
            mouseMove: function (event) {
                var $this = $(this),
                    data = $this.data('eraser'),
                    tx = event.pageX - data.posX,
                    ty = event.pageY - data.posY;
                methods.evaluatePoint(data, tx, ty);
                data.ctx.beginPath();
                data.ctx.moveTo(data.touchX, data.touchY);
                data.touchX = tx;
                data.touchY = ty;
                data.ctx.lineTo(data.touchX, data.touchY);
                data.ctx.stroke();
                event.preventDefault();
            },
    
            mouseUp: function (event) {
                var data = event.data,
                    $this = data.canvas;
                data.touchDown = false;
                $this.unbind('mousemove.eraser');
                $(document).unbind('mouseup.eraser');
                event.preventDefault();
            },
    
            clear: function () {
                var $this = $(this),
                    data = $this.data('eraser');
                if (data) {
                    data.ctx.clearRect(0, 0, data.w, data.h);
                    var n = data.numParts;
                    while (n--) data.parts[n] = 0;
                    data.ratio = data.numParts;
                    data.complete = true;
                    if (data.completeFunction != null) data.completeFunction();
                }
            },
    
            size: function (value) {
                var $this = $(this),
                    data = $this.data('eraser');
                if (data && value) {
                    data.size = value;
                    data.ctx.lineWidth = value;
                }
            },
    
            reset: function () {
                var $this = $(this),
                    data = $this.data('eraser');
                if (data) {
                    data.ctx.globalCompositeOperation = "source-over";
                    data.ctx.drawImage(data.source, 0, 0);
                    data.ctx.globalCompositeOperation = "destination-out";
                    var n = data.numParts;
                    while (n--) data.parts[n] = 1;
                    data.ratio = 0;
                    data.complete = false;
                }
            }
    
        };
    
        $.fn.eraser = function (method) {
            if (methods[method]) {
                return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else if (typeof method === 'object' || !method) {
                return methods.init.apply(this, arguments);
            } else {
                $.error('Method ' + method + ' does not yet exist on jQuery.eraser');
            }
        };
    })(jQuery);
    
    addEventListener( "load", init, false );
                
                function init( event ) {
                    $("#redux").eraser();
                    
                    // you can alse specify the brush size (in pixel) by using options :
                    // $("#redux").eraser({size: 20});
                }
                
                function remove(event) {
                    $("#redux").eraser('clear');
                    event.preventDefault();
                }
                
                function reset(event) {
                    $("#redux").eraser('reset');
                    event.preventDefault();
                }
    
    function setEqualHeight(columns){
        var tallestcolumn = 0;
        columns.each(
            function(){
                currentHeight = $(this).height();
                if(currentHeight > tallestcolumn){
                    tallestcolumn = currentHeight;
                }
            }
        );
        columns.attr('style','min-height:' + tallestcolumn + 'px');
    }
    $(document).ready(function() {
        setEqualHeight($(".offer_block-tariff-top"));
    });
    $(document).ready(function() {
        setEqualHeight($(".case_slide__title"));
    });    
    $(document).ready(function() {
        setEqualHeight($(".services-block__text"));
    });  
});

document.addEventListener('DOMContentLoaded', function(){
    //LazyLoad for MAP
    let map_container = document.getElementById('map_container');      
    let options_map = {          
        once: true,          
        passive: true,          
        capture: true      
    };      
    map_container.addEventListener('click', start_lazy_map, options_map);      
    map_container.addEventListener('mouseover', start_lazy_map, options_map);      
    map_container.addEventListener('touchstart', start_lazy_map, options_map);      
    map_container.addEventListener('touchmove', start_lazy_map, options_map);        
    let map_loaded = false;      
    function start_lazy_map() {          
        if (!map_loaded) {              
            let map_block = document.getElementById('ymap_lazy');              
            map_loaded = true;              
            map_block.setAttribute('src', map_block.getAttribute('data-src'));              
            map_block.removeAttribute('data-src');          
        }      
    };
}, false);


var header = $(".header__container");
var scrollChange = 70;
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= scrollChange) {
        header.addClass("top-0");
    } else {
        header.removeClass("top-0");
    }
});
      
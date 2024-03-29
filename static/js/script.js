$(document).ready(function() {
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        };
        return color;
    };

    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min)) + min; //Максимум не включается, минимум включается
    }
    $('.spotlight_key').each((i, el) => el.style.color = getRandomColor());
    if (window.innerWidth > 900) {
        $('.spotlight_key').each((i, el) => el.style.fontSize = getRandomInt(14, 20) + "px");
    } else if (window.innerWidth > 650) {
        $('.spotlight_key').each((i, el) => el.style.fontSize = getRandomInt(14, 18) + "px");
    } else if (window.innerWidth > 500) {
        $('.spotlight_key').each((i, el) => el.style.fontSize = getRandomInt(13, 14) + "px");
    } else {
        $('.spotlight_key').each((i, el) => el.style.fontSize = getRandomInt(13, 14) + "px");
    }




    $('.accordion__item').click(function() {
        $(this).toggleClass('open');
    });

    $('.header__burger').click(function(event) {
        $('.header__burger,.header__menu').toggleClass('active');
        $('body').toggleClass('lock')
    });

    if ($('window').width() <= 768) {
        $('.first_lvl_menu>.sub-menu>li>menu__link').click(function(event) {
            event.preventDefault();
        });
    };

    (function($) {
        var methods = {
            init: function(options) {
                return this.each(function() {
                    var $this = $(this),
                        data = $this.data('eraser');

                    if (!data) {
                        var width = $(".spotlight_wrap").width(),
                            height = $(".spotlight_wrap").height(),
                            pos = $this.offset(),
                            $canvas = $("<canvas/>"),
                            canvas = $canvas.get(0),
                            size = (options && options.size) ? options.size : 100,
                            completeRatio = (options && options.completeRatio) ? options.completeRatio : .5,
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
                        $canvas.bind('mousemove.eraser', methods.mouseMove);
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
                        $(window).resize(function() {
                            var pos = $canvas.offset();
                            data.posX = pos.left;
                            data.posY = pos.top;
                        });
                    }
                });
            },
            touchStart: function(event) {
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
            touchMove: function(event) {
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
            touchEnd: function(event) {
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

            evaluatePoint: function(data, tx, ty) {
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

            mouseDown: function(event) {
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

            mouseMove: function(event) {
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

            mouseUp: function(event) {
                var data = event.data,
                    $this = data.canvas;
                data.touchDown = false;
                $this.unbind('mousemove.eraser');
                $(document).unbind('mouseup.eraser');
                event.preventDefault();
            },

            clear: function() {
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

            size: function(value) {
                var $this = $(this),
                    data = $this.data('eraser');

                if (data && value) {
                    data.size = value;
                    data.ctx.lineWidth = value;
                }
            },

            reset: function() {
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

        $.fn.eraser = function(method) {
            if (methods[method]) {
                return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else if (typeof method === 'object' || !method) {
                return methods.init.apply(this, arguments);
            } else {
                $.error('Method ' + method + ' does not yet exist on jQuery.eraser');
            }
        };
    })(jQuery);

    addEventListener("load", init, false);

    function init(event) {
        $("#redux").eraser({ size: 30 });


        // you can alse specify the brush size (in pixel) by using options :
        // $("#redux").eraser({size: 10});
    }

    function remove(event) {
        $("#redux").eraser('clear');
        event.preventDefault();
    }

    function reset(event) {
        $("#redux").eraser('reset');
        event.preventDefault();
    }

    $(".spotlight_wrap").mousemove(function(e) {
        var parentOffset = $(this).parent().offset();
        var posX = (e.pageX - parentOffset.left) - 30;
        var posY = (e.pageY - parentOffset.top) - 30;

        $('mask g').attr('transform', 'translate(' + posX + ',' + posY + ')');
    });



    function setEqualHeight(columns) {
        var tallestcolumn = 0;
        columns.each(
            function() {
                currentHeight = $(this).height();
                if (currentHeight > tallestcolumn) {
                    tallestcolumn = currentHeight;
                }
            }
        );
        columns.attr('style', 'min-height:' + tallestcolumn + 'px');
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

document.addEventListener('DOMContentLoaded', function() {
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



function openModal() {
    document.getElementById("promo_modal").classList.add("active");
}


function closeModal() {
    document.getElementById("promo_modal").classList.remove("active");
}


function changeTimezone(date, ianatz) {
    var invdate = new Date(date.toLocaleString('en-US', {
        timeZone: ianatz
    }));

    var diff = invdate.getTime() - date.getTime();

    return new Date(date.getTime() - diff);
};

document.addEventListener('DOMContentLoaded', function() {
    // конечная дата
    const x = new Date("2023-04-30T10:00:00");
    // часовой пояс
    // https://en.wikipedia.org/wiki/List_of_tz_database_time_zones
    var deadline = changeTimezone(x, "Europe/Moscow");
    // id таймера
    let timerId = null;
    // склонение числительных
    function declensionNum(num, words) {
        return words[(num % 100 > 4 && num % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][(num % 10 < 5) ? num % 10 : 5]];
    }
    // вычисляем разницу дат и устанавливаем оставшееся времени в качестве содержимого элементов
    function countdownTimer() {
        const diff = deadline - new Date();
        if (diff <= 0) {
            clearInterval(timerId);
        }
        const days = diff > 0 ? Math.floor(diff / 1000 / 60 / 60 / 24) : 0;
        const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
        const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
        const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;
        $days.textContent = days < 10 ? '0' + days : days;
        $hours.textContent = hours < 10 ? '0' + hours : hours;
        $minutes.textContent = minutes < 10 ? '0' + minutes : minutes;
        $seconds.textContent = seconds < 10 ? '0' + seconds : seconds;
        $days.dataset.title = declensionNum(days, ['день', 'дня', 'дней']);
        $hours.dataset.title = declensionNum(hours, ['час', 'часа', 'часов']);
        $minutes.dataset.title = declensionNum(minutes, ['минута', 'минуты', 'минут']);
        $seconds.dataset.title = declensionNum(seconds, ['секунда', 'секунды', 'секунд']);
    }
    // получаем элементы, содержащие компоненты даты
    const $days = document.querySelector('.timer__days');
    const $hours = document.querySelector('.timer__hours');
    const $minutes = document.querySelector('.timer__minutes');
    const $seconds = document.querySelector('.timer__seconds');
    // вызываем функцию countdownTimer
    countdownTimer();
    // вызываем функцию countdownTimer каждую секунду
    timerId = setInterval(countdownTimer, 1000);
});

//Вывод списка городов
var dropdown = document.getElementById("dropdown");
var cityList = dropdown.getElementsByTagName("ul")[0];
var selectedCity = document.getElementById("selectedCity");

dropdown.addEventListener("mouseover", function() {
    cityList.style.display = "grid";
});

dropdown.addEventListener("mouseout", function() {
    if (!selectedCity.innerHTML) {
        cityList.style.display = "none";
    } else {
        cityList.addEventListener("mouseout", function() {
            cityList.style.display = "none";
        });
    }
});
cityList.addEventListener("click", function(e) {
    if (e.target && e.target.nodeName == "LI") {

        selectedCity.innerHTML = e.target.innerHTML;
        cityList.style.display = "none";
    }
});

// Сохранение выбранного города
var savedCity = localStorage.getItem('selectedCity');
if (savedCity) {
    selectedCity.innerHTML = savedCity;
}
cityList.addEventListener("click", function(e) {
    if (e.target && e.target.nodeName == "LI") {
        selectedCity.innerHTML = e.target.innerHTML;
        localStorage.setItem('selectedCity', selectedCity.innerHTML);
        cityList.style.display = "none";
    }
});
// выравнивание отзывов 
window.addEventListener('load', function() {
    var blockWrappers = document.querySelectorAll('.main_block__wrapper');
    var maxHeight = 0;
    blockWrappers.forEach(function(wrapper) {
        var blocks = wrapper.querySelectorAll('.slick-slide');
        blocks.forEach(function(block) {
            var height = block.offsetHeight;
            if (height > maxHeight) {
                maxHeight = height;
            }
        });
    });
    blockWrappers.forEach(function(wrapper) {
        var blocks = wrapper.querySelectorAll('.slick-slide');
        blocks.forEach(function(block) {
            block.style.height = maxHeight + 'px';
        });
    });
});
var Copter2DControl = Class.create({
    coordinateListeners: null,
    xListeners: null,
    yListeners: null,
    lastX: null,
    lastSentX: null,
    lastY: null,
    lastSentY: null,
    containerR: null,
    draggableCircleR: null,
    draggableCircle: null,
    draggableHelperCircle: null,
    intervalId: null,
    container: null,
    init: function (containerId, responseIntervalMillliseconds) {
        var self = this;
        this.draggableCircle = jQuery("#" + containerId + " .f_ec_btn");
        this.container = jQuery("#" + containerId);
        this.draggableHelperCircle = this.container.find('.f_ec_btn_real');
        this.containerR = this.container.width() / 2;
        this.draggableCircleR = this.draggableCircle.width() / 2;
        this.container.unbind();
        this.draggableCircle.unbind();
        if (this.intervalId !== null) {
            clearInterval(this.intervalId);
        }
        this.intervalId = window.setInterval(this.fireChanges.bind(this), responseIntervalMillliseconds);
        this.container.mouseup(function (e) {
            self.resetDraggableCircle();
        });
        this.container.mousedown(function (e) {
            var offset = this.getClientRects()[0];
            var borderWidth = (jQuery(this).outerWidth() - jQuery(this).innerWidth()) / 2;
            var mouseX = Math.floor(e.clientX - offset.left - borderWidth);
            var mouseY = Math.floor(e.clientY - offset.top - borderWidth);
            self.draggableCircle.css({'left': mouseX - self.draggableCircleR, 'top': mouseY - self.draggableCircleR});
            self.limitDraggableObjectInParentCircle();
            self.draggableCircle.trigger(e);
        });
        self.draggableCircle.mousedown(function (e) {
            e.preventDefault();
            return false;
        });
        self.draggableCircle.draggable({
            refreshPositions: true,
            start: function () {
            },
            drag: function () {
                self.limitDraggableObjectInParentCircle();
            },
            stop: function () {
                /* var position = jQuery(this).position();
                 var circleWidth = jQuery(this).width();
                 var circleHeight = jQuery(this).width();
                 var y = -parseInt(position.top + circleHeight / 2) + 100;
                 var x = parseInt(position.left + circleWidth / 2) - 100;
                 var angle = thisInstance.getAngleByXY(x, y);
                 var radian = angle * Math.PI / 180;
                 var distance = Math.sqrt(x * x + y * y);
                 if (distance > 100) {
                 jQuery(this).parent().find('.f_ec_btn_real').css({'display': 'none'});
                 var xx = 100 * Math.cos(radian);
                 var yy = 100 * Math.sin(radian);
                 var leftTop = thisInstance.translateXYToLeftTop(xx, yy);
                 jQuery(this).css({'visibility': 'visible', 'left': leftTop[0] - circleHeight / 2, 'top': leftTop[1] - circleWidth / 2});
                 }*/

                self.resetDraggableCircle();

            }
        });
    },
    limitDraggableObjectInParentCircle: function () {
        var position = this.draggableCircle.position();
        var xy = this.translateLeftTopToXY(position.left, position.top);
        var x = xy[0];
        var y = xy[1];
        var angle = this.getAngleByXY(x, y);
        var radian = angle * Math.PI / 180;
        var distance = Math.sqrt(x * x + y * y);
        var finalX = x;
        var finalY = y;
        if (distance > this.containerR) {
            var xx = this.containerR * Math.cos(radian);
            var yy = this.containerR * Math.sin(radian);
            var leftTop = this.translateXYToLeftTop(xx, yy, this.containerR);
            this.draggableHelperCircle.css({'left': leftTop[0] - this.draggableCircleR, 'top': leftTop[1] - this.draggableCircleR, 'display': 'block'});
            this.draggableCircle.css({'visibility': 'hidden'});
            finalX = xx;
            finalY = yy;
        } else
        {
            this.draggableCircle.css({'visibility': 'visible'});
            this.draggableCircle.parent().find('.f_ec_btn_real').css({'display': 'none'});
        }
        this.lastX = Math.round(finalX * 100 / this.containerR);
        this.lastY = Math.round(finalY * 100 / this.containerR);
    },
    resetDraggableCircle: function () {
        var leftTop = this.translateXYToLeftTop(0, 0);
        var self = this;
        var resetCss = {'left': leftTop[0] - this.draggableCircleR, 'top': leftTop[1] - this.draggableCircleR};
        this.draggableCircle.animate(resetCss, 200, 'swing', function () {
            self.draggableCircle.css({'visibility': 'visible'});
        });
        this.draggableHelperCircle.animate(resetCss, 200, 'swing', function () {
            self.draggableHelperCircle.css({'display': 'none'});
        });
        this.lastX = 0;
        this.lastY = 0;
    },
    translateXYToLeftTop: function (x, y)
    {
        return [x + this.containerR, -y + this.containerR];
    },
    translateLeftTopToXY: function (left, top)
    {
        var l = parseInt(left + this.draggableCircleR) - this.containerR;
        var t = -parseInt(top + this.draggableCircleR) + this.containerR;
        return [l, t];
    },
    getAngleByXY: function (x, y)
    {

        var angle = Math.atan(Math.abs(y / x)) * 180 / Math.PI;
        if (x >= 0 && y >= 0)
        {
            return angle;
        } else
        if (x < 0 && y >= 0)
        {
            return 180 - angle;
        } else
        if (x <= 0 && y < 0)
        {
            return 180 + angle;
        } else
        if (x > 0 && y < 0)
        {
            return 360 - angle;
        }
    },
    getX: function ()
    {
        return this.lastX;
    },
    getY: function ()
    {
        return this.lastY;
    },
    addCoordinateListener: function (listener)
    {
        if (this.coordinateListeners == null)
        {
            this.coordinateListeners = new Array();
        }
        this.coordinateListeners.push(listener);

    }
    ,
    addXListener: function (listener)
    {
        if (this.xListeners == null)
        {
            this.xListeners = new Array();
        }
        this.xListeners.push(listener);

    },
    addYListener: function (listener)
    {
        if (this.yListeners == null)
        {
            this.yListeners = new Array();
        }
        this.yListeners.push(listener);

    }
    ,
    fireCoordinateChangedToListeners: function (x, y) {
        if (this.coordinateListeners != null) {
            for (var i = 0; i < this.coordinateListeners.length; i++) {
                this.coordinateListeners[i](x, y);
            }
        }
    }
    ,
    fireXChangedToListeners: function (x) {
        if (this.xListeners != null) {
            for (var i = 0; i < this.xListeners.length; i++) {
                this.xListeners[i](x);
            }
        }
    },
    fireYChangedToListeners: function (y) {
        if (this.yListeners != null) {
            for (var i = 0; i < this.yListeners.length; i++) {
                this.yListeners[i](y);
            }
        }
    },
    fireChanges: function ()
    {
        if (this.lastSentX !== this.lastX)
        {
            this.fireXChangedToListeners(this.lastX);
        }
        if (this.lastSentY !== this.lastY)
        {
            this.fireYChangedToListeners(this.lastY);
        }

        if (this.lastSentX !== this.lastX || this.lastSentY !== this.lastY) {
            this.fireCoordinateChangedToListeners(this.lastX, this.lastY);
        }
        this.lastSentX = this.lastX;
        this.lastSentY = this.lastY;
    }
});
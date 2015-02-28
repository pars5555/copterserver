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
                var position = self.draggableCircle.position();
                var y = -parseInt(position.top + self.draggableCircleR) + self.containerR;
                var x = parseInt(position.left + self.draggableCircleR) - self.containerR;
                var angle = self.getAngleByXY(x, y);
                var radian = angle * Math.PI / 180;
                var distance = Math.sqrt(x * x + y * y);
                var finalX = x;
                var finalY = y;
                if (distance > self.containerR) {
                    var xx = self.containerR * Math.cos(radian);
                    var yy = self.containerR * Math.sin(radian);
                    var leftTop = self.translateXYToLeftTop(xx, yy, self.containerR);
                    self.draggableHelperCircle.css({'left': leftTop[0] - self.draggableCircleR, 'top': leftTop[1] - self.draggableCircleR, 'display': 'block'});
                    self.draggableCircle.css({'visibility': 'hidden'});
                    finalX = xx;
                    finalY = yy;
                } else
                {
                    self.draggableCircle.css({'visibility': 'visible'});
                    self.draggableCircle.parent().find('.f_ec_btn_real').css({'display': 'none'});
                }
                self.lastX = Math.round(finalX * 100 / self.containerR);
                self.lastY = Math.round(finalY * 100 / self.containerR);
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
    resetDraggableCircle: function () {
        var leftTop = this.translateXYToLeftTop(0, 0);
        this.draggableCircle.css({'visibility': 'visible', 'left': leftTop[0] - this.draggableCircleR, 'top': leftTop[1] - this.draggableCircleR});
        this.draggableHelperCircle.css({'display': 'none'});
    },
    translateXYToLeftTop: function (x, y)
    {
        return [x + this.containerR, -y + this.containerR];
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
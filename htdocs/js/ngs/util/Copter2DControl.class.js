var Copter2DControl = Class.create({
    coordinateListeners: null,
    xListeners: null,
    yListeners: null,
    lastX: null,
    lastY: null,
    init: function (containerId) {
        var thisInstance = this;
        jQuery("#" + containerId + " .f_ec_btn").draggable({
            refreshPositions: true,
            start: function () {
            },
            drag: function () {
                var position = jQuery(this).position();
                var circleWidth = jQuery(this).width();
                var circleHeight = jQuery(this).width();
                var y = -parseInt(position.top + circleHeight / 2) + 100;
                var x = parseInt(position.left + circleWidth / 2) - 100;
                var angle = thisInstance.getAngleByXY(x, y);
                var radian = angle * Math.PI / 180;
                var distance = Math.sqrt(x * x + y * y);
                var finalX = x;
                var finalY = y;
                if (distance > 100) {
                    var xx = 100 * Math.cos(radian);
                    var yy = 100 * Math.sin(radian);
                    var leftTop = thisInstance.translateXYToLeftTop(xx, yy);
                    jQuery(this).parent().find('.f_ec_btn_real').css({'left': leftTop[0] - circleHeight / 2, 'top': leftTop[1] - circleWidth / 2, 'display': 'block'});
                    jQuery(this).css({'visibility': 'hidden'});
                    finalX = xx;
                    finalY = yy;
                } else
                {
                    jQuery(this).css({'visibility': 'visible'});
                    jQuery(this).parent().find('.f_ec_btn_real').css({'display': 'none'});
                }
                finalX = Math.round(finalX);
                finalY = Math.round(finalY);
                if (thisInstance.lastX != finalX)
                {
                    thisInstance.fireXChangedToListeners(finalX);
                }
                if (thisInstance.lastY != finalY)
                {
                    thisInstance.fireYChangedToListeners(finalY);
                }
                thisInstance.lastX = finalX;
                thisInstance.lastY = finalY;
                thisInstance.fireCoordinateChangedToListeners(finalX, finalY);
                //jQuery('#' + objectName + "_values").html(finalX + ", " + finalY);
            },
            stop: function () {
                var position = jQuery(this).position();
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
                }
            }
        });
    },
    translateXYToLeftTop: function (x, y)
    {
        return [x + 100, -y + 100];
    },
    translateLeftTopToXY: function (top, left)
    {
        return [left - 100, -top + 100];
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

    }
    ,
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
});
ngs.AdminCopterLoad = Class.create(ngs.AbstractLoad, {
    connected: false,
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "copter";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "main_content";
    },
    getName: function () {
        return "admin_copter";
    },
    afterLoad: function () {
        this.initSocketConnection();
        this.initCameraStartStop();
        this.initGoogleMap();
        this.connectionLogToggle();
        this.initGpioFunctionality();
    },
    initGoogleMap: function () {
        var mapOptions = {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
    },
    getCameraSettings: function () {
        var ret = new Array();
        var resolution = jQuery('#camera_resolution').val();
        var width = parseInt(resolution.split('_')[0]);
        ret.push(width);
        var height = parseInt(resolution.split('_')[1]);
        ret.push(height);
        var fps = parseInt(jQuery('#camera_fps').val());
        ret.push(fps);
        return ret;
    },
    initCameraStartStop: function () {
        var thisInstance = this;
        var cameraSettings = thisInstance.getCameraSettings();
        ngs.load('admin_vlc_player', {'copter_id': jQuery('#copter_id').val(), width: cameraSettings[0], height: cameraSettings[1]});
        ngs.load('admin_jw_player', {'copter_id': jQuery('#copter_id').val(), width: cameraSettings[0], height: cameraSettings[1]});
        jQuery('#startCameraStreamingBtn').click(function () {

            var cameraSettings = thisInstance.getCameraSettings();
            var res = thisInstance.sendJsonMessage({command: ngs.Constants.CAMERA_COMMAND, action: ngs.Constants.CAMERA_START_HTTP_STREMING_ACTION, width: cameraSettings[0], height: cameraSettings[1], fps: cameraSettings[2]});
            if (res == true) {
                window.setTimeout(function () {
                    ngs.load('admin_vlc_player', {'copter_id': jQuery('#copter_id').val(), width: cameraSettings[0], height: cameraSettings[1]});
                }, 7000);
            }
        });
        jQuery('#startCameraStreamingRtmpBtn').click(function () {
            var cameraSettings = thisInstance.getCameraSettings();
            var res = thisInstance.sendJsonMessage({command: ngs.Constants.CAMERA_COMMAND, action: ngs.Constants.CAMERA_START_RTMP_STREAMING_ACTION, width: cameraSettings[0], height: cameraSettings[1], fps: cameraSettings[2]});
            if (res == true) {
                window.setTimeout(function () {
                    ngs.load('admin_jw_player', {'copter_id': jQuery('#copter_id').val(), width: cameraSettings[0], height: cameraSettings[1]});
                }, 5000);
            }
        });
        jQuery('#stopCameraStreamingBtn').click(function () {
            thisInstance.sendJsonMessage({command: ngs.Constants.CAMERA_COMMAND, action: ngs.Constants.CAMERA_STOP_STREAMING_COMMAND});
        });
    },
    sendJsonMessage: function (object, showInMessageBar)
    {
        if (typeof showInMessageBar === 'undefined')
        {
            showInMessageBar = true;
        }
        if (this.connected == true) {
            if (showInMessageBar == true) {
                jQuery('#conectionLog').append("<p class='my_message'>" + JSON.stringify(object) + "</p>");
                jQuery("#conectionLog").scrollTop(1E10);
            }
            this.socket.send(JSON.stringify(object));
            return true;
        } else {
            this.showNoConnectionBaloon();
            return false;
        }
    },
    showNoConnectionBaloon: function ()
    {
        jQuery("#connection_error_message").addClass("visible");
        setTimeout(function () {
            jQuery("#connection_error_message").removeClass("visible")
        }, 1000);
    },
    hideNoConnectionBaloon: function ()
    {
        jQuery("#connection_error_message").removeClass("visible")
    },
    sendPingPongCommand: function () {
        var pingId = this.makeRandomId();
        this.sendJsonMessage({'command': ngs.Constants.PING_COMMAND, "ping_id": pingId}, false);
        var thisInstance = this;
        window.setTimeout(function () {
            if (thisInstance.response_ping_id !== pingId) {
                jQuery('body').css({'background': "red"});
            } else
            {
                jQuery('body').css({'background': "white"});
            }
            thisInstance.sendPingPongCommand();
        }, 1000);
    },
    initSocketConnection: function () {
        var copter_img = jQuery("#copter_image").attr("style");
        var copter_ip = jQuery('#copter_ip').val();
        this.socket = new WebSocket("ws://" + copter_ip + ":6789/");
        var thisInstance = this;
        this.socket.onopen = function () {
            jQuery('#copterStatusText').html('conected');
            jQuery('#copterStatus').addClass("connected").removeClass("error");
            thisInstance.sendPingPongCommand();
            thisInstance.connected = true;
        };
        this.socket.onmessage = function (message) {
            var jsonResponse = jQuery.parseJSON(message.data);
            if (typeof jsonResponse.ping_id !== "undefined")
            {
                thisInstance.response_ping_id = jsonResponse.ping_id;
                return false;
            }
            jQuery('#conectionLog').append("<div class='copter_log_img' style=" + copter_img + ">" + message.data + "</div>");
            jQuery('#conectionLog').append("<p class='copter_message'>" + message.data + "</p>");
            jQuery("#conectionLog").scrollTop(1E10);
        };
        this.socket.onclose = function () {
            jQuery('#copterStatusText').html('closed');
            jQuery('#copterStatus').removeClass("connected").removeClass("error");
            jQuery("#page_reload").removeClass("hide");
            thisInstance.connected = false;
        };
        this.socket.onerror = function () {
            jQuery('#copterStatusText').html('error');
            jQuery('#copterStatus').addClass("error").removeClass("connected");
            thisInstance.connected = false;
        };
    },
    connectionLogToggle: function () {
        jQuery(".f_con_log_btn").click(function () {
            jQuery(".f_conection_log_box").toggleClass("opened");
            jQuery("#conectionLog").scrollTop(1E10);
        });
    },
    makeRandomId: function ()
    {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for (var i = 0; i < 5; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        return text;
    },
    initGpioFunctionality: function () {
        var self = this;
        jQuery("#pin_on").click(function () {
            var pin_value = parseInt(jQuery("#pin_num").val());
            var param = {
                command: ngs.Constants.GPIO_COMMAND,
                action: ngs.Constants.GPIO_SET_PIN_STATE_ACTION,
                pin_number: pin_value,
                pin_state: 1
            };
            self.sendJsonMessage(param);
        });
        jQuery("#pin_off").click(function () {
            var pin_value = parseInt(jQuery("#pin_num").val());
            var param = {
                command: ngs.Constants.GPIO_COMMAND,
                action: ngs.Constants.GPIO_SET_PIN_STATE_ACTION,
                pin_number: pin_value,
                pin_state: 0
            };
            self.sendJsonMessage(param);
        });
        jQuery("#send_puls_btn").click(function () {
            var duration = parseInt(jQuery("#duration").val());
            var pin_value = parseInt(jQuery("#pin_num").val());
            var param = {
                command: ngs.Constants.GPIO_COMMAND,
                action: ngs.Constants.GPIO_PULSE_ACTION,
                pin_number: pin_value,
                duration_milliseconds: duration

            };
            self.sendJsonMessage(param);
        });

        jQuery('#pin_on_if_hold_btn').mousedown(function () {
            var pin_value = parseInt(jQuery("#pin_num").val());
            var param = {
                command: ngs.Constants.GPIO_COMMAND,
                action: ngs.Constants.GPIO_SET_PIN_STATE_ACTION,
                pin_number: pin_value,
                pin_state: 1
            };
            self.sendJsonMessage(param);
        }).on('mouseup mouseleave', function () {
            var pin_value = parseInt(jQuery("#pin_num").val());
            var param = {
                command: ngs.Constants.GPIO_COMMAND,
                action: ngs.Constants.GPIO_SET_PIN_STATE_ACTION,
                pin_number: pin_value,
                pin_state: 0
            };
            self.sendJsonMessage(param);
        });
    }

});

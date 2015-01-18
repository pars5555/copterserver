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
        jQuery('#startCameraStreamingBtn').click(function () {
            if (thisInstance.connected == true) {
                var cameraSettings = thisInstance.getCameraSettings();
                thisInstance.sendJsonMessage({command: 'camera start streaming', width: cameraSettings[0], height: cameraSettings[1], fps: cameraSettings[2]});
                window.setTimeout(function () {
                    ngs.load('admin_vlc_player', {'copter_id': jQuery('#copter_id').val(), width: cameraSettings[0], height: cameraSettings[1]});
                }, 5000);
            } else {
                alert('no connection to device.');
            }
        });
        jQuery('#stopCameraStreamingBtn').click(function () {
            if (thisInstance.connected == true) {
                thisInstance.sendJsonMessage({command: 'camera stop streaming'});
            } else {
                alert('no connection to device.');
            }
        });
    },
    sendJsonMessage: function (object)
    {

        jQuery('#conectionLog').append("<p class='my_message'>" + JSON.stringify(object) + "</p>");
        jQuery("#conectionLog").scrollTop(1E10);
        this.socket.send(JSON.stringify(object));
    },
    initSocketConnection: function () {
        var copter_img = jQuery("#copter_image").attr("style");
        var copter_ip = jQuery('#copter_ip').val();
        this.socket = new WebSocket("ws://" + copter_ip + ":6789/");
        var thisInstance = this;
        this.socket.onopen = function () {
            jQuery('#copterStatusText').html('conected');
            jQuery('#copterStatus').addClass("connected").removeClass("error");
            thisInstance.connected = true;
        };
        this.socket.onmessage = function (message) {
            jQuery('#conectionLog').append("<div class='copter_log_img' style="+copter_img+">" + message.data + "</div>");
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
    }

});

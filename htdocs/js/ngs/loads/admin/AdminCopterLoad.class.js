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
        this.socket.send(JSON.stringify(object));
    },
    initSocketConnection: function () {
        var copter_ip = jQuery('#copter_ip').val();
        this.socket = new WebSocket("ws://" + copter_ip + ":6789/");
        var thisInstance = this;
        this.socket.onopen = function () {
            jQuery('#copterStatus').html('conected');
            thisInstance.connected = true;
        };
        this.socket.onmessage = function (message) {
            jQuery('#conectionLog').html(jQuery('#conectionLog').html() + '<br>' + message.data);
        };
        this.socket.onclose = function () {
            var cameraSettings = thisInstance.getCameraSettings();
            ngs.load('admin_copter', {'copter_id': jQuery('#copter_id').val(), camera_resolution: [cameraSettings[0], cameraSettings[1]], camera_fps: cameraSettings[2]});
            thisInstance.connected = false;
        };
        this.socket.onerror = function () {
            jQuery('#copterStatus').html('error');
            thisInstance.connected = false;
        };
    }

});

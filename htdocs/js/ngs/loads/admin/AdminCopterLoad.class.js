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
        return "content";
    },
    getName: function () {
        return "admin_copter";
    },
    afterLoad: function () {
        this.initSocketConnection();
        this.initCameraStartStop();
        this.initGoogleMap();
        this.initJwPlayer();
    },
    initJwPlayer:function(){
    jwplayer('video-jwplayer').setup({
      flashplayer:"/js/lib/jwplayer.flash.swf"
      , file:"rtmp://" + "178.160.222.161" + "/flvplayback/flv:myStream.flv"
      , autoStart: true
      , rtmp:{
        bufferlength:0.1
      }
      , deliveryType: "streaming"
      , width: 640
      , height: 480
      , player: {
        modes: {
          linear: {
            controls:{
              stream:{
                manage:false
                , enabled: false
              }
            }
          }
        }
      }
      , shows: {
        streamTimer: {
          enabled: true
          , tickRate: 100
        }
      }
    });    
    },
    initGoogleMap: function () {
        var mapOptions = {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
    },
    initCameraStartStop: function () {
        var thisInstance = this;
        jQuery('#startCameraStreamingBtn').click(function () {
            if (thisInstance.connected == true) {
                var resolution = jQuery('#camera_resolution').val();
                var width = parseInt(resolution.split('_')[0]);
                var height = parseInt(resolution.split('_')[1]);
                var fps = parseInt(jQuery('#camera_fps').val());
                thisInstance.sendJsonMessage({command: 'camera start streaming', width: width, height: height, fps: fps});
                window.setTimeout(function () {
                    ngs.load('admin_vlc_player', {'copter_id': jQuery('#copter_id').val(), width: width, height: height});
                }, 5000);
            } else {
                alert('no connection to device.');
            }
        });
        jQuery('#startCameraRaspistillBtn').click(function () {
            if (thisInstance.connected == true) {
                var resolution = jQuery('#camera_resolution').val();
                var width = parseInt(resolution.split('_')[0]);
                var height = parseInt(resolution.split('_')[1]);
                var fps = parseInt(jQuery('#camera_fps').val());
                thisInstance.sendJsonMessage({command: 'camera start raspistill', width: width, height: height, fps: fps});
                ngs.load('admin_jpg_stream', {'copter_id': jQuery('#copter_id').val(), width: width, height: height});
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
        jQuery('#stopCameraRaspistillBtn').click(function () {
            if (thisInstance.connected == true) {
                thisInstance.sendJsonMessage({command: 'camera stop raspistill'});
            } else {
                alert('no connection to device.');
            }
        });
    }
    ,
    sendJsonMessage: function (object)
    {
        this.socket.send(JSON.stringify(object));
    }
    ,
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
            jQuery('#copterStatus').html('closed');
            thisInstance.connected = false;
        };
        this.socket.onerror = function () {
            jQuery('#copterStatus').html('error');
            thisInstance.connected = false;
        };

        //   socket.send("sss");
    }

});

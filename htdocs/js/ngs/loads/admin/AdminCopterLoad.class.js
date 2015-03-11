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
        ngs.nestLoad('admin_copter_home_list', {});
        this.initSocketConnection();
        this.initCameraStartStop();
        this.initGoogleMap();
        this.initCopterHomes();
        this.initGpsOnOff();
        this.connectionLogToggle();
        this.initGpioFunctionality();
        this.initMpuFunctionality();
        this.initRebootButton();
        this.engineControlButton();
        this.initEngineStartStopButtons();
        this.initDistanceMeters();
    },
    initDistanceMeters: function () {
        var self = this;
        jQuery('#distance_meters_on_off').change(function () {
            var status = jQuery(this).is(':checked');
            var param = {
                command: ngs.Constants.HCSR04_COMMAND,
                action: status ? ngs.Constants.START_STREAM_DISTANCE_DATA : ngs.Constants.STOP_STREAM_DISTANCE_DATA
            };
            self.sendJsonMessage(param);
        });

    },
    setFrontDistanceValue: function (distance) {
        distance = parseInt(distance * 100) / 100;
        jQuery('#front_distance_meter_value').html(distance > 0 ? (distance + " cm") : "");
    },
    initCopterHomes: function () {
        var copterHomesJson = jQuery('#copterHomesJson').val();
        var copterHomesArray = jQuery.parseJSON(copterHomesJson);
        var image = {
            url: '/img/gmap_flag.png',
            // This marker is 20 pixels wide by 32 pixels tall.
            size: new google.maps.Size(20, 32),
            // The origin for this image is 0,0.
            origin: new google.maps.Point(0, 0),
            // The anchor for this image is the base of the flagpole at 0,32.
            anchor: new google.maps.Point(0, 32)
        };
        for (var i = 0; i < copterHomesArray.length; i++)
        {
            var copterHome = copterHomesArray[i];
            var homeMarker = new google.maps.Marker({position: {'lat': parseFloat(copterHome.lat), 'lng': parseFloat(copterHome.lng)}, map: this.googleMap, icon: image});
            this.googleMapMarker.setTitle(homeMarker.title);
        }
    },
    initGpsOnOff: function () {
        var self = this;
        jQuery('#gps_on_off').change(function () {
            var status = jQuery(this).is(':checked');
            var param = {
                command: ngs.Constants.GPS_COMMAND,
                action: (status ? ngs.Constants.START_STREAM_GPS_DATA : ngs.Constants.STOP_STREAM_GPS_DATA)
            };
            self.sendJsonMessage(param);
            if (!status) {
                self.showHideGoogleMapMarker(false);
            }
        });
    },
    showHideGoogleMapMarker: function (show) {
        if (show) {
            if (this.googleMapMarker.getMap() == null) {
                this.googleMapMarker.setMap(this.googleMap);
            }
        } else
        {
            this.googleMapMarker.setMap(null);
        }
    },
    initRebootButton: function () {
        var self = this;
        jQuery('#copter_reboot').click(function () {
            var param = {
                command: ngs.Constants.REBOOT_COMMAND
            };
            self.sendJsonMessage(param);
        });
    },
    initGoogleMap: function () {
        var mapCenterLng = 44.516495;
        var mapCenterLat = 40.206875;
        var mapOptions = {
            center: {lat: mapCenterLat, lng: mapCenterLng},
            zoom: 16
        };
        this.googleMap = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


        this.googleMapMarker = new google.maps.Marker({position: {lat: mapCenterLat, lng: mapCenterLng}, map: this.googleMap});
        this.googleMapMarker.setTitle("Lat: " + mapCenterLat + "\r\n" + "Lng: " + mapCenterLng);

        google.maps.event.addListener(this.googleMap, 'click', function (event) {
            var mLat = event.latLng.lat();
            var mLng = event.latLng.lng();

        });

    },
    setMarkerOnGoogleMap: function (lng, lat)
    {
        if (lng == null || lat == null || !(lng > 0) || !(lat > 0))
        {
            jQuery('#gps_error_message').html("No GPS data! Waiting to sattelite...");
            return;
        }
        var latlng = new google.maps.LatLng(lat, lng);
        this.googleMapMarker.setPosition(latlng);
        this.googleMapMarker.setTitle("Lat: " + lat + "\r\n" + "Lng: " + lng);
        this.googleMap.setCenter(latlng);
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
        if (this.connected === true) {
            if (showInMessageBar === true) {
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
            jQuery("#connection_error_message").removeClass("visible");
        }, 1000);
    },
    hideNoConnectionBaloon: function ()
    {
        jQuery("#connection_error_message").removeClass("visible");
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
        var self = this;
        this.socket.onopen = function () {
            jQuery('#copterStatusText').html('conected');
            jQuery('#copterStatus').addClass("connected").removeClass("error");
            self.sendPingPongCommand();
            self.connected = true;
        };
        this.socket.onmessage = function (message) {
            var jsonResponse = jQuery.parseJSON(message.data);
            if (typeof jsonResponse.ping_id !== "undefined")
            {
                self.response_ping_id = jsonResponse.ping_id;
                return false;
            }
            if (typeof jsonResponse.accelX !== "undefined" || typeof jsonResponse.gyroX !== "undefined")
            {
                jQuery('.accelerometer_state .cube').css({'transform': 'rotateX(' + jsonResponse.accelX + 'deg) rotateZ(' + (-jsonResponse.accelY) + 'deg)'});
                return false;
            }
            if (typeof jsonResponse.lng !== "undefined" && typeof jsonResponse.lat !== "undefined")
            {
                self.setMarkerOnGoogleMap(jsonResponse.lng, jsonResponse.lat);
                self.showHideGoogleMapMarker(true);
                return false;
            }
            if (typeof jsonResponse.fron_distance_cm !== "undefined")
            {
                self.setFrontDistanceValue(jsonResponse.fron_distance_cm);
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
            self.connected = false;
        };
        this.socket.onerror = function () {
            jQuery('#copterStatusText').html('error');
            jQuery('#copterStatus').addClass("error").removeClass("connected");
            self.connected = false;
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
    },
    initMpuFunctionality: function () {
        var self = this;
        jQuery("#accel_on").click(function () {
            var param = {
                command: ngs.Constants.MPU_COMMAND,
                action: ngs.Constants.SET_ACCELEROMETER_ON_ACTION
            };
            self.sendJsonMessage(param);
        });
        jQuery("#accel_off").click(function () {
            var param = {
                command: ngs.Constants.MPU_COMMAND,
                action: ngs.Constants.SET_ACCELEROMETER_OFF_ACTION
            };
            self.sendJsonMessage(param);
        });
        jQuery("#gyro_on").click(function () {
            var param = {
                command: ngs.Constants.MPU_COMMAND,
                action: ngs.Constants.SET_GYRO_ON_ACTION
            };
            self.sendJsonMessage(param);
        });
        jQuery("#gyro_off").click(function () {
            var param = {
                command: ngs.Constants.MPU_COMMAND,
                action: ngs.Constants.SET_GYRO_OFF_ACTION
            };
            self.sendJsonMessage(param);
        });
    },
    engineControlButton: function () {
        var self = this;
        var copter2DControl1 = new Copter2DControl();
        copter2DControl1.init("throttle_yaw_container", 100);
        copter2DControl1.addXListener(function (x) {
            var param = {
                command: ngs.Constants.ENGINE_COMMAND,
                action: ngs.Constants.SET_YAW_ACTION,
                value: x
            };
            self.sendJsonMessage(param);
            jQuery('#throttle_yaw_values').html("Yaw: " + copter2DControl1.getX() + "; Throttle: " + copter2DControl1.getY());
        });
        copter2DControl1.addYListener(function (y) {
            var param = {
                command: ngs.Constants.ENGINE_COMMAND,
                action: ngs.Constants.SET_THROTTLE_ACTION,
                value: y
            };
            self.sendJsonMessage(param);
            jQuery('#throttle_yaw_values').html("Yaw: " + copter2DControl1.getX() + "; Throttle: " + copter2DControl1.getY());
        });

        var copter2DControl2 = new Copter2DControl();
        copter2DControl2.init("pitch_roll_container", 100);
        copter2DControl2.addXListener(function (x) {
            var param = {
                command: ngs.Constants.ENGINE_COMMAND,
                action: ngs.Constants.SET_ROLL_ACTION,
                value: x
            };
            self.sendJsonMessage(param);
            jQuery('#pitch_roll_values').html("Roll: " + copter2DControl2.getX() + "; Pitch: " + copter2DControl2.getY());
        });
        copter2DControl2.addYListener(function (y) {
            var param = {
                command: ngs.Constants.ENGINE_COMMAND,
                action: ngs.Constants.SET_PITCH_ACTION,
                value: y
            };
            self.sendJsonMessage(param);
            jQuery('#pitch_roll_values').html("Roll: " + copter2DControl2.getX() + "; Pitch: " + copter2DControl2.getY());
        });
    },
    initEngineStartStopButtons: function () {
        var self = this;
        jQuery('#startEngine').click(function () {
            var param = {
                command: ngs.Constants.ENGINE_COMMAND,
                action: ngs.Constants.START_ENGINE_ACTION
            };
            self.sendJsonMessage(param);
        });
    }

});
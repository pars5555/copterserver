ngs.AdminJwPlayerLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "jw_player";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "copterJwPlayerContainer";
    },
    getName: function () {
        return "admin_jw_player";
    },
    afterLoad: function () {
        this.initJwPlayer();
    },
    initJwPlayer: function () {
        var copter_ip = jQuery('#copter_ip').val();
        jwplayer('video-jwplayer').setup({
            flashplayer: "/js/lib/jwplayer/jwplayer.flash.swf"
            , file: "rtmp://" + copter_ip + "/flvplayback/flv:myStream.flv"
            , autoStart: true
            , rtmp: {
                bufferlength: 0.1
            }
            , deliveryType: "streaming"
            , width: 480
            , height: 360
            , player: {
                modes: {
                    linear: {
                        controls: {
                            stream: {
                                manage: false
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
    }
});

ngs.AdminCopterHomeListLoad = Class.create(ngs.AbstractLoad, {
    connected: false,
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "copter_home_list";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "copter_home_list_container";
    },
    getName: function () {
        return "admin_copter_home_list";
    },
    afterLoad: function () {

        this.initCopterHomes();
        this.initAddHome();


    },
    initAddHome: function () {
        jQuery('#add_copter_home_btn').click(function () {
            var title = jQuery('#add_home_title').val();
            var lng = jQuery('#add_home_lng').val();
            var lat = jQuery('#add_home_lat').val();
            ngs.action('add_copter_home', {"lng": lng, "lat": lat, "title": title, "copter_unique_id": jQuery('#copter_unique_id').val()});
        });
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
        if (typeof ngs.copterHomeMarkers !== 'undefined')
        {
            for (var i = 0; i < ngs.copterHomeMarkers.length; i++)
            {
                ngs.copterHomeMarkers[i].setMap(null);
            }
        }
        ngs.copterHomeMarkers = new Array();
        for (var i = 0; i < copterHomesArray.length; i++)
        {
            var copterHome = copterHomesArray[i];
            var homeMarker = new google.maps.Marker({position: {'lat': parseFloat(copterHome.lat), 'lng': parseFloat(copterHome.lng)}, map: ngs.copterGoogleMap, icon: image});
            homeMarker.setTitle(homeMarker.title);
            homeMarker.id = copterHome.id;
            ngs.copterHomeMarkers.push(homeMarker);
        }

        jQuery('.copter_home_item').click(function () {
            var lng = jQuery(this).attr('lng');
            var lat = jQuery(this).attr('lat');
            var latlng = new google.maps.LatLng(lat, lng);
            ngs.copterGoogleMap.setCenter(latlng);
        });
        jQuery('.copter_home_item_remove').click(function () {
            var home_id = jQuery(this).attr('home_id');
            ngs.action('remove_copter_home', {"id": home_id});
        });

    }
});
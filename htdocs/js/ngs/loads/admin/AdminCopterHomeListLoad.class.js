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
        
        
    }
});
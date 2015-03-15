ngs.RemoveCopterHomeAction = Class.create(ngs.AbstractAction, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "do_remove_copter_home";
    },
    getMethod: function () {
        return "POST";
    },
    beforeAction: function () {
    },
    afterAction: function (transport) {
        var data = transport.responseText.evalJSON();
        ngs.load('admin_copter_home_list', {"copter_unique_id":jQuery('#copter_unique_id').val()});
       
        if (data.status === "ok") {
        } else if (data.status === "err") {
        }
    }
});

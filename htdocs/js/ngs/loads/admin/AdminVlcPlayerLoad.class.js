ngs.AdminVlcPlayerLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "vlc_player";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "copterVlcContainer";
    },
    getName: function () {
        return "admin_vlc_player";
    },
    afterLoad: function () {
    }
});

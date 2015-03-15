ngs.ActionFactory = Class.create();
ngs.ActionFactory.prototype = {
    initialize: function (ajaxLoader) {
        this.actions = [];

        //admin
        this.actions["remove_copter_home"] = function temp() {return new ngs.RemoveCopterHomeAction("remove_copter_home", ajaxLoader);};
        this.actions["add_copter_home"] = function temp() {return new ngs.AddCopterHomeAction("add_copter_home", ajaxLoader);};
    },
    getAction: function (name) {
        return this.actions[name]();
    }
};
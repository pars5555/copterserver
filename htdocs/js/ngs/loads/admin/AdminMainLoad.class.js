ngs.AdminMainLoad = Class.create(ngs.AbstractLoad, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function() {
        return "main";
    },
    getMethod: function() {
        return "POST";
    },
    getContainer: function() {
        return "content";
    },
    getName: function() {
        return "admin_main";
    },
    afterLoad: function() {     
        ngs.nestLoad(jQuery("#contentLoad").val(), {});
        
        this.toggleMenu();
    },
    toggleMenu : function(){
        jQuery(".f_menu_btn").on("click",function(){
           var menuAttr = jQuery(this).attr("data-menu");
           jQuery(".f_menu_item").removeClass("active");
           jQuery(".f_menu_item[data-menu='"+menuAttr+"']").addClass("active");
        });
        
        jQuery(".f_menu_close").on("click",function(){
           jQuery(this).closest(".f_menu_item").removeClass("active"); 
        });
    }
});

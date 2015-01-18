ngs.LoadFactory= Class.create();
ngs.LoadFactory.prototype={
	
	initialize: function(ajaxLoader){
		this.loads = [];
		this.loads["main"] = function temp(){return new ngs.MainLoad("main", ajaxLoader);};
		this.loads["home"] = function temp(){return new ngs.HomeLoad("home", ajaxLoader);};
		
		
        //admin
                this.loads["admin_main"] = function temp(){return new ngs.AdminMainLoad("admin_main", ajaxLoader);};
		this.loads["admin_home"] = function temp(){return new ngs.AdminHomeLoad("admin_home", ajaxLoader);};
		this.loads["admin_copter"] = function temp(){return new ngs.AdminCopterLoad("admin_copter", ajaxLoader);};
		this.loads["admin_copters"] = function temp(){return new ngs.AdminCoptersLoad("admin_copters", ajaxLoader);};
		this.loads["admin_vlc_player"] = function temp(){return new ngs.AdminVlcPlayerLoad("admin_vlc_player", ajaxLoader);};
		this.loads["admin_jpg_stream"] = function temp(){return new ngs.AdminJpgStreamLoad("admin_jpg_stream", ajaxLoader);};
		this.loads["user_main"] = function temp(){return new ngs.DentistMainLoad("user_main", ajaxLoader);};
		this.loads["user_home"] = function temp(){return new ngs.DentistHomeLoad("user_home", ajaxLoader);};
       
      
		},
	
	getLoad: function(name){
		try{
			return this.loads[name]();
		}
		catch(ex){
		}
	}
};
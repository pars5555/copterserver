ngs.AdminJpgStreamLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "jpg_stream";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "copterCameraStillContainer";
    },
    getName: function () {
        return "admin_jpg_stream";
    },
    afterLoad: function () {
        this.img = new Image();
        this.initGraphics();
        this.img.src = "http://"+jQuery('#copter_ip').val()+"/raspistill/pic.jpg?" + Math.random() * 10000000;
    },
    initGraphics: function () {
        var thisInstance = this;
        this.img.onload = function () {
            thisInstance.validImage = this;
            thisInstance.drawStuff();
            thisInstance.img.src = "http://"+jQuery('#copter_ip').val()+"/raspistill/pic.jpg?" + Math.random() * 10000000;
        };
        this.img.onerror= function () {            
            thisInstance.img.src = "http://"+jQuery('#copter_ip').val()+"/raspistill/pic.jpg?" + Math.random() * 10000000;
        };
        var cv = document.querySelector("canvas");
        this.ctx = cv.getContext("2d");
        cv.width = cv.clientWidth;
        cv.height = cv.clientHeight;
    },    
    drawStuff: function () {
        /*if (this.validImage) {
            this.ctx.clearRect(0, 0, this.ctx.canvas.width, this.ctx.canvas.height);
            this.ctx.drawImage(this.validImage, 0, 0);
        } */
        jQuery('body').append("<img  style='width:160px' src='"+this.validImage.src+"'>");
    }
});

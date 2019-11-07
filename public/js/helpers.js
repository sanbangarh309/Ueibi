(function(global) {
    this.San_Helper = function(data) {
        this.checkRedirect = function() {
            return data.redirect;
        }
        this.request = axios;
        this.loader = '<div class="loader"></div>';
        this.accesstoken = $('meta[name=access-token]').attr("content");
        this.language = data.language;
    }

    San_Helper.prototype.restrictBackButton = function(page) {
        if (window.history && window.history.pushState) {
            window.history.pushState('', null, './' + page);
            $(window).on('popstate', function() {
                document.location.href = '';
            });
        }
    }

    San_Helper.prototype.getCalls = function(query) {
        axios.get(query).then((res) => {
            return res.data;
        });
    }

    San_Helper.prototype.Alert = function(msg,element,alert='red',alert_div='#reg_msg_block_success',offst=0) {
        $(alert_div).show();
        $(alert_div).css('color',alert);
        $(alert_div).text(msg);
        $('html, body').animate({
            scrollTop: $(element).offset().top - parseInt(offst)
        }, 1000);
    }

    San_Helper.prototype.uploadFiles = function(totalImages,removed_items,type) {
        if(totalImages.length > 0){
            // var promises = [];
            var fd = new FormData();
            fd.append("type", type);
            var ins = totalImages.length;
            for (var x = 0; x < ins; x++) {
                if(!removed_items.includes(totalImages[x].name)){
                    if(totalImages[x].type.includes('image/') && type == 'img'){
                        fd.append("image", totalImages[x]);
                    }
                    if(totalImages[x].type.includes('video/') && type == 'video'){
                        fd.append("image", totalImages[x]);
                    }
                }
            }
            // console.log(apiUrl+'user/uploadFile');
            axios.post(apiUrl+'user/uploadFiles',fd,apiconfig).then((res) => {
                console.log(res.data);
                return res.data;
            }).catch((error) => {
                // console.log(error);
            });
            // promises.push(axios.post(apiUrl+'user/uploadFile',fd,apiconfig));

            // axios.all(promises).then(function(results) {
            //     console.log(results);
            //     return results;
            // });
            // return false;
          }
    }

    San_Helper.prototype.dataURItoBlob = function(dataURI) {
        // convert base64/URLEncoded data component to raw binary data held in a string
        var byteString;
        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);

        // separate out the mime component
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

        // write the bytes of the string to a typed array
        var ia = new Uint8Array(byteString.length);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }

        return new Blob([ia], {type:mimeString});
    }
}());

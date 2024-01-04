// ajax for searching products

function pdt_src(url,input,output){

    ajax_req = new XMLHttpRequest()
    ajax_req.onreadystatechange=function () {
        
        if (this.status==200 && this.readyState==4) {
            console.log("Connected ! "+this.response);
            output.innerHTML=this.responseText;
        }
    }

    ajax_req.open("GET",url+"?pdt_src="+input,false);
    ajax_req.send();
}
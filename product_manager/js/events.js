/**
 * This js file holds the events used within this website.
 */


document.getElementById('pdt_src').addEventListener('keyup',function (){
    
    
    if (this.value.length >0) {
        document.getElementById('pdt_src_rslt').setAttribute('style','display:block');
        pdt_src("server/pdt_src.php",this.value,document.getElementById('pdt_src_rslt'));
    }else{
        document.getElementById('pdt_src_rslt').setAttribute('style','display:none');
        document.getElementById('pdt_src_rslt').innerHTML=''
    }
})

for (   let index = 0; 
        index < document.getElementsByClassName('pdt_lst_form').length; 
        index++) {
    const element = document.getElementsByClassName('pdt_lst_form')[index];
    element.onsubmit=function () {
        return confirm("Are you sure to perform the action !");
        
    }
    
}

document.getElementById('logout_frm').onsubmit=function () {
    return confirm("Are you sure to logout !");
}

document.getElementsByClassName('info')[0].addEventListener('click',function () {
    this.setAttribute('style','display:none');
});

setTimeout(function (params) {
document.getElementsByClassName('info')[0].click();
},2000)
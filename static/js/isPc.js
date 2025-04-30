function goPAGE() {
    if ((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))) {
        /*window.location.href="你的手机版地址";*/
    }
    else {
        /*window.location.href="你的电脑版地址";
        window.location.href="isPc.html"; */
        // document.getElementsByTagName("body")[0].style.width = '440px';
        // document.getElementsByTagName("body")[0].style.margin = '0 auto';
    }
}
goPAGE();
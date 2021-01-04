$(() => {
    var url = window.location;
    // Will only work if string in href matches with location
    $('.pcoded-item li a[href="' + url + '"]').addClass('active');
    // Will also work for relative and absolute hrefs
    $('.pcoded-hasmenu li a').filter(function() {
       return this.href == url;
    }).parent().addClass('active');
    $('.pcoded-hasmenu li a').filter(function() {
       return this.href == url;
    }).parent().parent().parent().addClass('pcoded-trigger');
    $('.pcoded-hasmenu li a').filter(function() {
       return this.href == url;
    }).parent().parent().parent().addClass('active');
   
});
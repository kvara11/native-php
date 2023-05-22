    </div><!-- end bodywrap -->
    <footer class="footer footer-alt">

         <div class="trusted-logos">
            <div class="wrapper clear">
                <div class="col33"><img src="/img/BBBa-.png" /></div>
                <div class="col33"><img src="/img/comodo.png"/></div>
                <div class="col33"><img src="/img/NEFA.png" /></div>
                <!-- <div class="col25"><img src="/img/SD-RC.png" /></div> -->
            </div>
        </div>
        
        <div class="wrapper clear">
            <div class="col50">
                <div class="footer-contact-wrapper">
                    <img src="/img/triton-logo-white.png" class="footer-logo" />
                    <div class="contact-info">
                        1660 Hotel Circle N<br>
                        Suite 215<br>
                        San Diego, CA, 92108<br>
                        <a href="tel:8778221333">(877) 822-1333</a><br>
                        <a href="mailto:info@tritoncptl.com">info@tritoncptl.com</a><br>
                    </div>
                </div>
            </div>

            <div class="col50">
                <div class="copyright-info">
                    &copy; <?php echo date('Y'); ?> Copyright Triton Capital<br />
                    CFLL No. 60DBO42128 <br />
                    <a href="/privacy-policy">Privacy Policy</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    </footer>

    <script>var URL_BASE = '<?php echo URL_BASE; ?>';</script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="/<?php echo FOLDER_ASSETS; ?>/js/plugins.js"></script>
    <script>
        var base_url = '<?=APPLY_BASE_URL?>';
    </script>
    <script src="/<?php echo FOLDER_ASSETS; ?>/js/main.js"></script>
    <script src="/<?php echo FOLDER_ASSETS; ?>/js/global-functions.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#gross_revenue').keyup(function(event) {
                if (KeysPressed.getCode(event) == 8 || !KeysPressed.isInputNavigation(event)) {
                    var target = event.target,
                        val = $(target).val(),
                        cursor = new Cursor(target);

                    cursor.get();
                    val = Frmt.money(val, 0);
                    val = val.replace(/^\$/, '');
                    $(target).val(val).trigger('change');
                    cursor.set();
                }
            });
        });
    </script>

    <?php $this->outputRequiredJS(); ?>
    
    <script src="/<?php echo FOLDER_ASSETS; ?>/js/slick.min.js"></script>
    <script>
        $('.testimonials').slick({
            arrows: true
        });
        $('.success-stories-carousel').slick({
          dots: false,
          infinite: true,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 4,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false
              }
            },
            {
              breakpoint: 800,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 670,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5MDSJFK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- begin olark code -->
    <script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
    f[z]=function(){
    (a.s=a.s||[]).push(arguments)};var a=f[z]._={
    },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
    f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
    0:+new Date};a.P=function(u){
    a.p[u]=new Date-a.p[0]};function s(){
    a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
    hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
    return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
    b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
    b.contentWindow[g].open()}catch(w){
    c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
    var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
    b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
    loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
    /* custom configuration goes here (www.olark.com/documentation) */
    olark.identify('9735-628-10-7109');/*]]>*/</script><noscript><a href="https://www.olark.com/site/9735-628-10-7109/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
    <!-- end olark code -->
    </body>
</html>

<?php
if (IS_LOGIN !== true) {
?>
          <footer id='footer'>
            <div class='footer-wrapper'>
              <div class='row'>
                <div class='col-sm-6 text'>
                  Copyright &copy; <?php echo date("Y"); ?> TM5150
                </div>
                <div class='col-sm-6 buttons'>
                  <a class="btn btn-link" href="mailto:<?php echo HELP_EMAIL; ?>">Need help?</a>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </section>
    </div>
<?php
}
?>
    <script>window.SessionInfo = { '<?php echo session_name();?>' : '<?php echo session_id();?>' }; var URL_BASE = '<?php echo URL_BASE; ?>'; var HTTP_URL_BASE = '<?php echo HTTP_URL_BASE; ?>';</script>
    <!-- / jquery [required] -->
    <script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
    <!-- / jquery migrate (for compatibility with new jquery) [required] -->
    <script src="assets/javascripts/jquery/jquery-migrate.min.js" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
    <!-- / retina -->
    <script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="assets/javascripts/theme.js" type="text/javascript"></script>
    <!-- / START - page related files and scripts [optional] -->
<?php
if (!empty($required_js)) {
    foreach ($required_js as $rj) {
        if (strpos($rj, '//') === false) {
            if (strpos($rj, '/') !== 0) {
                $rj = 'assets/javascripts/'.$rj;
            }
        }
?>
    <script src="<?php echo $rj; ?>"></script>
<?php
    }
}
?>
    <!-- / END - page related files and scripts [optional] -->
  </body>
</html>

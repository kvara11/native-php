<?php

// http://djomla.blog.com/2011/02/16/php-versions-5-2-and-5-3-get_called_class/
    if ( !function_exists ('get_called_class') ) {
        function get_called_class ($bt = false, $l = 1)
        {
            if ( !$bt ) $bt = debug_backtrace ();
            if ( !isset($bt[$l]) ) throw new Exception("Cannot find called class -> stack level too deep.");
            if ( !isset($bt[$l]['type']) ) {
                throw new Exception ('type not set');
            }
            else switch ( $bt[$l]['type'] ) {
                case '::':
                    $lines = file ($bt[$l]['file']);
                    $i = 0;
                    $callerLine = '';
                    do {
                        $i++;
                        $callerLine = $lines[$bt[$l]['line'] - $i] . $callerLine;
                    }
                    while ( stripos ($callerLine, $bt[$l]['function']) === false );
                    preg_match ('/([a-zA-Z0-9\_]+)::' . $bt[$l]['function'] . '/',
                        $callerLine,
                        $matches);
                    if ( !isset($matches[1]) ) {
                        // must be an edge case.
                        throw new Exception ("Could not find caller class: originating method call is obscured.");
                    }
                    switch ( $matches[1] ) {
                        case 'self':
                        case 'parent':
                            return get_called_class ($bt, $l + 1);
                        default:
                            return $matches[1];
                    }
                // won't get here.
                case '->':
                    switch ( $bt[$l]['function'] ) {
                        case '__get':
                            // edge case -> get class of calling object
                            if ( !is_object ($bt[$l]['object']) ) throw new Exception ("Edge case fail. __get called on non object.");
                            return get_class ($bt[$l]['object']);
                        default:
                            return $bt[$l]['class'];
                    }

                default:
                    throw new Exception ("Unknown backtrace method type");
            }
        }
    }


    function crawlerDetect ($setCrawler = null)
    {
        static $isCrawler;
        if ( $setCrawler != null ) {
            $isCrawler = (bool)$setCrawler;
        }
        else {
            if ( $isCrawler == null ) {
                $crawlers_agents = 'Google|msnbot|Rambler|Yahoo|AbachoBOT|accoona|AcioRobot|ASPSeek|CocoCrawler|Dumbot|FAST-WebCrawler|GeonaBot|Gigabot|Lycos|MSRBOT|Scooter|AltaVista|IDBot|eStyle|Scrubby';
                $isCrawler = !(strpos ($crawlers_agents, $_SERVER['HTTP_USER_AGENT']) === false);
            }
        }
        return $isCrawler;
    }

    function clean_url ($url, $allow_slashes = false)
    {
        $url = strtolower (trim ($url));
        $url = strip_tags (preg_replace ('/&([^;]*);/', '', $url));
        $remove_chars = array ("([\40])", "([^a-zA-Z0-9-\." . ($allow_slashes ? '\/' : '') . "])", "(-{2,})");
        $replace_with = array ("-", "", "-");
        $url = preg_replace ($remove_chars, $replace_with, $url);
        return $url;
    }

    function setLoginRedirect ($include_query_string = true)
    {
        $app = App::getInstance ();
        $_SESSION['LoginRedirect'] = $app->router->getURI () . ($include_query_string && !empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '');
    }

    function getLoginRedirect ($default_redirect = false)
    {
        $redirect = $_SESSION['LoginRedirect'];
        unset($_SESSION['LoginRedirect']);
        if ( empty($redirect) ) {
            $redirect = ($default_redirect ? $default_redirect : URL_BASE);
        }
        return $redirect;
    }

    /**
     * Dump something in a pretty manner
     *
     * @param  Mixed $what
     * @return void
     */
    function dump ($what)
    {
        echo '<pre>';
        var_dump ($what);
        echo '</pre>';
    }

    /**
     * Dump something and die
     *
     * @param  Mixed $what
     * @return void
     */
    function dd ($what)
    {
        dump ($what);
        die();
    }

    /**
     * Generate a suitable array for payment, containing
     * each year for the next 10 years from now.
     *
     * @return Array<integer, integer>
     */
    function generateYears ()
    {
        $years = array ();
        $this_year = (int)date ('Y');
        $end_year = $this_year + 10;

        foreach ( range ($this_year, $end_year) as $year ) {
            $short = substr ((string)$year, 2, 4);
            $years[$short] = $year;
        }

        return $years;
    }

    /**
     * Generate a suitable array for payment, containing
     * each month keyed by it's number.
     *
     * @return Array<string, string>
     */
    function generateMonths ()
    {
        return array (
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        );
    }

    function getLeadingZeroRandomNumber ($min, $max)
    {
        $num = mt_rand ($min, $max);
        $num_padded = sprintf ("%02d", $num);
        return $num_padded;
    }

    function makeSugarApiCall($endpoint, $data, $token = null)
    {
        // setup curl object
        $url = SUGAR_BASE_URL.$endpoint;
        $curl = curl_init($url);

        // initialize curl headers array
        $curlHeaders = array(
            "Content-Type: application/json"
        );

        // if we have a token, add to headers (essentially all endpoints except oauth2/token should include token)
        if (!is_null($token)) {
            array_push($curlHeaders, "oauth-token: {$token}");
        }

        // configure curl options
        curl_setopt_array ($curl, array(
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_0,
            CURLOPT_HEADER         => false,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 0,
            CURLOPT_POST           => 1,
            CURLOPT_POSTFIELDS     => json_encode($data),
            CURLOPT_HTTPHEADER     => $curlHeaders
        ));

        try {
            $resp = json_decode(curl_exec($curl));
        }
        catch (Exception $e) {
            mail('danny@ninjacode.co', 'Triton Website API Error', 'triggered in makeSugarApiCall: '.curl_error($curl));
        }
        curl_close ($curl);

        // quick check to ensure call was successful
        if ($resp->error == 'invalid_grant' && !isset($repeatCall)) {
            $repeatCall = true; // only allow a single retry
            $token = getSugarAPIAuthToken(true);
            return makeSugarApiCall($endpoint, $data, $token);
        }

        // force cast as an array since app is expecting that from previous work
        return $resp;
    }

    function getSugarAPIAuthToken($forceRefreshToken = false)
    {
        $tokenData = checkForSugarToken();

        // if the saved token is valid, return it
        if ( ($tokenData->expiry > time()) &&  !empty($tokenData->value) && !$forceRefreshToken) {
            return $tokenData->value;
        }

        // setup data object
        $data = array(
            "grant_type" => "password",
            "client_id" => SUGAR_API_CLIENT,
            "client_secret" => SUGAR_API_SECRET,
            "username" => SUGAR_API_USER,
            "password" => SUGAR_API_PASS,
            "platform" => "triton_website"
        );

        // retrieve a fresh token
        $oauthData = makeSugarApiCall('oauth2/token', $data);

        $token = $oauthData->access_token;
        $expires = time() + ($oauthData->expires_in - 60); // set expires to be 1 min less than actual expire time

        // save to session for re-use
        $db = Database::getInstance();
        $sql = "UPDATE sessions SET expiry = '$expires', value = '$token' WHERE sesskey = 'sugar-oauth-token'";
        $db->query($sql);

        return $token;
    }

    function checkForSugarToken()
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM sessions WHERE sesskey = 'sugar-oauth-token'";
        $res = $db->query($sql)->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    use GeoIp2\WebService\Client;

    function getLocalizedData ($ip_address)
    {

        $client = new Client(117469, 'gmLNbkjZrohT');

        $geoipRaw = $client->city ($ip_address);

        $geoip['state'] = $geoipRaw->mostSpecificSubdivision->name;

        $geoip['city'] = $geoipRaw->city->name;

        $localizedData = LocalizedLandingPageModel::findByCity ($geoip['city']);

        if ( !$localizedData ) {

            $localizedData = LocalizedLandingPageModel::findByState ($geoip['state']);

            if ( !$localizedData ) {

                $localizedData = LocalizedLandingPageModel::findByState ('DEFAULT');
            }
        }

        return $localizedData;
    }

    function parseReplacement ($shortCodes = array (), $replacements = array (), $string)
    {
        return str_replace ($shortCodes, $replacements, $string);
    }

    function userIsActive() {
        $_SESSION['timestamp'] = time();
    }
    function killActiveUser() {
        $_SESSION['logged_in'] = false;
        unset($_SESSION['user_info']);
    }

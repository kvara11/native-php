<?php

class SugarCRM {
    private $url = '';
    private $session_id = '';
    private $username = '';
    private $password = '';
    public function __construct() {
        $this->url = 'http://sugar.semperfunding.com/service/v4_1/rest.php';
        $this->username = "pcarlton";
        $this->password = "Vw?42fW2pD15%/d";
    }

    public function massageEntry($entry)
    {
        $data = array();
        foreach ($entry->name_value_list as $key => $value) {
            if ($value->value != '') {
                $data[$key] = $value->value;
            }
        }
        return $data;
    }

    /**
     * @throws \Exception
     * @return $this
     */
    public function login()
    {
        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $this->username,
                "password" => md5($this->password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->_apiCall("login", $login_parameters);
        if (!is_object($login_result) || !isSet($login_result->id)) {
            throw new \Exception('Error logging in: '.'<pre>'.print_r($login_result, true).'</pre>');
        }
        $this->session_id = $login_result->id;
        return $this;
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    private function _apiCall($method, $parameters)
    {
        ob_start();
        $curl_request = curl_init();

        curl_setopt($curl_request, CURLOPT_URL, $this->url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

        $jsonEncodedData = json_encode($parameters);

        $post = array(
            "method" => $method,
            "input_type" => "JSON",
            "response_type" => "JSON",
            "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();

        return $response;

    }


    public function grab($id)
    {

        $get_entity_parameters = array(
            'session' => $this->session_id,
            'module_name' => 'Accounts',
            'ids' => array($id),
            'select_fields' => array(),
            'unified_search_only' => false,
            'favorites' => false,
            'filter' => array(),
        );
        $return_object = $this->_apiCall('get_entries', $get_entity_parameters);
        if (!is_object($return_object) || empty($return_object->entry_list)) {
            // should never get here if search conducted first
            throw new \Exception('Entry does not exist.');
        }
        return $return_object->entry_list[0];
    }



    /**
     * @param $name
     * @param $account_id
     * @return bool
     * @throws \Exception
     */
    public function search($search, $account_id = 0, $show_list = false)
    {

        $search_by_module_parameters = array(
            //Session id
            "session" => $this->session_id,

            //The string to search for.
            'search_string' => $search,

            //The list of modules to query.
            'modules' => array(
                'Accounts',
            ),

            //The record offset from which to start.
            'offset' => 0,

            //The maximum number of records to return.
            'max_results' => 50,

            //Filters records by the assigned user ID.
            //Leave this empty if no filter should be applied.
            'id' => '',

            //An array of fields to return.
            //If empty the default return fields will be from the active listviewdefs.
            'select_fields' => array(
                // 'id',
                'name',
                'acct_c',
                'account_num_idx_c'
            ),

            //If the search is to only search modules participating in the unified search.
            //Unified search is the SugarCRM Global Search alternative to Full-Text Search.
            'unified_search_only' => false,

            //If only records marked as favorites should be returned.
            'favorites' => false,
            'filter' => array()
        );

        $return_object = $this->_apiCall('search_by_module', $search_by_module_parameters);
        if (!is_object($return_object) || empty($return_object->entry_list)) {
            throw new \Exception('Search did not yield results: <pre>'.print_r($return_object,true).'</pre>');
        }

        foreach ($return_object->entry_list[0]->records as $record) {
            var_dump($record);
            if ($account_id == $record->acct_c->value) {
                return $record->id->value;
            }
        }
        return false;
    }


    public function setEntry($module = 'Accounts', $update_fields)
    {
        $update_attributes = array(
            'session_id' => $this->session_id,
            'module_name' => $module,
            'name_value_list' => $update_fields,
        );

        $set_entry_result = $this->_apiCall('set_entry', $update_attributes);
        if (!is_object($set_entry_result) || !isSet($set_entry_result->id)) {
            throw new \Exception(
                'There was an error setting the record: <pre>Object:'."\n".print_r($set_entry_result, true).
                "\n\nFields:\n".print_r($update_fields,true).'</pre>'
            );
        }
        return true;
    }
}


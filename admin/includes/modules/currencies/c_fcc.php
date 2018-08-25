<?php
/*
  Copyright (c) 2018, A Valera @JAValeryon
  
  Based on c_fixer.php by @GBurton
  
  Copyright (c) 2018, G Burton
  
  All rights reserved. 

  Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

  1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

  2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

  3. Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

  class c_fcc {
    var $code = 'c_fcc';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->title = MODULE_ADMIN_CURRENCIES_FCC_TITLE;
      $this->description = MODULE_ADMIN_CURRENCIES_FCC_DESCRIPTION;

      if ( defined('MODULE_ADMIN_CURRENCIES_FCC_STATUS') ) {
        $this->sort_order = MODULE_ADMIN_CURRENCIES_FCC_SORT_ORDER;
        $this->enabled = (MODULE_ADMIN_CURRENCIES_FCC_STATUS == 'True');
      }
    }

    static function execute() {
      global $messageStack;
      
      $from = DEFAULT_CURRENCY;
      $cf_date = date('Y-m-d');
      
      $currency_query = tep_db_query("select currencies_id, code, title from currencies where code != '" . DEFAULT_CURRENCY . "'");
      while ($currency = tep_db_fetch_array($currency_query)) {
        $to = $currency['code'];
        
        $cf_data = array('q' => $from.'_'.$to,
                       'compact' => 'ultra');        
        
        $cf_data_query = http_build_query($cf_data);
        
        $ch = curl_init('https://free.currencyconverterapi.com/api/v5/convert?' . $cf_data_query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch); 
        curl_close($ch);        
        
        $cf_currencies = json_decode($data, true);
        
        if (isset($cf_currencies[$from.'_'.$to])) {
          tep_db_query("update currencies set value = '" . $cf_currencies[$from.'_'.$to] . "', last_updated = now() where code = '" . $to . "'");
          $messageStack->add_session(sprintf(MODULE_ADMIN_CURRENCIES_FCC_CURRENCIES_UPDATED, $to), 'success');  
        }
       else {
        $error = constant('FCC_ERROR_' . $cf_currencies['error']['code']);
        
        $messageStack->add_session($error, 'error');
       }           
        
      }
  
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_ADMIN_CURRENCIES_FCC_STATUS');
    }

    function install() {
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Fixer Module', 'MODULE_ADMIN_CURRENCIES_FCC_STATUS', 'True', 'Do you want to install this Currency Conversion Module?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_ADMIN_CURRENCIES_FCC_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from configuration where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_ADMIN_CURRENCIES_FCC_STATUS', 'MODULE_ADMIN_CURRENCIES_FCC_SORT_ORDER');
    }
  }
  


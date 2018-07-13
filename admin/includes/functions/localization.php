<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  function quote_xe_currency($to, $from = DEFAULT_CURRENCY) {
    $page = file('https://www.xe.com/currencyconverter/convert/?Amount=1&From=' . $from . '&To=' . $to);

    $match = array();

    preg_match('/[0-9.]+\s*' . $from . '\s*=\s*([0-9.]+)\s*' . $to . '/', implode('', $page), $match);

    if (sizeof($match) > 0) {
      return $match[1];
    } else {
      return false;
    }
  }

  function quote_fixer_currency($to, $from = DEFAULT_CURRENCY) {
    if ($to == $from) return 1;
    
    $ch = curl_init('http://data.fixer.io/api/latest?access_key=' . FIXER_ACCESS_KEY . '&base=' . $from . '&symbols=' . $to);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch); 
    curl_close($ch); 

    $currencies = json_decode($data, true);
    
    if (isset($currencies['rates'][$to])) {
      return $currencies['rates'][$to];
    } else {
      return false;
    }
  }
  
  function quote_fcc_currency($to, $from = DEFAULT_CURRENCY) {
    if ($to == $from) return 1;
    
    $ch = curl_init('https://free.currencyconverterapi.com/api/v5/convert?q='.$from.'_'.$to.'&compact=ultra');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch); 
    curl_close($ch); 

    $currencies = json_decode($data, true);
    
    if (isset($currencies[$from.'_'.$to])) {
      return $currencies[$from.'_'.$to];
    } else {
      return false;
    }
  }  
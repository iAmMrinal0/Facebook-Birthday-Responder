<?php
 
    // Facebook Batch Requests PHP Class
    // by Gokhan Ozturk <gokhanozturk at gmail dot com> @ Nov 17, 2011
    // Original Article: http://blog.pclabs.com.tr/gokhanozturk/2011/11/17/facebook-batch-requests-php-class/
 
    class facebook_batch {
       protected $requests = array();
       protected $responses = null;
       protected $cur = 1;
       protected $map = array();
 
       const MAX_NUMBER_OF_REQUESTS = 50;
 
       public function add($path, $method = 'GET', $params = array(), $extra = array()) {
          if(count($this->requests) > self::MAX_NUMBER_OF_REQUESTS) return false;
 
          $path = trim($path, '/ ');
 
          $body = http_build_query($params);
          $body = urldecode($body);
 
          if(strtolower($method) == 'get') {
             if(count($params) > 0) {
                $path .= "?" . $body;
                $body = "";
             }
          }
 
          $key = $this->cur++;
          $this->requests[$key] = array_merge(array('relative_url' => $path, 'method' => $method, 'body' => $body), $extra);
 
          return intval($key);
       }
 
       public function remove($key) {
          unset($this->requests[$key]);
       }
 
       public function execute() {
          global $facebook;
 
          $i = 0;
          foreach($this->requests as $k => $r) {
             $this->map[$k] = $i++;
          }
 
          $batch = json_encode(array_values($this->requests));
          $params = array('batch' => $batch);
 
          $this->responses = $facebook->api('/', 'POST', $params);
       }
 
       public function response($key) {
          if(! $this->responses) $this->execute();
 
          $rkey = $this->map[intval($key)];
          $resp = $this->responses[intval($rkey)];
 
          if($resp['code'] != 200) return false;
          return json_decode($resp['body'], true);
       }
 
       public function getRequests() {
          return $this->requests;
       }
    }
 
    ?>
<?php 
  class bootstrap {
    public function Blang($attr)
    {
        $lan_se = (defined(SYS_LANG)) ? SYS_LANG : "en";
        $contents = file_get_contents(DIR . SB . "lang" . SB . $lan_se . ".json");
        $results = json_decode($contents);

        if (!empty($results->$attr)) {
            return ucfirst($results->$attr);
        } else {
            return  ucfirst($attr);
        }
    }
    
  }
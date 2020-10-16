<?php
               
    class FUNCTIONS {
      
        /**
         * Check if the URL is active
         * 
         * @param string $text the string to be converted 
         * 
         * @return string the string with only alphanumerical characters       
         */         
        public static function convertToAlphaNumeric($text) {
            $replace = [
                '&lt;' => '', '&gt;' => '', '&#039;' => '', '&#39;' => '', '&amp;' => '',
                '&quot;' => '', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'Ae',
                '&Auml;' => 'A', 'Å' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Æ' => 'Ae',
                'Ç' => 'C', 'Ć' => 'C', 'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D',
                'Ð' => 'D', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E',
                'Ę' => 'E', 'Ě' => 'E', 'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G',
                'Ġ' => 'G', 'Ģ' => 'G', 'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I',
                'Î' => 'I', 'Ï' => 'I', 'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I',
                'İ' => 'I', 'Ĳ' => 'IJ', 'Ĵ' => 'J', 'Ķ' => 'K', 'Ł' => 'K', 'Ľ' => 'K',
                'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N',
                'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O',
                'Ö' => 'Oe', '&Ouml;' => 'Oe', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O', 'Ŏ' => 'O',
                'Œ' => 'OE', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Š' => 'S',
                'Ş' => 'S', 'Ŝ' => 'S', 'Ș' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T',
                'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'Ue', 'Ū' => 'U',
                '&Uuml;' => 'Ue', 'Ů' => 'U', 'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U',
                'Ŵ' => 'W', 'Ý' => 'Y', 'Ŷ' => 'Y', 'Ÿ' => 'Y', 'Ź' => 'Z', 'Ž' => 'Z',
                'Ż' => 'Z', 'Þ' => 'T', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
                'ä' => 'ae', '&auml;' => 'ae', 'å' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a',
                'æ' => 'ae', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
                'ď' => 'd', 'đ' => 'd', 'ð' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e',
                'ë' => 'e', 'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e',
                'ƒ' => 'f', 'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h',
                'ħ' => 'h', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i',
                'ĩ' => 'i', 'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĳ' => 'ij', 'ĵ' => 'j',
                'ķ' => 'k', 'ĸ' => 'k', 'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l',
                'ŀ' => 'l', 'ñ' => 'n', 'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n',
                'ŋ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'oe',
                '&ouml;' => 'oe', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o', 'ŏ' => 'o', 'œ' => 'oe',
                'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'š' => 's', 'ù' => 'u', 'ú' => 'u',
                'û' => 'u', 'ü' => 'ue', 'ū' => 'u', '&uuml;' => 'ue', 'ů' => 'u', 'ű' => 'u',
                'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ý' => 'y', 'ÿ' => 'y',
                'ŷ' => 'y', 'ž' => 'z', 'ż' => 'z', 'ź' => 'z', 'þ' => 't', 'ß' => 'ss',
                'ſ' => 'ss', 'ый' => 'iy', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G',
                'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I',
                'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
                'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F',
                'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '',
                'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a',
                'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
                'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
                'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's',
                'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
                'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e',
                'ю' => 'yu', 'я' => 'ya'
            ];

            $data = str_replace(array_keys($replace), $replace, $text);
            
            // only using alphanumeric characters
            $array = explode(" ", $data);
    
            $items = [];

            foreach ($array as $item) {
                $items[] = preg_replace("/[^a-zA-Z0-9]+/", "", $item);
            }       

            $items = array_values($items);
            $items = array_filter($items);
            
            return implode(" ", $items);                 
        }

        /**
         * Get the value from the query string
         * 
         * @param string $id the name/id of the querystring
         * @param string $default the default value 
         * 
         * @return string the value the variable will get       
         */            
        public static function getQueryString($id, $default = "") {
            // set default value
            $value = $default;

            // if it has some value
            if (isset($_GET[$id])) {
                // get value without other spaces
                $temp = trim($_GET[$id]);

                if (!empty($temp)) {
                    return $temp;
                }

                // check for the integer value
                if ($temp === 0) {
                    return 0;
                }

                // if empty, return the default value
                if (empty($temp)) {
                    return $default;
                }

                // set the value from the query
                $value = $temp;
            }            

            return $value;
        }

        /**
         * Get the value from the query string
         * 
         * @param string $id the name/id of the querystring
         * @param string $default the default value 
         * 
         * @return string the value the variable will get       
         */            
        public static function getPost($id, $default = "") {
            // set default value
            $value = $default;

            // if it has some value
            if (isset($_POST[$id])) {
                // get value without other spaces
                $temp = trim($_POST[$id]);

                // check for the integer value
                if ($temp == 0) {
                    return 0;
                }

                // if empty, return the default value
                if (empty($temp)) {
                    return $default;
                }

                // set the value from the query
                $value = $temp;
            }            

            return $value;
        }

        /**
         * Check if the URL is active
         * 
         * @param string $url the url of the website 
         * 
         * @return bool true if valid       
         */         
        public static function isActiveURL($url) {
            // https://www.geeksforgeeks.org/how-to-check-the-existence-of-url-in-php/

            // Use get_headers() function 
            $headers = @get_headers($url); 
            
            // Use condition to check the existence of URL 
            if($headers && strpos($headers[0], '200')) { 
                return true;
            } 

            return false;
        }

        /**
         * Check if the URL is active
         * 
         * @param string $text the result of a function 
         */         
        public static function logErrorFromFunction($text) {
            if ($text !== TRUE && !empty($text)) {
                error_log($text);
            }
        }

        /**
         * Minimize the content for displaying the content
         * 
         * @param string $text the text
         * 
         * @return bool the minimized text     
         */         
        public static function minimize($text) {
            $text = str_replace("\n", "", $text);
            $text = str_replace("\r", "", $text);
            $text = str_replace("  ", "", $text);
            $text = str_replace(" {", "{", $text);
            $text = str_replace(": ", ":", $text);
            $text = str_replace(", ", ",", $text);

            return $text;
        }
    }

?>
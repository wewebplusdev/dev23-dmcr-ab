<?php
/**
 * Description of url
 *
 * @author Pandalittle CH
 */
class url {

    public $url;
    public $parametter;
    public $segment;
    public $uri;
    public $pagelang;
    public $listfilemodulus = array("config.php", "modulus.php", "index.php");
    public $listcheckurl = array();
    public $optionurl;
	public $pathSkip = array("itcenter");


    public function __construct() {
        global $url_show_lang, $lang_set, $lang_default, $url_show_default, $path_root;
		$documentroot = str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']);
        $this->url = str_replace(_DIR . '/', '', str_replace('//', '/', $documentroot . $_SERVER['REQUEST_URI']));

        $urlall = explode("?", $this->url);
        $segment = cleanArray(explode('/', $urlall[0]));
        $this->segment = $segment;

    
        if (!empty($url_show_lang)) {
            if (isset($lang_set[$this->segment[0]])) {
                $this->pagelang = $lang_set[$this->segment[0]];
                array_splice($this->segment, 0, 1);
            } else {
                $this->pagelang = $lang_set[$lang_default];
                header("Location:".$path_root."/".$this->pagelang[2]);
                exit();
            }
        } else {
            if (!empty($_SESSION['pagelang'])) {
                $this->pagelang = $lang_set[$_SESSION['pagelang']];
            } else {
                $this->pagelang = $lang_set[$lang_default];
            }
        }

        foreach ($this->listcheckurl as $valueCheckurl) {
            if (strpos($this->segment[0], $valueCheckurl) !== false) {
                $listnewsegment = explode($valueCheckurl, $this->segment[0]);
                $this->segment[0] = str_replace("-", "", $valueCheckurl);
                foreach ($listnewsegment as $keyUrl => $valueUrl) {
                    if (!empty($valueUrl)) {
                        $this->optionurl[] = trim(str_replace("-", " ", urldecode($valueUrl)));
                    }
                }
            }
        }


        if (!empty($urlall[1])) {
            $this->parametter = $urlall[1];
            $uri_frist = cleanArray(explode('&', $urlall[1]));
            foreach ($uri_frist as $xuri) {
                $thum = explode('=', $xuri, 2);
                if (count($thum) == 2 and trim($thum[0]) != "") {
                    $uri[trim($thum[0])] = trim($thum[1]);
                }
            }
            $this->uri = $uri;
        }
    }

    function page() {
        $folderpage = _DIR . '/front/controller/script/' . $this->segment[0] . "/";
	
        if (file_exists($folderpage)) {
            $statuspage = $this->checkpagefile($folderpage);
            if (!empty($statuspage)) {
                $loderpage['pagename'] = $this->segment[0];
                $loderpage['load'][] = $folderpage . "lang/" . $this->pagelang[2] . ".php";
                foreach ($this->listfilemodulus as $value) {
                    $loderpage['load'][] = $folderpage . $value;
                }
                return $loderpage;
            } else {
                return $this->setpagedefault();
            }
        } else {
            return $this->setpagedefault();
        }
    }

    function setpagedefault() {
        global $url_show_default;
		
		 if (!empty($this->segment[0])) {
			$path = _DIR . '/front/controller/script/404' ;
			$loderpage['pagename'] = "404";
			$loderpage['load'][] = $path . "/lang/" . $this->pagelang[2] . ".php";
			foreach ($this->listfilemodulus as $value) {
				$loderpage['load'][] = $path . "/" . $value;
			}
			
		}else{
			$path = _DIR . '/front/controller/script/' . $url_show_default;
			$loderpage['pagename'] = $url_show_default;
			$loderpage['load'][] = $path . "/lang/" . $this->pagelang[2] . ".php";
			foreach ($this->listfilemodulus as $value) {
				$loderpage['load'][] = $path . "/" . $value;
			}
		}
		
        return $loderpage;
    }

    function checkpagefile($page) {
        foreach ($this->listfilemodulus as $value) {
            $thischeckfile = file_exists($page . $value);
            if (empty($thischeckfile)) {
                return FALSE;
            }
        }
        return true;
    }

    function loadmodulus($array) {
        $listfile = array("config.php", "modulus.php");
        $loderpage = array();
        foreach ($array as $value) {
            $path = _DIR . '/front/controller/script/' . $value . "/";
            foreach ($listfile as $isfile) {
                $loderpage[] = $path . $isfile;
            }
        }
        return $loderpage;
    }

}

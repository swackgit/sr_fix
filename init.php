<?php class sr_fix extends Plugin {
        private $host;
        function about() {
                return array(1.0,
                        "removes nonfunctional list of links in middle of page",
                        "swack");
        }
        function init($host) {
                $this->host = $host;
                $host->add_hook($host::HOOK_ARTICLE_FILTER, $this);
        }
        function hook_article_filter($article) {

                if(strpos($article["link"], "skidrowreloaded.com") !== FALSE)
                {
                        $subject = $article["content"];
                        $pattern = '/(<strong>(ONE.)?FTP.LINK<\/strong>.*?)(<h4>SYSTEM.REQUIREMENTS)/s';
                        $replace = "\2";
                        $article["content"] = preg_replace($pattern,$replace,$subject);
                }
                return $article;
        }
        function api_version() {
                return 2;
        }
}


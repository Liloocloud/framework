<?php

/**
 * Sitemap.class [ HELPER ]
 * Classe responável por gerar Sitemaps e RSS feeds para o site e o sistema!
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Sitemap {

    //SITEMAP
    private $Sitemap;
    private $SitemapXml;
    private $SitemapGz;
    private $SitemapPing;
    //RSS
    private $RSS;
    private $RSSXml;

    public function exeSitemap($Ping = true) {
        $this->SitemapUpdate();
        if ($Ping != false):
            $this->SitemapPing();
        endif;
    }

    public function exeRSS() {
        $this->RSSUpdate();
    }

    private function SitemapUpdate() {
        $Read = new Read;

        $this->Sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\r\n";
        $this->Sitemap .= '<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>' . "\r\n";
        $this->Sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\r\n";

        //HOME
        $this->Sitemap .= '<url>' . "\r\n";
        $this->Sitemap .= '<loc>' . BASE . '</loc>' . "\r\n";
        $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP') . '</lastmod>' . "\r\n";
        $this->Sitemap .= '<changefreq>daily</changefreq>' . "\r\n";
        $this->Sitemap .= '<priority>1.0</priority >' . "\r\n";
        $this->Sitemap .= '</url>' . "\r\n";

        if (APP_PAGES):
            //PAGES        
            $Read->FullRead("SELECT page_name, page_date FROM " . DB_PAGES . " WHERE page_status = 1 ORDER BY page_title ASC");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $ReadPages):
                    $this->Sitemap .= '<url>' . "\r\n";
                    $this->Sitemap .= '<loc>' . BASE . '/' . $ReadPages['page_name'] . '</loc>' . "\r\n";
                    $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($ReadPages['page_date'])) . '</lastmod>' . "\r\n";
                    $this->Sitemap .= '<changefreq>monthly</changefreq>' . "\r\n";
                    $this->Sitemap .= '<priority>0.5</priority >' . "\r\n";
                    $this->Sitemap .= '</url>' . "\r\n";
                endforeach;
            endif;
        endif;

        if (APP_POSTS):
            //CATEGORIES        
            $Read->FullRead("SELECT category_date, category_name FROM " . DB_CATEGORIES . " ORDER BY category_title ASC");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $ReadPages):
                    $this->Sitemap .= '<url>' . "\r\n";
                    $this->Sitemap .= '<loc>' . BASE . '/artigos/' . $ReadPages['category_name'] . '</loc>' . "\r\n";
                    $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($ReadPages['category_date'])) . '</lastmod>' . "\r\n";
                    $this->Sitemap .= '<changefreq>monthly</changefreq>' . "\r\n";
                    $this->Sitemap .= '<priority>0.7</priority >' . "\r\n";
                    $this->Sitemap .= '</url>' . "\r\n";
                endforeach;
            endif;

            //POSTS        
            $Read->FullRead("SELECT post_name, post_date FROM " . DB_POSTS . " WHERE post_status = 1 AND post_date <= NOW() ORDER BY post_date DESC");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $ReadPages):
                    $this->Sitemap .= '<url>' . "\r\n";
                    $this->Sitemap .= '<loc>' . BASE . '/artigo/' . $ReadPages['post_name'] . '</loc>' . "\r\n";
                    $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($ReadPages['post_date'])) . '</lastmod>' . "\r\n";
                    $this->Sitemap .= '<changefreq>weekly</changefreq>' . "\r\n";
                    $this->Sitemap .= '<priority>0.9</priority >' . "\r\n";
                    $this->Sitemap .= '</url>' . "\r\n";
                endforeach;
            endif;
        endif;

        if (APP_PRODUCTS):
            //PRODUCTS CATEGORIES        
            $Read->FullRead("SELECT cat_name, cat_created FROM " . DB_PDT_CATS . " ORDER BY cat_title ASC");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $ReadPages):
                    $this->Sitemap .= '<url>' . "\r\n";
                    $this->Sitemap .= '<loc>' . BASE . '/produtos/' . $ReadPages['cat_name'] . '</loc>' . "\r\n";
                    $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($ReadPages['cat_created'])) . '</lastmod>' . "\r\n";
                    $this->Sitemap .= '<changefreq>weekly</changefreq>' . "\r\n";
                    $this->Sitemap .= '<priority>0.9</priority >' . "\r\n";
                    $this->Sitemap .= '</url>' . "\r\n";
                endforeach;
            endif;

            //PRODUTCTS        
            $Read->FullRead("SELECT pdt_name, pdt_created FROM " . DB_PDT . " ORDER BY pdt_created DESC");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $ReadPages):
                    $this->Sitemap .= '<url>' . "\r\n";
                    $this->Sitemap .= '<loc>' . BASE . '/produto/' . $ReadPages['pdt_name'] . '</loc>' . "\r\n";
                    $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($ReadPages['pdt_created'])) . '</lastmod>' . "\r\n";
                    $this->Sitemap .= '<changefreq>weekly</changefreq>' . "\r\n";
                    $this->Sitemap .= '<priority>0.9</priority >' . "\r\n";
                    $this->Sitemap .= '</url>' . "\r\n";
                endforeach;
            endif;

            //PRODUCTS BRANDS        
            $Read->FullRead("SELECT brand_name, brand_created FROM " . DB_PDT_BRANDS . " ORDER BY brand_title ASC");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $ReadPages):
                    $this->Sitemap .= '<url>' . "\r\n";
                    $this->Sitemap .= '<loc>' . BASE . '/marca/' . $ReadPages['brand_name'] . '</loc>' . "\r\n";
                    $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($ReadPages['brand_created'])) . '</lastmod>' . "\r\n";
                    $this->Sitemap .= '<changefreq>weekly</changefreq>' . "\r\n";
                    $this->Sitemap .= '<priority>0.9</priority >' . "\r\n";
                    $this->Sitemap .= '</url>' . "\r\n";
                endforeach;
            endif;
        endif;

        //CLOSE
        $this->Sitemap .= '</urlset>';

        //CRIA O XML
        $this->SitemapXml = fopen("../sitemap.xml", "w+");
        fwrite($this->SitemapXml, $this->Sitemap);
        fclose($this->SitemapXml);

        //CRIA O GZ
        $this->SitemapGz = gzopen("../sitemap.xml.gz", 'w9');
        gzwrite($this->SitemapGz, $this->Sitemap);
        gzclose($this->SitemapGz);
    }

    private function SitemapPing() {
        $this->SitemapPing = array();
        $this->SitemapPing['g'] = 'https://www.google.com/webmasters/tools/ping?sitemap=' . urlencode(BASE . '/sitemap.xml');
        $this->SitemapPing['b'] = 'https://www.bing.com/webmaster/ping.aspx?siteMap=' . urlencode(BASE . '/sitemap.xml');

        foreach ($this->SitemapPing as $url):
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_exec($ch);
            curl_close($ch);
        endforeach;
    }

    private function RSSUpdate() {
        $Read = new Read;

        $this->RSS = '<?xml version="1.0" encoding="UTF-8" ?>' . "\r\n";
        $this->RSS .= '<rss version="2.0">' . "\r\n";
        $this->RSS .= '<channel>' . "\r\n";

        $this->RSS .= '<title>' . SITE_NAME . ' - ' . SITE_SUBNAME . '</title>' . "\r\n";
        $this->RSS .= '<link>' . BASE . '</link>' . "\r\n";
        $this->RSS .= '<description>' . SITE_DESC . '</description>' . "\r\n";
        $this->RSS .= '<language>pt-br</language>' . "\r\n";

        //POSTS 
        if (APP_POSTS):
            $Read->FullRead("SELECT post_title, post_subtitle, post_name, post_date FROM " . DB_POSTS . " WHERE post_status = 1 AND post_date <= NOW() ORDER BY post_date DESC");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $ReadPosts):
                    //FEED
                    $this->RSS .= '<item>' . "\r\n";
                    $this->RSS .= '<title>' . $ReadPosts['post_title'] . '</title>' . "\r\n";
                    $this->RSS .= '<link>' . BASE . '/artigo/' . $ReadPosts['post_name'] . '</link>' . "\r\n";
                    $this->RSS .= '<pubDate>' . date('D, d M Y H:i:s O', strtotime($ReadPosts['post_date'])) . '</pubDate>' . "\r\n";
                    $this->RSS .= '<description>' . str_replace('&', 'e', $ReadPosts['post_subtitle']) . '</description>' . "\r\n";
                    $this->RSS .= '</item>' . "\r\n";
                endforeach;
            endif;
        endif;

        //PRODUCTS 
        if (APP_PRODUCTS):
            $Read->FullRead("SELECT pdt_title, pdt_content, pdt_name, pdt_created FROM " . DB_PDT . " WHERE pdt_status = 1 AND pdt_inventory >= 1 ORDER BY pdt_created DESC");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $ReadPosts):
                    //FEED
                    $this->RSS .= '<item>' . "\r\n";
                    $this->RSS .= '<title>' . $ReadPosts['pdt_title'] . '</title>' . "\r\n";
                    $this->RSS .= '<link>' . BASE . '/produto/' . $ReadPosts['pdt_name'] . '</link>' . "\r\n";
                    $this->RSS .= '<pubDate>' . date('D, d M Y H:i:s O', strtotime($ReadPosts['pdt_created'])) . '</pubDate>' . "\r\n";
                    $this->RSS .= '<description>INFO: ' . Check::Words(html_entity_decode($ReadPosts['pdt_content']), 100) . '</description>' . "\r\n";
                    $this->RSS .= '</item>' . "\r\n";
                endforeach;
            endif;
        endif;

        $this->RSS .= '</channel>' . "\r\n";
        $this->RSS .= '</rss>' . "\r\n";

        //CRIA O XML
        $this->RSSXml = fopen("../rss.xml", "w+");
        fwrite($this->RSSXml, $this->RSS);
        fclose($this->RSSXml);
    }

}

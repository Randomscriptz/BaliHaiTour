<?php
	class WpFastestCacheRenderBlocking{
		private $html = "";
		private $except = "";
		private $tags = array();
		private $header_start_index = 0;
		private $js_tags_text = "";

		public function __construct($html){
			$this->html = $html;
			$this->set_header_start_index();
			$this->set_tags();
			$this->tags = $this->tags_reorder($this->tags);
		}

		public function set_header_start_index(){
			$head_tag = $this->find_tags("<head", ">");
			$this->header_start_index = isset($head_tag[0]) && isset($head_tag[0]["start"]) && $head_tag[0]["start"] ? $head_tag[0]["start"] : 0;
		}
		public function tags_reorder($tags){
			// <script>jQuery('head').append('<style>' + arr_splits[i] + '</style>');</script>
			// <script>document.getElementById("id").innerHTML='<div> <span> <!--[if !IE]>--> xxx <!--<![endif]--> </span></div>';</script>
			$list = array();

			for ($i=0; $i < count($tags); $i++) {
				for ($j=0; $j < count($tags); $j++) { 
					if($tags[$i]["start"] > $tags[$j]["start"]){
						if($tags[$i]["end"] < $tags[$j]["end"]){
							array_push($list, $i);
						}
					}
				}
			}

			foreach ($list as $key => $value) {
				unset($tags[$value]);
			}




		    $sorter = array();
		    $ret = array();

		    foreach ($tags as $ii => $va) {
		        $sorter[$ii] = $va['start'];
		    }

		    asort($sorter);

		    foreach ($sorter as $ii => $va) {
		        $ret[$ii] = $tags[$ii];
		    }

		    $tags = $ret;

		    return $tags;
		}

		public function set_except($tags){
			foreach ($tags as $key => $value) {
				$this->except = $value["text"].$this->except;
			}
		}

		public function set_tags(){
			$this->set_comments();
			$this->set_js();
			$this->set_css();
		}

		public function set_css(){
			$style_tags = $this->find_tags("<style", "</style>");

			foreach ($style_tags as $key => $value) {
				// <script>var xxx ={"id":"4", "html":"<style>\n\t\t\t.container{color:#CCCCCC;}\n\t\t<\/style>"};</script>
				if(!preg_match("/<\/script>/i", $value["text"])){
					array_push($this->tags, $value);
				}
			}

			
			
			$link_tags = $this->find_tags("<link", ">");

			foreach ($link_tags as $key => $value) {
				if(preg_match("/href\s*\=/i", $value["text"])){
					if(preg_match("/rel\s*\=\s*[\'\"]\s*stylesheet\s*[\'\"]/i", $value["text"])){
						array_push($this->tags, $value);
					}
				}
			}
		}

		public function set_js(){
			$script_tag = $this->find_tags("<script", "</script>");

			foreach ($script_tag as $key => $value) {
				if(preg_match("/google_ad_client/", $value["text"])){
					continue;
				}

				if(preg_match("/googlesyndication\.com/", $value["text"])){
					continue;
				}

				// if(preg_match("/srv\.sayyac\.net/", $value["text"])){
				// 	continue;
				// }

				if(preg_match("/app\.getresponse\.com/i", $value["text"])){
					continue;
				}

				if(preg_match("/adsbygoogle/i", $value["text"])){
					continue;
				}

				if(preg_match("/GoogleAnalyticsObject|\_gaq\.push\(\[\'\_setAccount/i", $value["text"])){
					continue;
				}

				if(preg_match("/smarticon\.geotrust\.com\/si\.js/i", $value["text"])){
					continue;
				}

				if(preg_match("/veedi\.com\/player\/embed\/veediEmbed\.js/i", $value["text"])){
					continue;
				}

				if(preg_match("/cdn\.ampproject\.org/i", $value["text"])){
					continue;
				}

				if(preg_match("/data-wpfc-render\=[\"\']false[\"\']/i", $value["text"])){
					continue;
				}

				if(preg_match("/adserver\.adtechjp\.com/i", $value["text"])){
					continue;
				}

				if(preg_match("/ib\.3lift\.com/i", $value["text"])){
					continue;
				}

				if(preg_match("/adtradradservices\.com/i", $value["text"])){
					continue;
				}

				if(preg_match("/static.clickpapa.com\/c\.js/i", $value["text"])){
					continue;
				}

				if(preg_match("/clickpapa_ad_client/i", $value["text"])){
					continue;
				}

				if(preg_match("/cts\.tradepub\.com/i", $value["text"])){
					continue;
				}

				if(preg_match("/_areklam_target|ad\.arklm\.com/i", $value["text"])){
					continue;
				}

				if(preg_match("/admatic\.com\.tr/i", $value["text"])){
					continue;
				}

				if(preg_match("/ca\.cubecdn\.net/i", $value["text"])){
					continue;
				}

				if(preg_match("/reklamstore/i", $value["text"])){
					if(preg_match("/reklamstore_region_id/i", $value["text"])){
						continue;
					}else if(preg_match("/reklamstore\.com\/reklamstore\.js/i", $value["text"])){
						continue;
					}
				}

				//<script>document.write ('<iframe id="g2324_1" src="http://site.com/index.php?display_gallery_iframe&amp;gal_id=2324_1&amp;gal_type=2&amp;gal_cap=OFF&amp;gal_page=false"></iframe>');</script>
				if(preg_match("/document\.write\s*\(/i", $value["text"])){
					if(preg_match("/<iframe/i", $value["text"])){
						continue;
					}
				}

				//Yandex.Metrika counter
				if(preg_match("/mc\.yandex\.ru\/metrika\/watch\.js/i", $value["text"])){
					if(preg_match("/yandex_metrika_callbacks/i", $value["text"])){
						continue;
					}
				}

				//<script type="text/javascript" src="https://seal.thawte.com/getthawteseal?host_name=www.site.co.za&amp;size=S&amp;lang=en"></script>
				if(preg_match("/seal\.thawte\.com/i", $value["text"])){
					continue;
				}
				

				$this->js_tags_text = $this->js_tags_text.$value["text"];

				array_push($this->tags, $value);
			}
		}

		public function set_comments(){
			$comment_tags = $this->find_tags("<!--", "-->");

			$this->set_except($comment_tags);

			foreach ($comment_tags as $key => $value) {
				if(preg_match("/\<\!--\s*\[if/i", $value["text"])){
					array_push($this->tags, $value);
				}
			}
		}

		public function find_tags($start_string, $end_string, $html = false){
			$data = $html ? $html : $this->html;

			$list = array();
			$start_index = false;
			$end_index = false;

			for($i = 0; $i < strlen( $data ); $i++) {
			    if(substr($data, $i, strlen($start_string)) == $start_string){
			    	if(!$start_index && !$end_index){
			    		$start_index = $i;
			    	}
				}

				if($start_index && $i > $start_index){
					if(substr($data, $i, strlen($end_string)) == $end_string){
						$end_index = $i + strlen($end_string)-1;
						$text = substr($data, $start_index, ($end_index-$start_index + 1));
						
						if($html === false){
							if($start_index > $this->header_start_index){
								if($this->except){
									if(strpos($this->except, $text) === false){
										array_push($list, array("start" => $start_index, "end" => $end_index, "text" => $text));
									}
								}else{
									array_push($list, array("start" => $start_index, "end" => $end_index, "text" => $text));
								}
							}
						}else{
							array_push($list, array("start" => $start_index, "end" => $end_index, "text" => $text));
						}

						$start_index = false;
						$end_index = false;
					}
				}
			}

			return $list;
		}

		public function action($render_blocking_css = false){
			$wpemojiSettings = "";
			$google_fonts = "";
			$bootstrapcdn = "";
			$inline_js = "";

			//to remove tags
			$this->tags = array_reverse($this->tags);
			foreach ($this->tags as $key => &$value) {
				if(preg_match("/\<\!--\s*\[if[^\>]+>/i", $value["text"])){
					if($arr = $this->split_html_condition($value["text"])){
						$style = "";
						$script = "";

						foreach ($arr as $arr_key => $arr_value) {
							if(preg_match("/\<\!--\s*\[if[^\>]+>(<link|<style)/i", $arr_value["text"])){
								$style = $style."\n".$arr_value["text"];
							}else if(preg_match("/\<\!--\s*\[if[^\>]+><script/i", $arr_value["text"])){
								$script = $script."\n".$arr_value["text"];
							}
						}
					}

					$value["text"] = $script;
					$this->html = substr_replace($this->html, $style, $value["start"], ($value["end"] - $value["start"] + 1));
				}else if(preg_match("/^<script/i", $value["text"])){
					$this->html = substr_replace($this->html, "", $value["start"], ($value["end"] - $value["start"] + 1));
				}else if(preg_match("/^<link[^\>]+(fonts|ajax)\.googleapis\.com[^\>]+>/", $value["text"])){
					$this->html = substr_replace($this->html, "", $value["start"], ($value["end"] - $value["start"] + 1));

					$google_fonts = $value["text"]."\n".$google_fonts;
				}else if(preg_match("/^<link[^\>]+(maxcdn)\.bootstrapcdn\.com[^\>]+>/", $value["text"])){
					$this->html = substr_replace($this->html, "", $value["start"], ($value["end"] - $value["start"] + 1));

					$bootstrapcdn = $value["text"]."\n".$bootstrapcdn;
				}
			}

			foreach ($this->tags as $key => &$value) {
				if($value["text"] && preg_match("/^<script/i", $value["text"])){
			    	if(preg_match("/^<script[^\>]*>\s*window\.\_wpemojiSettings/", $value["text"])){
						//to remove window._wpemojiSettings from tags
			    		unset($this->tags[$key]);
			    		$wpemojiSettings = $wpemojiSettings."\n".$value["text"];
			    	}else if(!preg_match("/^<script[^\>]+src=[\'\"][^\>]+>/", $value["text"])){
			    		//to remove inline js which starts with var and contains only var
			    		//<script>var _wpcf7={"loaderUrl":"sample"};</script>
			    		$tmp = $value["text"];
			    		$tmp = preg_replace("/\s*\/\*(.+)\*\/\s*/", "", $tmp);

			    		//var themifyScript causes "fixed header" issue on thepurplepumpkinblog.co.uk
			    		if(preg_match("/var\sthemifyScript/i", $tmp)){
			    			continue;
			    		}

			    		if(!strstr($tmp, "/*") && !strstr($tmp, "\n")){
			    			if(preg_match("/<script[^\>]*>\s*var/i", $tmp)){
			    				if(preg_match("/\s+(function|jQuery|if)\s*\([^\)\(]+\)/", $tmp)){
			    					continue;
			    				}

						    	unset($this->tags[$key]);
						    	$inline_js = $value["text"]."\n".$inline_js;
			    			}
			    		}
				    }
				}
		    }

		    //to add Google Fonts at the end of page before js sources
			if($google_fonts){
				$this->html = str_replace("</body>", $google_fonts."\n"."</body>", $this->html);
			}

			//to add BootstrapCDN at the end of page before js sources
			if($bootstrapcdn){
				$this->html = str_replace("</body>", $bootstrapcdn."\n"."</body>", $this->html);
			}

		    //to add Inline Js before at the end of page before js sources
			if($inline_js){
				$this->html = str_replace("</body>", $inline_js."\n"."</body>", $this->html);
			}

			//to add tags into footer
			$this->tags = array_reverse($this->tags);
			foreach ($this->tags as $key => $value) {
				if(preg_match("/^<script/i", $value["text"])){
					//<script type='text/javascript' src='http://s.gravatar.com/js/gprofiles.js?ver=2017Janaa'></script>
					if(preg_match("/gravatar\.com\/js\/gprofiles\.js/i", $value["text"])){
						$value["text"] = preg_replace("/<script\s+/", "<script async defer ", $value["text"]);
					}
					//<script type='text/javascript' src='http://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201701'></script>
					if(preg_match("/s0\.wp\.com\/wp-content\/js\/devicepx-jetpack\.js/i", $value["text"])){
						$value["text"] = preg_replace("/<script\s+/", "<script async defer ", $value["text"]);
					}

					$this->html = str_replace("</body>", $value["text"]."\n"."</body>", $this->html);
				}else if(preg_match("/\<\!--\s*\[if[^\>]+>/i", $value["text"])){
					$this->html = str_replace("</body>", $value["text"]."\n"."</body>", $this->html);
				}
			}

			//to add wpemojiSettings at the end of page
			if($wpemojiSettings){
				$this->html = str_replace("</body>", $wpemojiSettings."\n"."</body>", $this->html);
			}

			return preg_replace("/^\s+/m", "", $this->html);
		}

		public function add_images_in_css_to_the_footer(){
			if(isset($GLOBALS["wp_fastest_cache"]->images_in_css["path"]) && $GLOBALS["wp_fastest_cache"]->images_in_css["path"]){
				$img_tag = "";
				$cachFilePath = WPFC_WP_CONTENT_DIR."/cache/wpfc-minified/".md5($GLOBALS["wp_fastest_cache"]->images_in_css["path"]).".txt";
				
				if(isset($GLOBALS["wp_fastest_cache"]->images_in_css["images"])){
					foreach ($this->tags as $key => $value) {
						if(preg_match("/^<style/i", $value["text"])){
							$GLOBALS["wp_fastest_cache"]->set_images_in_css($value["text"]);
						}
					}
				}

				if(isset($GLOBALS["wp_fastest_cache"]->images_in_css["images"]) && isset($GLOBALS["wp_fastest_cache"]->images_in_css["images"][0])){
					foreach (array_unique($GLOBALS["wp_fastest_cache"]->images_in_css["images"]) as $key => $value) {
						$img_tag = $img_tag."\n".$this->get_html_image_style($value);
					}

					@file_put_contents($cachFilePath, $img_tag);

				}else if(file_exists($cachFilePath)){
					if(file_exists($cachFilePath)){
						$myfile = fopen($cachFilePath, "r") or die("Unable to open file!");
						$img_tag = fread($myfile, filesize($cachFilePath));
						fclose($myfile);
					}
				}

				$this->html = preg_replace("/<\/body>/i", $img_tag."\n"."</body>", $this->html);
			}else if(isset($GLOBALS["wp_fastest_cache"]->images_in_css["name"]) && $GLOBALS["wp_fastest_cache"]->images_in_css["name"]){
				// used to use $GLOBALS["wp_fastest_cache"]->images_in_css["path"]
				$img_tag = "";
				$cachFilePath = WPFC_WP_CONTENT_DIR."/cache/wpfc-minified/".md5($GLOBALS["wp_fastest_cache"]->images_in_css["name"]).".txt";
				
				if(file_exists($cachFilePath)){
					if(file_exists($cachFilePath)){
						$myfile = fopen($cachFilePath, "r") or die("Unable to open file!");
						$img_tag = fread($myfile, filesize($cachFilePath));
						fclose($myfile);
					}
				}else{
					if(isset($GLOBALS["wp_fastest_cache"]->images_in_css["images"])){
						foreach ($this->tags as $key => $value) {
							if(preg_match("/^<style/i", $value["text"])){
								$GLOBALS["wp_fastest_cache"]->set_images_in_css($value["text"]);
							}
						}
					}

					if(isset($GLOBALS["wp_fastest_cache"]->images_in_css["images"]) && isset($GLOBALS["wp_fastest_cache"]->images_in_css["images"][0])){
						foreach (array_unique($GLOBALS["wp_fastest_cache"]->images_in_css["images"]) as $key => $value) {
							$img_tag = $img_tag."\n".$this->get_html_image_style($value);
						}

						@file_put_contents($cachFilePath, $img_tag);
					}
				}

				$this->html = preg_replace("/<\/body>/i", $img_tag."\n"."</body>", $this->html);
			}
		}

		public function get_html_image_style($value){
			if(preg_match("/\.gif|jpg|jpeg|png/i", $value)){
				if(preg_match("/url\(/i", $value)){
					return '<style>'.$value."</style>";
				}else{
					// old version... we need to remove it after some time
					$value = trim($value);
					$value = trim($value, "'");
					$value = trim($value, '"');
					$value = trim($value);
					return '<div style="display:none !important;"><img src="'.$value.'" /></div>';
				}
			}
		}

		public function split_html_condition($tag){
			if(substr_count($tag, '<!--') == substr_count($tag, '-->')){
				if(preg_match("/\<\!--\s*\[if[^\>]+>/i", $tag, $start_cond)){
					if(preg_match("/<\!\[endif\]-->/i", $tag, $end_cond)){
						$all = array();

						$script_tag = $this->find_tags("<script", "</script>", $tag);
						$style_tags = $this->find_tags("<style", "</style>", $tag);
						$link_tags = $this->find_tags("<link", ">", $tag);

						$all = array_merge($script_tag, $style_tags, $link_tags);

						$all = $this->tags_reorder($all);

						foreach ($all as $key => &$value) {
							$value["text"] = $start_cond[0].$value["text"].$end_cond[0];
						}

						return $all;
					}
				}
			}

			return false;
		}
	}
?>
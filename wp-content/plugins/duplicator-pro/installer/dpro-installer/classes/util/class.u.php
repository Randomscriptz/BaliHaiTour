<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!class_exists('DUPX_U')) {

    class DUPX_U
    {
        public static $on_php_53_plus;

        public static function init()
        {
            self::$on_php_53_plus = version_compare(PHP_VERSION, '5.3.2', '>=');
        }

        /**
         * Adds a slash to the end of a file or directory path
         *
         * @param string $path		A path
         *
         * @return string The orginal $path with a with '/'.
         */
        public static function add_slash($path)
        {
            $last_char = substr($path, strlen($path) - 1, 1);
            if ($last_char != '/') {
                $path .= '/';
            }
            return $path;
        }

        public static function contains($haystack, $needle)
        {
            $pos = strpos($haystack, $needle);

            return ($pos !== false);
        }

        public static function del_directory($directory, $recursive)
        {
            $success = true;

            if ($excepted_subdirectories = null) {
                $excepted_subdirectories = array();
            }

            $filenames = array_diff(scandir($directory), array('.', '..'));

            foreach ($filenames as $filename) {
                if (is_dir("$directory/$filename")) {
                    if ($recursive) {
                        $success = self::del_directory("$directory/$filename", true);
                    }
                } else {
                    $success = @unlink("$directory/$filename");
                }

                if ($success === false) {
                    //self::log("Problem deleting $directory/$filename");
                    break;
                }
            }

            return $success && rmdir($directory);
        }

        /**
         * Recursively copy files from one directory to another
         * 
         * @param String $src - Source of files being moved
         * @param String $dest - Destination of files being moved
         */
        public static function copy_directory($src, $dest, $recursive = true)
        {
            //RSR TODO:Verify this logic
            $success = true;

            // If source is not a directory stop processing
            if (!is_dir($src)) {
                return false;
            }

            // If the destination directory does not exist create it
            if (!is_dir($dest)) {
                if (!mkdir($dest)) {
                    // If the destination directory could not be created stop processing
                    return false;
                }
            }

            // Open the source directory to read in files
            $iterator = new DirectoryIterator($src);

            foreach ($iterator as $file) {
                if ($file->isFile()) {
                    $success = copy($file->getRealPath(), "$dest/".$file->getFilename());
                } else if (!$file->isDot() && $file->isDir() && $recursive) {
                    $success = self::copy_directory($file->getRealPath(), "$dest/$file", $recursive);
                }

                if (!$success) {
                    break;
                }
            }

            return $success;
        }

        /**
         * Get current microtime as a float. Can be used for simple profiling.
         */
        public static function get_microtime()
        {
            return microtime(true);
        }

        /**
         * Return a string with the elapsed time.
         * Order of $end and $start can be switched. 
         */
        public static function elapsed_time($end, $start)
        {
            return sprintf("%.4f sec.", abs($end - $start));
        }

        /**
         * @param string $string Thing that needs escaping
         * @param bool $echo   Do we echo or return?
         * @return string    Escaped string. 
         */
        public static function esc_html_attr($string = '', $echo = false)
        {
            $output = htmlentities($string, ENT_QUOTES, 'UTF-8');
            if ($echo) echo $output;
            else return $output;
        }

        /**
         *  Makes path safe for any OS
         *  Paths should ALWAYS READ be "/"
         * 		uni: /home/path/file.xt
         * 		win:  D:/home/path/file.txt 
         *  @param string $path		The path to make safe
         */
        public static function set_safe_path($path)
        {
            return str_replace("\\", "/", $path);
        }

        /**
         *  Undoes a set_safe_path
         *  @param string $path		The path to make unsafe
         */
        public static function unset_safe_path($path)
        {
            return str_replace("/", "\\", $path);
        }

        /**
         *  PHP_SAPI for fcgi requires a data flush of at least 256
         *  bytes every 40 seconds or else it forces a script hault
         */
        public static function fcgi_flush()
        {
            echo(str_repeat(' ', 256));
            @flush();
        }

        /**
         *  A safe method used to copy larger files
         *  @param string $source		The path to the file being copied
         *  @param string $destination	The path to the file being made
         */
        public static function copy_file($source, $destination)
        {
            $sp = fopen($source, 'r');
            $op = fopen($destination, 'w');

            while (!feof($sp)) {
                $buffer = fread($sp, 512);  // use a buffer of 512 bytes
                fwrite($op, $buffer);
            }
            // close handles
            fclose($op);
            fclose($sp);
        }

        /**
         *  Finds a string in a file and returns true if found
         *  @param array  $list		A list of strings to search for
         *  @param string $haystack	The string to search in
         */
        public static function string_has_value($list, $file)
        {
            foreach ($list as $var) {
                if (strstr($file, $var) !== false) {
                    return true;
                }
            }
            return false;
        }

        /**
         *  Returns the active plugins for a package
         *  @param  conn   $dbh	 A database connection handle
         *  @return array  $list A list of active plugins
         */
        public static function get_active_plugins($dbh)
        {
            $query = @mysqli_query($dbh, "SELECT option_value FROM `{$GLOBALS['FW_TABLEPREFIX']}options` WHERE option_name = 'active_plugins' ");
            if ($query) {
                $row         = @mysqli_fetch_array($query);
                $all_plugins = unserialize($row[0]);
                if (is_array($all_plugins)) {
                    return $all_plugins;
                }
            }
            return array();
        }

        /**
         *  Display human readable byte sizes
         *  @param string $size		The size in bytes
         */
        public static function readable_bytesize($size)
        {
            try {
                $units = array('B', 'KB', 'MB', 'GB', 'TB');
                for ($i = 0; $size >= 1024 && $i < 4; $i++)
                    $size /= 1024;
                return round($size, 2).$units[$i];
            } catch (Exception $e) {
                return "n/a";
            }
        }

        /**
         * Converts shorthand memory notation value to bytes
         * From http://php.net/manual/en/function.ini-get.php
         *
         * @param $val Memory size shorthand notation string
         */
        public static function return_bytes($val)
        {
            $val  = trim($val);
            $last = strtolower($val[strlen($val) - 1]);
            switch ($last) {
                // The 'G' modifier is available since PHP 5.1.0
                case 'g':
                    $val *= 1024;
                case 'm':
                    $val *= 1024;
                case 'k':
                    $val *= 1024;
                    break;
                default :
                    $val = null;
            }
            return $val;
        }

        /**
         *  The characters that are special in the replacement value of preg_replace are not the
         *  same characters that are special in the pattern
         *  @param string $str		The string to replace on
         */
        public static function preg_replacement_quote($str)
        {
            return preg_replace('/(\$|\\\\)(?=\d)/', '\\\\\1', $str);
        }

        public static function isJSON($string)
        {

            return is_string($string) && is_array(json_decode($string, true)) ? true : false;
        }

        public static function try_CDN($url, $port)
        {
            if ($GLOBALS['FW_USECDN']) {
                return DUPX_HTTP::is_url_active($url, $port);
            } else {
                return false;
            }
        }

        public static function dump($var, $pretty = false)
        {
            if ($pretty) {
                echo '<pre>';
                print_r($var);
                echo '</pre>';
            } else {
                print_r($var);
            }
        }

        /**
         *  Does a string have non ascii characters
         */
        public static function is_non_ascii($string)
        {
            return preg_match('/[^\x20-\x7f]/', $string);
        }
    }
    DUPX_U::init();
}

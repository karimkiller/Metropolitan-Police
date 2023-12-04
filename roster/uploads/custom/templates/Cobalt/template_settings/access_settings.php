<?php

    // Generate settings file if it doesn't exist
    if (!file_exists(ROOT_PATH . "/cobalt-settings.json")) { 
        generateSettingsFile();
    }
    
    // Prevent null settings files from clogging log files and causing massive memory leaks
    $settings_file_contents = file_get_contents(ROOT_PATH . "/cobalt-settings.json");
    if ($settings_file_contents == null || $settings_file_contents == "null") {
        unlink(ROOT_PATH . "/cobalt-settings.json");
        $cobalt_language = new Language(ROOT_PATH . '/custom/templates/Cobalt/template_settings/language', LANGUAGE);
        ErrorHandler::logCustomError($cobalt_language->get('cobalt', 'settings_file_reset'));
        generateSettingsFile();
    }
    
    function generateSettingsFile() {
        $fp = fopen(ROOT_PATH . "/cobalt-settings.json", 'w');
        if (!empty($fp) && is_writable(ROOT_PATH . "/cobalt-settings.json")) {
            fwrite($fp, "{}");
            fclose($fp);
        }
    }

    function isSettingStored($setting) {

        $setting_directory = ROOT_PATH . "/cobalt-settings.json";

        $str = file_get_contents($setting_directory);
        $json = json_decode($str, true);

        if ($json) {
            if (array_key_exists($setting, $json)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function storeSetting($setting, $value) {
        $setting_directory = ROOT_PATH . "/cobalt-settings.json";

        $str = file_get_contents($setting_directory);
        $json = json_decode($str, true);

        if (isSettingStored($setting)) {
            $json[$setting] = $value;
            $newjson = json_encode($json, true);
        } else {
            $newsetting = [$setting => $value];
            $newsettingarray = array_merge($json, $newsetting);
            $newjson = json_encode($newsettingarray, true);
        }
        
        if ($newjson != null && $newjson != "null") {
            file_put_contents($setting_directory, $newjson);
        } else {
            $cobalt_language = new Language(ROOT_PATH . '/custom/templates/Cobalt/template_settings/language', LANGUAGE);
            $error = str_replace("{x}", $setting, $cobalt_language->get('cobalt', 'saving_setting_error'));
            $full_error = str_replace("{y}", $value, $error);
            ErrorHandler::logCustomError($full_error);
            global $cobalt_settings_error;
            $cobalt_settings_error = $full_error . '<br />' . $cobalt_language->get('cobalt', 'try_again');
        }
    }

    function getSetting($setting) {
        $setting_directory = ROOT_PATH . "/cobalt-settings.json";

        $str = file_get_contents($setting_directory);
        $json = json_decode($str, true);

        if (isSettingStored($setting)) {
            return htmlspecialchars_decode($json[$setting]);
        }
    }

    function checkUpdates() {
        $cache = new Cache();
        $cache->setCache('cobalt_template');
        $update_check = HttpClient::get('https://cdn.coldfiredzn.com/cobalt/updater.json');
        if ($update_check->hasError()) {
            ErrorHandler::logCustomError($update_check->getError());
            $cache->store('cobalt_version', "error", 86400);
            return "error";
        }
        $update_check = $update_check->json();

        $cache->store('cobalt_version', $update_check->cobalt_version, 86400);
        return $update_check->cobalt_version;
    }
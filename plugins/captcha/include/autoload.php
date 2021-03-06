<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
function autoload325c98bd05778d4d272393699c4957d7($class) {
    static $classes = null;
    if ($classes === null) {
        $classes = array(
            'captchaplugin' => '/captchaPlugin.class.php',
            'tuleap\\captcha\\administration\\controller' => '/Captcha/Administration/Controller.php',
            'tuleap\\captcha\\administration\\presenter' => '/Captcha/Administration/Presenter.php',
            'tuleap\\captcha\\administration\\router' => '/Captcha/Administration/Router.php',
            'tuleap\\captcha\\client' => '/Captcha/Client.php',
            'tuleap\\captcha\\configuration' => '/Captcha/Configuration.php',
            'tuleap\\captcha\\configurationdataaccessexception' => '/Captcha/ConfigurationDataAccessException.php',
            'tuleap\\captcha\\configurationmalformeddataexception' => '/Captcha/ConfigurationMalformedDataException.php',
            'tuleap\\captcha\\configurationnotfoundexception' => '/Captcha/ConfigurationNotFoundException.php',
            'tuleap\\captcha\\configurationretriever' => '/Captcha/ConfigurationRetriever.php',
            'tuleap\\captcha\\configurationsaver' => '/Captcha/ConfigurationSaver.php',
            'tuleap\\captcha\\dataaccessobject' => '/Captcha/DataAccessObject.php',
            'tuleap\\captcha\\plugin\\descriptor' => '/Captcha/Plugin/Descriptor.php',
            'tuleap\\captcha\\plugin\\info' => '/Captcha/Plugin/Info.php',
            'tuleap\\captcha\\registration\\presenter' => '/Captcha/Registration/Presenter.php'
        );
    }
    $cn = strtolower($class);
    if (isset($classes[$cn])) {
        require dirname(__FILE__) . $classes[$cn];
    }
}
spl_autoload_register('autoload325c98bd05778d4d272393699c4957d7');
// @codeCoverageIgnoreEnd

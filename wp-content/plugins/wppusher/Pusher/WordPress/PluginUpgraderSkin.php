<?php

namespace Pusher\WordPress;

use Plugin_Upgrader_Skin;
use WP_Error;

class PluginUpgraderSkin extends Plugin_Upgrader_Skin
{
    /**
     * @var WP_Error
     */
    protected $error;
    protected $feedback;

    public function after()
    {
        // WP doesn't sent all errors as actual error objects
        if ($this->error === 'up_to_date') {
            $this->error = new WP_Error('wppusher_error', 'Package is up-to-date.');
        }

        // Optimise error messages
        if ($this->error and $this->error->get_error_code() === 'download_failed') {
            $this->error = new WP_Error('download_failed', $this->error->get_error_message() . ' Make sure repository handle and credentials are correct.');
        }

        if ( ! is_null($this->error)) {
            throw new InstallFailed($this->error->get_error_message());
        }
    }

    public function before()
    {
        // ...
    }

    public function error($error)
    {
        $this->error = $error;
    }

    public function header()
    {
        // ...
    }

    public function feedback($string)
    {
        $this->feedback[$string] = true;
    }

    public function footer()
    {
        // ...
    }
}

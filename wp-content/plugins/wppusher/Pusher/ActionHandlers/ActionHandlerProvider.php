<?php

namespace Pusher\ActionHandlers;

use Pusher\ProviderInterface;
use Pusher\Pusher;

class ActionHandlerProvider implements ProviderInterface
{
    public function register(Pusher $pusher)
    {
        // Plugin was installed
        $pusher->addAction('wppusher_plugin_was_installed', 'Pusher\ActionHandlers\LogWhenPluginWasInstalled');
        $pusher->addAction('wppusher_plugin_was_installed', 'Pusher\ActionHandlers\ShowMessageWhenPluginWasInstalled');

        // Plugin was edited
        $pusher->addAction('wppusher_plugin_was_edited', 'Pusher\ActionHandlers\ShowMessageWhenPluginWasEdited');

        // Plugin was updated
        $pusher->addAction('wppusher_plugin_was_updated', 'Pusher\ActionHandlers\LogWhenPluginWasUpdated');
        $pusher->addAction('wppusher_plugin_was_updated', 'Pusher\ActionHandlers\ShowMessageWhenPluginWasUpdated');

        // Plugin was unlinked
        $pusher->addAction('wppusher_plugin_was_unlinked', 'Pusher\ActionHandlers\ShowMessageWhenPluginWasUnlinked');

        // Theme was installed
        $pusher->addAction('wppusher_theme_was_installed', 'Pusher\ActionHandlers\LogWhenThemeWasInstalled');
        $pusher->addAction('wppusher_theme_was_installed', 'Pusher\ActionHandlers\ShowMessageWhenThemeWasInstalled');

        // Theme was edited
        $pusher->addAction('wppusher_theme_was_edited', 'Pusher\ActionHandlers\ShowMessageWhenThemeWasEdited');

        // Theme was update
        $pusher->addAction('wppusher_theme_was_updated', 'Pusher\ActionHandlers\LogWhenThemeWasUpdated');
        $pusher->addAction('wppusher_theme_was_updated', 'Pusher\ActionHandlers\ShowMessageWhenThemeWasUpdated');

        // Theme was unlinked
        $pusher->addAction('wppusher_theme_was_unlinked', 'Pusher\ActionHandlers\ShowMessageWhenThemeWasUnlinked');
    }
}

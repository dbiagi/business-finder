<?php

namespace Composer;

use Composer\Script\Event;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler;

/**
 * Description of CreateSchema
 *
 * @author Diego de Biagi <diego.biagi@twodigital.com.br>
 */
class CreateSchema extends ScriptHandler {

    /**
     * Action name.
     *
     * @var string
     */
    public static $ACTION = 'create schema';

    public static function create(Event $event) {
        $io = $event->getIO();

        $answer = $io->select('Recriar o banco de dados?', ['Nao', 'Sim'], false);

        if (!$answer) {
            return $io->write('Pulando criacao do banco de dados.');
        }

        static::dropDatabase($event);
        static::createDatabase($event);
        static::updateSchema($event);
        static::loadFixtures($event);
    }

    public static function dropDatabase(Event $event) {
        $consoleDir = static::getConsoleDir($event, static::$ACTION);

        static::executeCommand($event, $consoleDir, 'doctrine:database:drop --force --if-exists');
    }

    public static function createDatabase(Event $event) {
        $consoleDir = static::getConsoleDir($event, static::$ACTION);

        static::executeCommand($event, $consoleDir, 'doctrine:database:create --if-not-exists');
    }

    public static function updateSchema(Event $event) {
        $consoleDir = static::getConsoleDir($event, static::$ACTION);

        static::executeCommand($event, $consoleDir, 'doctrine:schema:update -f');
    }

    public static function loadFixtures(Event $event) {
        $consoleDir = static::getConsoleDir($event, static::$ACTION);

        static::executeCommand($event, $consoleDir, 'doctrine:fixtures:load -n --append');
    }

    public static function migrate(Event $event) {
        $consoleDir = static::getConsoleDir($event, static::$ACTION);

        static::executeCommand($event, $consoleDir, 'doctrine:migration:migrate --allow-no-migration -n');
    }

}

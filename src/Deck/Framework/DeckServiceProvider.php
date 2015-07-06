<?php

namespace Deck\Framework;

use Deck\Application\Container;
use Deck\Framework\SqlRepository\PdoClient;

/**
 * The short description
 *
 * As many lines of extendend description as you want {@link element}
 * links to an element
 * {@link http://www.example.com Example hyperlink inline link} links to
 * a website. The inline
 *
 * @package package name
 * @author  Pedro Koblitz
 */
class DeckServiceProvider implements ServiceProviderInterface
{
    /**
     *
     *
     *
     * @access       public
     * @param        type [ $varname] description
     * @return       type description
     */
    public function register(Container $container)
    {
        /* dbs */
        $container['store.mysql.master'] = function ($container) {
            return new PdoClient($container['app.settings']['store.mysql.master.options']);
        };

        /* factories */
        $container['factory.repository'] = function ($container) {
            return new RepositoryFactory($container['store.mysql.master'], $container['app.resolver']);
        };

        $container['factory.controller'] = function ($container) {
            return new ControllerFactory($container);
        };

        /* security */
        $container['security.authentication'] = function ($container) {
            $class = $container['app.resolver']->resolve('authentication');
            return new $class($container['http.session']);
        };

        $container['security.authorization'] = function ($container) {
            $class = $container['app.resolver']->resolve('authorization');
            $authorization = new $class();
            $authorization->setCredentials($container['http.session']);
            return $authorization;
        };
    }
}

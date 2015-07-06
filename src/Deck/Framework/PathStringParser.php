<?php

namespace Deck\Framework\SqlRepository;

use Deck\Framework\Filter\OwnerFilter;
use Deck\Framework\Filter\RecentFilter;
use Deck\Framework\Filter\OrderFilter;
use Deck\Framework\Filter\IntervalFilter;
use Deck\Framework\Filter\Pagination;

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
class PathStringParser
{

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function extract(array $get)
    {

        $filters = array();

        if (isset($get['owner_id'])) {
            $filters['owner'] = array('user_id' => $get['owner_id']);
        }

        if (isset($get['last'])) {
            $filters['recent'] = array('last' => $get['last']);
        }

        if (isset($get['order']) && isset($get['key'])) {
            $filters['order'] = array('order' => $get['order'], 'key' => $get['key']);
        }

        if (isset($get['timestamp1']) && isset($get['timestamp2'])) {
            $filters['date_interval'] = array('timestamp1' => $get['timestamp1'], 'timestamp2' => $get['timestamp2']);
        }

        return $filters;
    }

    /**
     * turns page number in a offset/limit associative array
     * uses $this->settings['per_page'] for calculation
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function paginate($pg, $pp)
    {
        return array('offset' => $pp * ($pg - 1), 'limit' => $pp);
    }
}

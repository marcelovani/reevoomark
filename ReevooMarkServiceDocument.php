<?php

/**
 * @file
 * Add functionality to the ReevooMarkDocument class.
 */

class ReevooMarkServiceDocument extends ReevooMarkDocument
{

  /**
   * How old the cache is allowed to get.
   *
   * Defaults to one day.
   * NB the Reevoo default is 1 hour.
   *
   * For setting this configuraton goto: /admin/config/system/reevoomark
   *
   * @var int
   */
  protected $cache_age = 86400;

  public function __construct($data, $mtime, $options = NULL)
  {
    $this->options = $options;

    if (!empty($options['cache_age'])) {
      $this->cache_age = (int) $options['cache_age'];
    }

    parent::__construct($data, $mtime);
  }

  /**
   * Allow the document's cache expiration date to be extended.
   */
  function hasExpired()
  {
    $expired = parent::hasExpired();

    if ($expired && ($this->currentAge() < $this->cache_age)) {
      return FALSE;
    }

    // Use the default the document requested
    return $expired;
  }

}

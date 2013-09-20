<?php

/**
 * @file
 * Add functionality to the ReevooMarkDocument class.
 */

/**
 * Extension of ReevooMarkDocument to provided alternative caching.
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
  protected $cacheAge = 86400;

  /**
   * The extending constructor.
   *
   * @param string $data
   *   The full http response from Reevoo.
   * @param int $mtime
   *   The time the cache for the document was created.
   * @param array $options
   *   Custom options to set caching etc.
   */
  public function __construct($data, $mtime, $options = NULL)
  {
    $this->options = $options;

    if (!empty($options['cache_age'])) {
      $this->cacheAge = (int) $options['cache_age'];
    }

    parent::__construct($data, $mtime);
  }

  /**
   * Allow the document's cache expiration date to be extended.
   */
  public function hasExpired()
  {
    $expired = parent::hasExpired();

    if ($expired && ($this->currentAge() < $this->cacheAge)) {
      return FALSE;
    }

    // Use the default the document requested.
    return $expired;
  }

}

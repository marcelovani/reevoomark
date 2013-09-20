<?php

/**
 * @file
 * Add functionality to the ReevooMark library.
 */

class ReevooMarkService extends ReevooMark implements ReevooMarkServiceInterface
{

  /**
   * The drupal cache object.
   *
   * @var stdClass
   */
  protected $cache;

  /**
   * How old the cache is allowed to get.
   * Cache expire = REQUEST_TIME + $cache_age
   *
   * Defaults to one day.
   *
   * @var int
   */
  protected $cache_age = 86400;

  /**
   * Options passed in from the admin settings.
   * For setting these options goto: /admin/config/system/reevoomark
   *
   * @var array
   */
  protected $options;

  /**
   * The name of the class to use for documents.
   *
   * @var string
   */
  protected $document_class = 'ReevooMarkDocument';

  public function __construct($url, $retailer, $sku, $options)
  {

    $this->options = $options;

    if (!empty($options['document_class'])) {
      $this->document_class = $options['document_class'];
    }

    if (!empty($options['cache_age'])) {
      $this->cache_age = (int) $options['cache_age'];
    }

    // Pass FALSE as the $cache parm to the parent library as this uses Drupal caching.
    parent::__construct(FALSE, $url, $retailer, $sku);
  }

  /**
   * The overall score for the reviewed product.
   *
   * @return string
   */
  public function getOverallScore()
  {
    return trim($this->data->header("X-Reevoo-OverallScore"));
  }

  /**
   * The best price.
   * If available once an "offers" service call has been made.
   *
   * @return string
   */
  public function getBestPrice()
  {
      return trim($this->data->header("X-Reevoo-BestPrice"));
  }

  /**
   * Returns the URL for the best price.
   * If available once an "offers" service call has been made.
   *
   * @return string
   */
  public function getBestPriceLink()
  {
      return $this->data->header("X-Reevoo-BestPriceLink");
  }

  /**
   * The body of the Reevoo document.
   */
  public function getBody()
  {
    return $this->body();
  }

  public function getCacheId()
  {
    return $this->remote_url;
  }

  /**
   * Use Drupal caching not the file based one of the parent library.
   *
   * @param string $data
   */
  protected function saveToCache($data)
  {
    cache_set($this->getCacheId(), $data, 'cache_reevoomark', REQUEST_TIME + $this->cache_age);
  }

  /**
   * Get the cached object if it exists.
   */
  protected function cacheGet()
  {
    if (is_null($this->cache)) {
      $this->cache = cache_get($this->getCacheId(), 'cache_reevoomark');
    }
  }

  /**
   * Load from the Drupal cache.
   *
   * @return string
   */
  protected function loadFromCache()
  {
    $this->cacheGet();

    if (is_object($this->cache)) {
      if (REQUEST_TIME < $this->cache->expire) {
        return $this->cache->data;
      }
    }

    return FALSE;
  }

  /**
   * The time the document was saved to the cache, if at all.
   */
  protected function cacheMTime()
  {
    $this->cacheGet();

    if (is_object($this->cache)) {
      return $this->cache->created;
    }

    return FALSE;
  }

  /**
   * Use our configured class for the document.
   */
  protected function newDocumentFromCache()
  {
    return new $this->document_class($this->loadFromCache(), $this->cacheMTime(), $this->options);
  }

}

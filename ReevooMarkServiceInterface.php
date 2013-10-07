<?php

/**
 * @file
 * Interface
 */

/**
 * The interface for the ReevooMark Service.
 */
interface ReevooMarkServiceInterface {

  /**
   * The overall score for the reviewed product.
   *
   * @return string
   *   The overall score.
   */
  public function getOverallScore();

  /**
   * The best price.
   *
   * If available once an "offers" service call has been made.
   *
   * @return string
   *   The best price.
   */
  public function getBestPrice();

  /**
   * Returns the URL for the best price.
   *
   * If available once an "offers" service call has been made.
   *
   * @return string
   *   The url of where to buy at the best price.
   */
  public function getBestPriceLink();

  /**
   * The body of the Reevoo document.
   *
   * @return string
   *   The html part of the Reevoo response.
   */
  public function getBody();

}

<?php

/**
 * @file
 * Interface
 */

/**
 * The interface for the ReevooMark Service.
 */
interface ReevooMarkServiceInterface
{

  /**
   * The overall score for the reviewed product.
   *
   * @return string
   */
  public function getOverallScore();

  /**
   * The best price.
   * If available once an "offers" service call has been made.
   *
   * @return string
   */
  public function getBestPrice();

  /**
   * Returns the URL for the best price.
   * If available once an "offers" service call has been made.
   *
   * @return string
   */
  public function getBestPriceLink();

  /**
   * The body of the Reevoo document.
   */
  public function getBody();

}

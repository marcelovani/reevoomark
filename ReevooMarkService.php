<?php

/**
 * @file
 * Add functionality to the ReevooMark library.
 */

class ReevooMarkService extends ReevooMark implements ReevooMarkServiceInterface
{

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

}

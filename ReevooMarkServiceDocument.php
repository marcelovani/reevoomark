<?php

/**
 * @file
 * Add functionality to the ReevooMarkDocument class.
 */

class ReevooMarkServiceDocument extends ReevooMarkDocument
{

  public function maxAge()
  {
    //@todo file bug report: $this->header("cache-control") is case sensitive and comming in a lower case...
    if (preg_match("/max-age=([0-9]+)/", $this->header("cache-control"), $matches)) {
      return $matches[1];
    }
  }

}

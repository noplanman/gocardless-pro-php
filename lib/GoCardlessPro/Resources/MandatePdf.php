<?php
/**
  * WARNING: Do not edit by hand, this file was generated by Crank:
  *
  * https://github.com/gocardless/crank
  */

namespace GoCardlessPro\Resources;

/**
  * Construct a mandate PDF for a given set of bank details or an
  * already-existing mandate.
  */
class MandatePdf extends Base
{



  /**
    * The date and time at which `url` will cease to be accessible (30 minutes
    * after the original request).
    *
    * @return string
    */
    public function expires_at()
    {
        $field = 'expires_at';
        if (!property_exists($this->data, $field)) {
            return null;
        }
        return $this->data->{$field};
    }

  /**
    * The URL at which this mandate PDF can be viewed until it expires at the
    * date and time specified by `expires_at`. *You should not store this URL as
    * it will only work for a short period of time. The structure of these URLs
    * may change at any time.*
    *
    * @return string
    */
    public function url()
    {
        $field = 'url';
        if (!property_exists($this->data, $field)) {
            return null;
        }
        return $this->data->{$field};
    }


  /**
    * Returns a string representation of the project.
    *
    * @return string 
    */
    public function __toString()
    {
        $ret = 'MandatePdf Class (';
        $ret .= print_r($this->data, true);
        return $ret;
    }
}
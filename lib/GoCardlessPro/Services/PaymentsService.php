<?php
/**
  * WARNING: Do not edit by hand, this file was generated by Crank:
  *
  * https://github.com/gocardless/crank
  */

namespace GoCardlessPro\Services;

/**
  *  Payments
  *
  * @method \GoCardlessPro\Core\ListResponse 
  * list(array $options=array(), array $headers=array()) gets a non-paginated list of models given finder options.
  *
  *  Payment objects represent payments from a
  *  [customer](https://developer.gocardless.com/pro/2015-04-29/#api-endpoints-customers)
  *  to a
  *  [creditor](https://developer.gocardless.com/pro/2015-04-29/#api-endpoints-creditors),
  *  taken against a Direct Debit
  *  [mandate](https://developer.gocardless.com/pro/2015-04-29/#api-endpoints-mandates).

  *   *  
  *  GoCardless will notify you via a
  *  [webhook](https://developer.gocardless.com/pro/2015-04-29/#webhooks)
  *  whenever the state of a payment changes.
  */
class PaymentsService extends Base
{
  
  /**
    *  Create a payment
    *
    *  <a name="mandate_is_inactive"></a>Creates a new payment object.
    *  
 
    *    *  This fails with a `mandate_is_inactive` error if the linked
    *  [mandate](https://developer.gocardless.com/pro/2015-04-29/#api-endpoints-mandates)
    *  is cancelled. Payments can be created against `pending_submission`
    *  mandates, but they will not be submitted until the mandate becomes
    *  active.
    *
    *  Example URL: /payments
    *
    *
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Payment
    * @throws \GoCardlessPro\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardlessPro\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function create($params = array(), $headers = array())
    {
        return $this->make_request('create', 'post', '/payments', $params);
    }

  /**
    *  List payments
    *
    *  Returns a
    *  [cursor-paginated](https://developer.gocardless.com/pro/2015-04-29/#overview-cursor-pagination)
    *  list of your payments.
    *
    *  Example URL: /payments
    *
    *
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return \GoCardlessPro\Core\ListResponse
    * @throws \GoCardlessPro\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardlessPro\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function do_list($params = array(), $headers = array())
    {
        return $this->make_request('list', 'get', '/payments', $params);
    }

  /**
    *  Get a single payment
    *
    *  Retrieves the details of a single existing payment.
    *
    *  Example URL: /payments/:identity
    *
    *
    * @param string $identity Unique identifier, beginning with "PM"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Payment
    * @throws \GoCardlessPro\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardlessPro\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function get($identity, $params = array(), $headers = array())
    {
        $path = self::sub_url('/payments/:identity', array(
            'identity' => $identity
        ));

        return $this->make_request('get', 'get', $path, $params, $headers);
    }

  /**
    *  Update a payment
    *
    *  Updates a payment object. This accepts only the metadata parameter.
    *
    *  Example URL: /payments/:identity
    *
    *
    * @param string $identity Unique identifier, beginning with "PM"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Payment
    * @throws \GoCardlessPro\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardlessPro\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function update($identity, $params = array(), $headers = array())
    {
        $path = self::sub_url('/payments/:identity', array(
            'identity' => $identity
        ));

        return $this->make_request('update', 'put', $path, $params, $headers);
    }

  /**
    *  Cancel a payment
    *
    *  Cancels the payment if it has not already been submitted to the banks.
    *  Any metadata supplied to this endpoint will be stored on the payment
    *  cancellation event it causes.
    *  
    *  This will fail with a
    *  `cancellation_failed` error unless the payment's status is
    *  `pending_submission`.
    *
    *  Example URL: /payments/:identity/actions/cancel
    *
    *
    * @param string $identity Unique identifier, beginning with "PM"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Payment
    * @throws \GoCardlessPro\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardlessPro\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function cancel($identity, $params = array(), $headers = array())
    {
        $path = self::sub_url('/payments/:identity/actions/cancel', array(
            'identity' => $identity
        ));

        return $this->make_request('cancel', 'post', $path, $params, $headers);
    }

  /**
    *  Retry a payment
    *
    *  <a name="retry_failed"></a>Retries a failed payment if the underlying
    *  mandate is active. You will receive a `resubmission_requested` webhook,
    *  but after that retrying the payment follows the same process as its
    *  initial creation, so you will receive a `submitted` webhook, followed by
    *  a `confirmed` or `failed` event. Any metadata supplied to this endpoint
    *  will be stored against the payment submission event it causes.
    *  
  
    *   *  This will return a `retry_failed` error if the payment has not
    *  failed.
    *
    *  Example URL: /payments/:identity/actions/retry
    *
    *
    * @param string $identity Unique identifier, beginning with "PM"
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Payment
    * @throws \GoCardlessPro\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardlessPro\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function retry($identity, $params = array(), $headers = array())
    {
        $path = self::sub_url('/payments/:identity/actions/retry', array(
            'identity' => $identity
        ));

        return $this->make_request('retry', 'post', $path, $params, $headers);
    }



  /**
    *  List payments
    *
    *  Returns a
    *  [cursor-paginated](https://developer.gocardless.com/pro/2015-04-29/#overview-cursor-pagination)
    *  list of your payments.
    *
    * Example URL: /payments
    *
    * @param int $list_max The maximum number of records to return while paginating.
    * @param string[mixed] $params POST/URL parameters for the argument. Automatically wrapped.
    * @param string[string] $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return \GoCardlessPro\Core\Paginator
    **/
    public function all($list_max, $params = array(), $headers = array())
    {
        return new \GoCardlessPro\Core\Paginator($this, $list_max, $this->do_list($params), $params, $headers);
    }


   /**
    * Get the resource loading class.
    * Used internally to send http requests.
    *
    * @return string
    */
    protected function resourceClass()
    {
        return '\GoCardlessPro\Resources\Payment';
    }

  /**
    *  Get the key the response object is enclosed in in JSON.
    *  Used internally to wrap and unwrap http requests.
    *
    *  @return string
    */
    protected function envelopeKey()
    {
        return 'payments';
    }
}
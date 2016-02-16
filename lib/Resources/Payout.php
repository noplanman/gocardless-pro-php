<?php
/**
 * WARNING: Do not edit by hand, this file was generated by Crank:
 *
 * https://github.com/gocardless/crank
 */

namespace GoCardlessPro\Resources;

/**
 * A thin wrapper around a payout, providing access to it's
 * attributes
 *
 * @property-read $amount
 * @property-read $arrival_date
 * @property-read $created_at
 * @property-read $currency
 * @property-read $id
 * @property-read $links
 * @property-read $reference
 * @property-read $status
 */
class Payout extends BaseResource
{
    protected $model_name = "Payout";

    /**
     * Amount in pence or cents.
     */
    protected $amount;

    /**
     * Date the payout is due to arrive in the creditor's bank account.
     *
     * One of:
     * <ul>
     *   <li>`2014-01-01`: the payout has been paid
     * and is due to arrive in the creditor's bank
     *   account on this
     * day</li>
     *   <li>`null`: the payout hasn't been paid yet</li>
     *
     * </ul>
     */
    protected $arrival_date;

    /**
     * Fixed [timestamp](#overview-time-zones-dates), recording when this
     * resource was created.
     */
    protected $created_at;

    /**
     * [ISO 4217](http://en.wikipedia.org/wiki/ISO_4217#Active_codes) currency
     * code.
     */
    protected $currency;

    /**
     * Unique identifier, beginning with "PO".
     */
    protected $id;

    /**
     * 
     */
    protected $links;

    /**
     * Reference which appears on the creditor's bank statement.
     */
    protected $reference;

    /**
     * One of:
     * <ul>
     * <li>`pending`: the payout has been created,
     * but not yet sent to the banks</li>
     * <li>`paid`: the payout has been
     * sent to the banks</li>
     * </ul>
     */
    protected $status;

}

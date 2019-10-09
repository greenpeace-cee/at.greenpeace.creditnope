<?php

use Civi\Test\HeadlessInterface;
use Civi\Test\HookInterface;
use Civi\Test\TransactionalInterface;

/**
 * Test credit note handling
 *
 * @group headless
 */
class CRM_Creditnope_CreditnoteTest extends \PHPUnit\Framework\TestCase implements HeadlessInterface, HookInterface, TransactionalInterface {
  use \Civi\Test\Api3TestTrait;

  public function setUpHeadless() {
    return \Civi\Test::headless()
      ->installMe(__DIR__)
      ->apply();
  }

  /**
   * Test that creditnote_id is empty after a contribution is cancelled
   */
  public function testCreditNoteIsEmpty() {
    // create a test contact
    $contact = $this->callAPISuccess('Contact', 'create', [
      'contact_type' => 'Individual',
      'email'        => 'creditnotetest@example.com',
    ]);
    // create a test contribution
    $contribution = $this->callAPISuccess('Contribution', 'create', [
      'financial_type_id'      => 'Donation',
      'receive_date'           => '20191009',
      'total_amount'           => 100,
      'contact_id'             => $contact['id'],
      'contribution_status_id' => 'Completed',
    ]);
    // cancel the contribution
    $contribution = reset($this->callAPISuccess('Contribution', 'create', [
      'id' => $contribution['id'],
      'contribution_status_id' => 'Cancelled',
    ])['values']);
    $this->assertEmpty(
      $contribution['creditnote_id'],
      'Credit note ID should be empty'
    );
  }

}

<?php

namespace Tests\Unit;

use App\Services\Contact\ContactMaskingService;
use App\Services\Contact\PhoneNumberService;
use PHPUnit\Framework\TestCase;

class PhoneNumberServiceTest extends TestCase
{
    public function test_normalizes_philippine_numbers_to_e164(): void
    {
        $this->assertEquals('+639491902119', PhoneNumberService::normalize('09491902119'));
        $this->assertEquals('+639491902119', PhoneNumberService::normalize('9491902119'));
        $this->assertEquals('+639491902119', PhoneNumberService::normalize('639491902119'));
        $this->assertEquals('+639491902119', PhoneNumberService::normalize('+639491902119'));
        $this->assertEquals('+639491902119', PhoneNumberService::normalize('0949-190-2119'));
        $this->assertEquals('+639491902119', PhoneNumberService::normalize('+63 949 190 2119'));
    }

    public function test_masks_philippine_mobile_number_correctly(): void
    {
        $this->assertEquals('+63 949 ••• ••19', PhoneNumberService::mask('+639491902119'));
        $this->assertEquals('+63 949 ••• ••19', PhoneNumberService::mask('09491902119'));
    }

    public function test_masks_email_address_correctly(): void
    {
        $masked = ContactMaskingService::maskEmail('maria.santos@example.com');
        $this->assertStringStartsWith('m', $masked);
        $this->assertStringContainsString('•', $masked);
        $this->assertStringEndsWith('@example.com', $masked);
        $this->assertStringNotContainsString('maria', $masked);
    }
}

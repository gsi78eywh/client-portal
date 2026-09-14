<?php

namespace App\Services\Modules\SampleData;

class TransmittalsSampleData
{
    /**
     * Default mock Transmittal records for V1.
     */
    public static function get(int $accountId, ?int $userId = null): array
    {
        return self::getDefaultTransmittalRecords($accountId, $userId);
    }

    public static function getDefaultTransmittalRecords(int $accountId, ?int $userId = null): array
    {
        return [
            [
                'id' => 1,
                'account_id' => $accountId,
                'user_id' => $userId,
                'transmittal_no' => 'TR-2026-0063',
                'title' => 'SEC Compliance Documents',
                'type' => 'Incoming',
                'sender' => 'Securities and Exchange Commission',
                'recipient' => 'Corporate Legal Department',
                'transmittal_date' => '2026-08-18',
                'formatted_transmittal_date' => 'August 18, 2026',
                'delivery_method' => 'Email',
                'delivery_date' => '2026-08-18',
                'formatted_delivery_date' => 'August 18, 2026',
                'status' => 'Received',
                'status_badge_class' => 'received',
                'description' => 'Official notice and stamped confirmation of compliance documents submitted for annual filing cycle.',
                'acknowledged_by' => 'Atty. Mark V. Santos',
                'acknowledged_at' => '2026-08-18',
                'formatted_acknowledged_at' => 'August 18, 2026',
                'proof_of_receipt_note' => 'Formal confirmation email and digital transmission receipt logged.',
                'proof_of_receipt_path' => null,
                'attachments' => [
                    [
                        'name' => 'SEC_Compliance_Acknowledgment_2026.pdf',
                        'formatted_size' => '1.4 MB',
                        'type' => 'PDF',
                    ],
                ],
                'metadata' => [
                    'source_agency' => 'SEC Company Registration and Monitoring Department',
                ],
            ],
            [
                'id' => 2,
                'account_id' => $accountId,
                'user_id' => $userId,
                'transmittal_no' => 'TR-2026-0062',
                'title' => 'Board Resolution Documents',
                'type' => 'Outgoing',
                'sender' => 'Corporate Secretary Office',
                'recipient' => 'Metrobank Commercial Banking Division',
                'transmittal_date' => '2026-08-17',
                'formatted_transmittal_date' => 'August 17, 2026',
                'delivery_method' => 'Electronic',
                'delivery_date' => '2026-08-17',
                'formatted_delivery_date' => 'August 17, 2026',
                'status' => 'Pending Receipt',
                'status_badge_class' => 'pending',
                'description' => 'Certified Secretary Certificate regarding updated authorized bank signatories and credit facility operations.',
                'acknowledged_by' => null,
                'acknowledged_at' => null,
                'formatted_acknowledged_at' => null,
                'proof_of_receipt_note' => 'Transmitted via secure banking portal. Awaiting commercial banking desk receipt acknowledgment.',
                'proof_of_receipt_path' => null,
                'attachments' => [
                    [
                        'name' => 'Board_Resolution_No_08_Signed.pdf',
                        'formatted_size' => '850 KB',
                        'type' => 'PDF',
                    ],
                ],
                'metadata' => [
                    'tracking_code' => 'MB-PORTAL-2026-0817-A',
                ],
            ],
            [
                'id' => 3,
                'account_id' => $accountId,
                'user_id' => $userId,
                'transmittal_no' => 'TR-2026-0061',
                'title' => 'Business Permit Documents',
                'type' => 'Incoming',
                'sender' => 'City Government of Makati - BPLO',
                'recipient' => 'Office of General Administration',
                'transmittal_date' => '2026-08-15',
                'formatted_transmittal_date' => 'August 15, 2026',
                'delivery_method' => 'Courier',
                'delivery_date' => '2026-08-15',
                'formatted_delivery_date' => 'August 15, 2026',
                'status' => 'Received',
                'status_badge_class' => 'received',
                'description' => 'Physical Mayor’s Operating Permit and sanitary clearance certificates delivered via authorized dispatch courier.',
                'acknowledged_by' => 'Elena G. Ramos (Admin Supervisor)',
                'acknowledged_at' => '2026-08-15',
                'formatted_acknowledged_at' => 'August 15, 2026',
                'proof_of_receipt_note' => 'Physical airway bill signed and stamped upon lobby delivery.',
                'proof_of_receipt_path' => null,
                'attachments' => [
                    [
                        'name' => 'Makati_Permit_Original_Scan.pdf',
                        'formatted_size' => '3.2 MB',
                        'type' => 'PDF',
                    ],
                ],
                'metadata' => [
                    'courier_name' => 'LBC Express Corporate Dispatch',
                    'tracking_code' => 'LBC-192837465',
                ],
            ],
            [
                'id' => 4,
                'account_id' => $accountId,
                'user_id' => $userId,
                'transmittal_no' => 'TR-2026-0060',
                'title' => 'Financial Reports',
                'type' => 'Outgoing',
                'sender' => 'Finance & Accounting Department',
                'recipient' => 'SGV & Co. External Audit Team',
                'transmittal_date' => '2026-08-14',
                'formatted_transmittal_date' => 'August 14, 2026',
                'delivery_method' => 'Electronic',
                'delivery_date' => '2026-08-14',
                'formatted_delivery_date' => 'August 14, 2026',
                'status' => 'Delivered',
                'status_badge_class' => 'delivered',
                'description' => 'Quarterly balance sheet, income statement, trial balance, and depreciation schedules submitted for interim review.',
                'acknowledged_by' => 'Audit Partner Desk',
                'acknowledged_at' => '2026-08-14',
                'formatted_acknowledged_at' => 'August 14, 2026',
                'proof_of_receipt_note' => 'Audit vault portal upload receipt verified.',
                'proof_of_receipt_path' => null,
                'attachments' => [
                    [
                        'name' => 'Q2_Financial_Statements_Package.xlsx',
                        'formatted_size' => '4.8 MB',
                        'type' => 'XLSX',
                    ],
                ],
                'metadata' => [
                    'confidentiality' => 'High',
                ],
            ],
        ];
    }
}

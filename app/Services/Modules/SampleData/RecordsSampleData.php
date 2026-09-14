<?php

namespace App\Services\Modules\SampleData;

class RecordsSampleData
{
    /**
     * Default mock Document records for V1.
     */
    public static function get(int $accountId, ?int $userId = null): array
    {
        return self::getDefaultDocumentRecords($accountId, $userId);
    }

    public static function getDefaultDocumentRecords(int $accountId, ?int $userId = null): array
    {
        return [
            [
                'id' => 1,
                'account_id' => $accountId,
                'user_id' => $userId,
                'record_no' => 'REC-2026-1248',
                'title' => 'Articles of Incorporation',
                'classification' => 'Corporate Records',
                'subclass' => 'Charter & Articles',
                'source' => 'SEC',
                'document_number' => 'SEC-CS2026-08129',
                'record_date' => '2026-08-18',
                'formatted_record_date' => 'August 18, 2026',
                'status' => 'Active',
                'status_badge_class' => 'active',
                'ocr_status' => 'Indexed & Processed',
                'ocr_summary' => 'Text indexation completed. 8 pages extracted with high optical fidelity.',
                'description' => 'Original certified true copy of SEC Certificate of Incorporation and Articles of Incorporation.',
                'tags' => ['SEC', 'Charter', 'Articles', 'Corporate'],
                'metadata' => [
                    'pages' => 8,
                    'registry' => 'Securities and Exchange Commission',
                    'filing_mode' => 'Certified True Copy',
                ],
                'file_path' => null,
                'file_name' => 'Articles_of_Incorporation_Signed.pdf',
                'file_size_bytes' => 2450000,
                'formatted_file_size' => '2.4 MB',
                'file_type' => 'PDF',
            ],
            [
                'id' => 2,
                'account_id' => $accountId,
                'user_id' => $userId,
                'record_no' => 'REC-2026-1247',
                'title' => 'Board Resolution No. 08 - Bank Signatory Authorization',
                'classification' => 'Corporate Records',
                'subclass' => 'Board Resolution',
                'source' => 'Internal',
                'document_number' => 'BR-2026-08-01',
                'record_date' => '2026-08-17',
                'formatted_record_date' => 'August 17, 2026',
                'status' => 'Active',
                'status_badge_class' => 'active',
                'ocr_status' => 'Indexed & Processed',
                'ocr_summary' => 'Text indexation completed. Board signatory resolution extracted.',
                'description' => 'Corporate Secretary certificate authorizing designated officers to transact with partner banks.',
                'tags' => ['Board', 'Resolution', 'Banking', 'Signatories'],
                'metadata' => [
                    'pages' => 3,
                    'custodian' => 'Corporate Secretary',
                ],
                'file_path' => null,
                'file_name' => 'BR-2026-08_Bank_Signatories.pdf',
                'file_size_bytes' => 1250000,
                'formatted_file_size' => '1.2 MB',
                'file_type' => 'PDF',
            ],
            [
                'id' => 3,
                'account_id' => $accountId,
                'user_id' => $userId,
                'record_no' => 'REC-2026-1246',
                'title' => "Mayor's Business Permit & Sanitary Clearance",
                'classification' => 'Compliance Records',
                'subclass' => 'LGU Permit',
                'source' => 'LGU',
                'document_number' => 'LGU-MKT-2026-9912',
                'record_date' => '2026-08-15',
                'formatted_record_date' => 'August 15, 2026',
                'status' => 'Review',
                'status_badge_class' => 'review',
                'ocr_status' => 'Indexed & Processed',
                'ocr_summary' => 'Text indexation completed. LGU permit assessment verified.',
                'description' => 'Annual commercial operating business permit issued by City of Makati.',
                'tags' => ['Permit', 'LGU', 'Makati', 'Sanitary'],
                'metadata' => [
                    'pages' => 4,
                    'issuing_agency' => 'Makati BPLO',
                ],
                'file_path' => null,
                'file_name' => 'Mayors_Permit_2026_Makati.pdf',
                'file_size_bytes' => 3800000,
                'formatted_file_size' => '3.8 MB',
                'file_type' => 'PDF',
            ],
            [
                'id' => 4,
                'account_id' => $accountId,
                'user_id' => $userId,
                'record_no' => 'REC-2026-1245',
                'title' => 'Executive Employment Agreement - Chief Operating Officer',
                'classification' => 'Human Resources',
                'subclass' => 'Employment Contract',
                'source' => 'Internal',
                'document_number' => 'HR-EA-2026-004',
                'record_date' => '2026-08-14',
                'formatted_record_date' => 'August 14, 2026',
                'status' => 'Active',
                'status_badge_class' => 'active',
                'ocr_status' => 'Indexed & Processed',
                'ocr_summary' => 'Text indexation completed. Confidential employment contract sealed.',
                'description' => 'Signed executive employment agreement, non-compete, and confidentiality annexes.',
                'tags' => ['HR', 'Executive', 'Contract', 'Confidential'],
                'metadata' => [
                    'pages' => 6,
                    'department' => 'Executive Office',
                ],
                'file_path' => null,
                'file_name' => 'COO_Employment_Agreement_Executed.pdf',
                'file_size_bytes' => 1600000,
                'formatted_file_size' => '1.6 MB',
                'file_type' => 'PDF',
            ],
        ];
    }
}

<?php

namespace App\Services\Modules\SampleData;

class ComplianceSampleData
{
    /**
     * Default mock compliance records for V1.
     */
    public static function get(int $accountId, ?int $userId = null): array
    {
        return self::getDefaultComplianceRecords($accountId, $userId);
    }

    public static function getDefaultComplianceRecords(int $accountId, ?int $userId = null): array
    {
        return [
            [
                'id' => 1,
                'account_id' => $accountId,
                'user_id' => $userId,
                'reference_no' => 'CMP-00124',
                'title' => 'Annual SEC GIS (General Information Sheet)',
                'agency' => 'SEC',
                'category' => 'Corporate Filing',
                'frequency' => 'Annually',
                'effective_date' => '2026-01-15',
                'due_date' => '2026-09-30',
                'formatted_due_date' => 'Sep 30, 2026',
                'formatted_effective_date' => 'Jan 15, 2026',
                'responsible_person' => 'Atty. Carmela Santos, CPA',
                'status' => 'Due Soon',
                'status_badge_class' => 'due',
                'description' => 'Mandatory annual filing with Securities and Exchange Commission via SEC eFAST portal along with Corporate Secretary certificate.',
                'attachment_path' => null,
                'attachment_name' => 'SEC_GIS_2026_Draft.pdf',
            ],
            [
                'id' => 2,
                'account_id' => $accountId,
                'user_id' => $userId,
                'reference_no' => 'CMP-00118',
                'title' => 'BIR Form 1702Q – Quarterly Income Tax Return (Q3)',
                'agency' => 'BIR',
                'category' => 'Tax Filing',
                'frequency' => 'Quarterly',
                'effective_date' => '2026-07-01',
                'due_date' => '2026-10-15',
                'formatted_due_date' => 'Oct 15, 2026',
                'formatted_effective_date' => 'Jul 01, 2026',
                'responsible_person' => 'John Kelly, CPA',
                'status' => 'Scheduled',
                'status_badge_class' => 'scheduled',
                'description' => 'Quarterly corporate income tax computation and creditable withholding tax 2307 reconciliation schedule.',
                'attachment_path' => null,
                'attachment_name' => null,
            ],
            [
                'id' => 3,
                'account_id' => $accountId,
                'user_id' => $userId,
                'reference_no' => 'CMP-00104',
                'title' => 'LGU Mayor\'s Permit & Business Tax Early Renewal',
                'agency' => 'LGU',
                'category' => 'Business Permit',
                'frequency' => 'Annually',
                'effective_date' => '2026-08-01',
                'due_date' => '2026-11-20',
                'formatted_due_date' => 'Nov 20, 2026',
                'formatted_effective_date' => 'Aug 01, 2026',
                'responsible_person' => 'Corporate Affairs Specialist',
                'status' => 'Monitoring',
                'status_badge_class' => 'monitoring',
                'description' => 'Validation of barangay business clearance, community tax certificate (CTC), and fire inspection compliance.',
                'attachment_path' => null,
                'attachment_name' => null,
            ],
        ];
    }
}

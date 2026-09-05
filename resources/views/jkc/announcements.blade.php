@extends('layouts.client')

@section('title', 'Announcements')

@section('header-title', 'Announcements')

@section('content')

<div class="announcements-container"
     style="max-width: 1200px; padding: 10px 0 40px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <!-- =========================================================
         PAGE HEADER
    ========================================================== -->
    <div class="page-header"
         style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">

        <div>

            <div style="font-size: 11px;
                        font-weight: 800;
                        color: #2563eb;
                        letter-spacing: 0.08em;
                        text-transform: uppercase;
                        margin-bottom: 6px;">
                JK&amp;C
            </div>

            <h1 class="page-title"
                style="font-size: 26px;
                       font-weight: 700;
                       color: #0f172a;
                       letter-spacing: -0.02em;
                       margin: 0 0 6px 0;
                       line-height: 1.2;">
                Announcements
            </h1>

            <p class="page-description"
               style="font-size: 13.5px;
                      color: #64748b;
                      margin: 0;
                      max-width: 760px
                      line-height: 1.6">
                Official JK&amp;C memoranda, advisories, notices and client-specific updates.
            </p>

        </div>

        <div style="display: flex;
                    align-items: center;
                    gap: 12px;">

            <span style="background: #dcfce7;
                         color: #15803d;
                         font-size: 12px;
                         font-weight: 600;
                         padding: 8px 16px;
                         border-radius: 20px;
                         display: inline-flex;
                         align-items: center;
                         gap: 6px;">

                <span style="font-size: 8px;">●</span>
                3 New

            </span>

            <button type="button"
                    style="background: #2563eb;
                           color: #ffffff;
                           border: none;
                           border-radius: 8px;
                           padding: 9px 20px;
                           font-size: 13.5px;
                           font-weight: 600;
                           cursor: pointer;
                           box-shadow: 0 1px 2px rgba(37,99,235,0.2);">

                Mark All as Read

            </button>

        </div>

    </div>


    <!-- =========================================================
         TOP FEATURED SECTION
         PINNED IMPORTANT + ANNOUNCEMENT PREFERENCES
    ========================================================== -->
    <div style="display: grid;
                grid-template-columns: 1.55fr 1fr;
                gap: 16px;
                margin-bottom: 20px;">

        <!-- =====================================================
             PINNED IMPORTANT
        ====================================================== -->
        <div class="card"
             style="background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                    padding: 20px;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- HEADER -->
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: flex-start;
                        margin-bottom: 16px;">

                <div>

                    <div style="font-size: 11px;
                                font-weight: 700;
                                color: #2563eb;
                                letter-spacing: 0.08em;
                                text-transform: uppercase;
                                margin-bottom: 5px;">
                        PINNED
                    </div>

                    <h2 style="font-size: 17px;
                               font-weight: 700;
                               color: #0f172a;
                               margin: 0;">
                        Important
                    </h2>

                </div>

                <span style="background: #fff1f2;
                             color: #dc2626;
                             font-size: 11px;
                             font-weight: 600;
                             padding: 7px 12px;
                             border-radius: 14px;">
                    1 requires action
                </span>

            </div>


            <!-- PINNED ANNOUNCEMENT -->
            <div style="background: linear-gradient(135deg, #f8faff 0%, #f5f3ff 100%);
                        border: 1px solid #dbe4ff;
                        border-radius: 12px;
                        padding: 16px;">

                <!-- TYPE + DATE -->
                <div style="display: flex;
                            align-items: center;
                            gap: 8px;
                            margin-bottom: 10px;">

                    <span style="background: #eff6ff;
                                 color: #2563eb;
                                 font-size: 11px;
                                 font-weight: 700;
                                 padding: 5px 10px;
                                 border-radius: 12px;">
                        Account Advisory
                    </span>

                    <span style="font-size: 11px;
                                 color: #94a3b8;">
                        Aug 19, 2026
                    </span>

                </div>


                <h3 style="font-size: 14px;
                           font-weight: 700;
                           color: #0f172a;
                           margin: 0 0 7px 0;">
                    Complete your ORDO Account Profile and Verification
                </h3>


                <p style="font-size: 12px;
                          line-height: 1.5;
                          color: #64748b;
                          margin: 0 0 12px 0;">
                    Your free full-access period is active. Complete your profile within
                    30 days to maintain eligible access and unlock your verification benefit.
                </p>


                <button type="button"
                        style="background: #2563eb;
                               color: #ffffff;
                               border: none;
                               border-radius: 7px;
                               padding: 8px 14px;
                               font-size: 12px;
                               font-weight: 600;
                               cursor: pointer;
                               box-shadow: 0 2px 5px rgba(37,99,235,0.2);">
                    Continue setup
                </button>

            </div>

        </div>


        <!-- =====================================================
             ANNOUNCEMENT PREFERENCES
        ====================================================== -->
        <div class="card"
             style="background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                    padding: 20px;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- HEADER -->
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 18px;">

                <h2 style="font-size: 15px;
                           font-weight: 700;
                           color: #0f172a;
                           margin: 0;">
                    Announcement preferences
                </h2>

                <button type="button"
                        style="background: #ffffff;
                               color: #0f172a;
                               border: 1px solid #e2e8f0;
                               border-radius: 8px;
                               padding: 7px 12px;
                               font-size: 11.5px;
                               font-weight: 600;
                               cursor: pointer;">
                    Manage
                </button>

            </div>


            <!-- CRITICAL CLIENT NOTICES -->
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: center;
                        padding-bottom: 16px;
                        border-bottom: 1px solid #e2e8f0;">

                <div style="padding-right: 15px;">

                    <div style="font-size: 12px;
                                font-weight: 700;
                                color: #0f172a;
                                margin-bottom: 5px;">
                        Critical client notices
                    </div>

                    <div style="font-size: 10.5px;
                                line-height: 1.5;
                                color: #94a3b8;">
                        Always shown in Town Hall and notification center.
                    </div>

                </div>


                <!-- TOGGLE -->
                <div style="width: 40px;
                            height: 24px;
                            background: #3b82f6;
                            border-radius: 20px;
                            position: relative;
                            flex-shrink: 0;">

                    <div style="width: 18px;
                                height: 18px;
                                background: #ffffff;
                                border-radius: 50%;
                                position: absolute;
                                right: 3px;
                                top: 3px;
                                box-shadow: 0 1px 3px rgba(0,0,0,0.15);">
                    </div>

                </div>

            </div>


            <!-- EMAIL COPIES -->
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: center;
                        padding-top: 16px;">

                <div style="padding-right: 15px;">

                    <div style="font-size: 12px;
                                font-weight: 700;
                                color: #0f172a;
                                margin-bottom: 5px;">
                        Email copies
                    </div>

                    <div style="font-size: 10.5px;
                                line-height: 1.5;
                                color: #94a3b8;">
                        Receive important JK&amp;C notices by email.
                    </div>

                </div>


                <!-- TOGGLE -->
                <div style="width: 40px;
                            height: 24px;
                            background: #3b82f6;
                            border-radius: 20px;
                            position: relative;
                            flex-shrink: 0;">

                    <div style="width: 18px;
                                height: 18px;
                                background: #ffffff;
                                border-radius: 50%;
                                position: absolute;
                                right: 3px;
                                top: 3px;
                                box-shadow: 0 1px 3px rgba(0,0,0,0.15);">
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================================================
         ALL ANNOUNCEMENTS
    ========================================================== -->
    <div class="card"
         style="background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

        <!-- SECTION HEADER -->
        <div style="display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    margin-bottom: 18px;">

            <div>

                <h2 style="font-size: 16px;
                           font-weight: 700;
                           color: #0f172a;
                           margin: 0 0 4px 0;">
                    All announcements
                </h2>

                <p style="font-size: 12.5px;
                          color: #64748b;
                          margin: 0;">
                    Formal communications remain searchable and traceable.
                </p>

            </div>


            <button type="button"
                    style="background: #ffffff;
                           color: #334155;
                           border: 1px solid #cbd5e1;
                           border-radius: 8px;
                           padding: 8px 14px;
                           font-size: 12px;
                           font-weight: 600;
                           cursor: pointer;">
                Search
            </button>

        </div>


        <!-- =====================================================
             ANNOUNCEMENT ITEM 1
        ====================================================== -->
        <div style="display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 15px;
                    padding: 12px 12px;
                    border: 1px solid #e2e8f0;
                    border-radius: 10px;
                    margin-bottom: 10px;
                    background: #ffffff;">

            <div style="display: flex;
                        align-items: center;
                        gap: 12px;
                        min-width: 0;
                        flex: 1;">

                <!-- ICON -->
                <div style="width: 34px;
                            height: 34px;
                            border-radius: 9px;
                            background: #f1f5f9;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            flex-shrink: 0;">

                    <svg width="17"
                         height="17"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="#64748b"
                         stroke-width="1.8"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M3 11v2a2 2 0 0 0 2 2h1l3 5h2l-2.5-5H13l6 3V6l-6 3H5a2 2 0 0 0-2 2z"></path>
                        <path d="M21 9.5a3 3 0 0 1 0 5"></path>
                    </svg>

                </div>


                <div style="min-width: 0;">

                    <div style="display: flex;
                                align-items: center;
                                gap: 8px;
                                margin-bottom: 5px;
                                flex-wrap: wrap;">

                        <span style="background: #eff6ff;
                                     color: #2563eb;
                                     font-size: 10px;
                                     font-weight: 700;
                                     padding: 5px 9px;
                                     border-radius: 12px;">
                            Memo
                        </span>

                        <span style="font-size: 10px;
                                     color: #94a3b8;">
                            MEMO-00022
                        </span>

                    </div>

                    <div style="font-size: 13px;
                                font-weight: 700;
                                color: #0f172a;
                                margin-bottom: 4px;">
                        August 2026 Holiday Advisory
                    </div>

                    <div style="font-size: 10.5px;
                                color: #94a3b8;">
                        From Mari Louise Chua · Aug 5, 2026
                    </div>

                </div>

            </div>


            <div style="display: flex;
                        align-items: center;
                        gap: 10px;
                        flex-shrink: 0;">

                <span style="background: #ecfdf5;
                             color: #059669;
                             font-size: 10.5px;
                             font-weight: 700;
                             padding: 6px 11px;
                             border-radius: 14px;">
                    Approved
                </span>

                <button type="button"
                        style="background: #ffffff;
                               color: #0f172a;
                               border: 1px solid #dbe2ea;
                               border-radius: 8px;
                               padding: 8px 12px;
                               font-size: 11.5px;
                               font-weight: 600;
                               cursor: pointer;">
                    View
                </button>

            </div>

        </div>


        <!-- =====================================================
             ANNOUNCEMENT ITEM 2
        ====================================================== -->
        <div style="display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 15px;
                    padding: 12px;
                    border: 1px solid #e2e8f0;
                    border-radius: 10px;
                    margin-bottom: 10px;
                    background: #ffffff;">

            <div style="display: flex;
                        align-items: center;
                        gap: 12px;
                        min-width: 0;
                        flex: 1;">

                <div style="width: 34px;
                            height: 34px;
                            border-radius: 9px;
                            background: #f1f5f9;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            flex-shrink: 0;">

                    <svg width="17"
                         height="17"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="#64748b"
                         stroke-width="1.8"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M3 11v2a2 2 0 0 0 2 2h1l3 5h2l-2.5-5H13l6 3V6l-6 3H5a2 2 0 0 0-2 2z"></path>
                        <path d="M21 9.5a3 3 0 0 1 0 5"></path>
                    </svg>

                </div>


                <div style="min-width: 0;">

                    <div style="display: flex;
                                align-items: center;
                                gap: 8px;
                                margin-bottom: 5px;
                                flex-wrap: wrap;">

                        <span style="background: #eff6ff;
                                     color: #2563eb;
                                     font-size: 10px;
                                     font-weight: 700;
                                     padding: 5px 9px;
                                     border-radius: 12px;">
                            Advisory
                        </span>

                        <span style="font-size: 10px;
                                     color: #94a3b8;">
                            ADV-00031
                        </span>

                    </div>

                    <div style="font-size: 13px;
                                font-weight: 700;
                                color: #0f172a;
                                margin-bottom: 4px;">
                        August compliance and filing reminders
                    </div>

                    <div style="font-size: 10.5px;
                                color: #94a3b8;">
                        From JK&amp;C Compliance Team · Aug 18, 2026
                    </div>

                </div>

            </div>


            <div style="display: flex;
                        align-items: center;
                        gap: 10px;
                        flex-shrink: 0;">

                <span style="background: #ecfdf5;
                             color: #059669;
                             font-size: 10.5px;
                             font-weight: 700;
                             padding: 6px 11px;
                             border-radius: 14px;">
                    Published
                </span>

                <button type="button"
                        style="background: #ffffff;
                               color: #0f172a;
                               border: 1px solid #dbe2ea;
                               border-radius: 8px;
                               padding: 8px 12px;
                               font-size: 11.5px;
                               font-weight: 600;
                               cursor: pointer;">
                    View
                </button>

            </div>

        </div>


        <!-- =====================================================
             ANNOUNCEMENT ITEM 3
        ====================================================== -->
        <div style="display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 15px;
                    padding: 12px;
                    border: 1px solid #e2e8f0;
                    border-radius: 10px;
                    margin-bottom: 10px;
                    background: #ffffff;">

            <div style="display: flex;
                        align-items: center;
                        gap: 12px;
                        min-width: 0;
                        flex: 1;">

                <div style="width: 34px;
                            height: 34px;
                            border-radius: 9px;
                            background: #f1f5f9;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            flex-shrink: 0;">

                    <svg width="17"
                         height="17"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="#64748b"
                         stroke-width="1.8"
                         stroke-linecap="round"
                         stroke-linejoin="round">

                        <path d="M3 11v2a2 2 0 0 0 2 2h1l3 5h2l-2.5-5H13l6 3V6l-6 3H5a2 2 0 0 0-2 2z"></path>
                        <path d="M21 9.5a3 3 0 0 1 0 5"></path>

                    </svg>

                </div>


                <div style="min-width: 0;">

                    <div style="display: flex;
                                align-items: center;
                                gap: 8px;
                                margin-bottom: 5px;
                                flex-wrap: wrap;">

                        <span style="background: #eff6ff;
                                     color: #2563eb;
                                     font-size: 10px;
                                     font-weight: 700;
                                     padding: 5px 9px;
                                     border-radius: 12px;">
                            System Update
                        </span>

                        <span style="font-size: 10px;
                                     color: #94a3b8;">
                            SYS-00009
                        </span>

                    </div>

                    <div style="font-size: 13px;
                                font-weight: 700;
                                color: #0f172a;
                                margin-bottom: 4px;">
                        ORDO client access and verification rollout
                    </div>

                    <div style="font-size: 10.5px;
                                color: #94a3b8;">
                        From ORDO · Aug 19, 2026
                    </div>

                </div>

            </div>


            <div style="display: flex;
                        align-items: center;
                        gap: 10px;
                        flex-shrink: 0;">

                <span style="background: #ecfdf5;
                             color: #059669;
                             font-size: 10.5px;
                             font-weight: 700;
                             padding: 6px 11px;
                             border-radius: 14px;">
                    Published
                </span>

                <button type="button"
                        style="background: #ffffff;
                               color: #0f172a;
                               border: 1px solid #dbe2ea;
                               border-radius: 8px;
                               padding: 8px 12px;
                               font-size: 11.5px;
                               font-weight: 600;
                               cursor: pointer;">
                    View
                </button>

            </div>

        </div>


        <!-- =====================================================
             ANNOUNCEMENT ITEM 4
        ====================================================== -->
        <div style="display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 15px;
                    padding: 12px;
                    border: 1px solid #e2e8f0;
                    border-radius: 10px;
                    background: #ffffff;">

            <div style="display: flex;
                        align-items: center;
                        gap: 12px;
                        min-width: 0;
                        flex: 1;">

                <div style="width: 34px;
                            height: 34px;
                            border-radius: 9px;
                            background: #f1f5f9;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            flex-shrink: 0;">

                    <svg width="17"
                         height="17"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="#64748b"
                         stroke-width="1.8"
                         stroke-linecap="round"
                         stroke-linejoin="round">

                        <path d="M3 11v2a2 2 0 0 0 2 2h1l3 5h2l-2.5-5H13l6 3V6l-6 3H5a2 2 0 0 0-2 2z"></path>
                        <path d="M21 9.5a3 3 0 0 1 0 5"></path>

                    </svg>

                </div>


                <div style="min-width: 0;">

                    <div style="display: flex;
                                align-items: center;
                                gap: 8px;
                                margin-bottom: 5px;
                                flex-wrap: wrap;">

                        <span style="background: #eff6ff;
                                     color: #2563eb;
                                     font-size: 10px;
                                     font-weight: 700;
                                     padding: 5px 9px;
                                     border-radius: 12px;">
                            Notice
                        </span>

                        <span style="font-size: 10px;
                                     color: #94a3b8;">
                            NOTICE-0017
                        </span>

                    </div>

                    <div style="font-size: 13px;
                                font-weight: 700;
                                color: #0f172a;
                                margin-bottom: 4px;">
                        Service availability and client support channels
                    </div>

                    <div style="font-size: 10.5px;
                                color: #94a3b8;">
                        From JK&amp;C Client Services · Aug 12, 2026
                    </div>

                </div>

            </div>


            <div style="display: flex;
                        align-items: center;
                        gap: 10px;
                        flex-shrink: 0;">

                <span style="background: #ecfdf5;
                             color: #059669;
                             font-size: 10.5px;
                             font-weight: 700;
                             padding: 6px 11px;
                             border-radius: 14px;">
                    Published
                </span>

                <button type="button"
                        style="background: #ffffff;
                               color: #0f172a;
                               border: 1px solid #dbe2ea;
                               border-radius: 8px;
                               padding: 8px 12px;
                               font-size: 11.5px;
                               font-weight: 600;
                               cursor: pointer;">
                    View
                </button>

            </div>

        </div>

    </div>


    <!-- =========================================================
         IMPORTANT NOTICES
    ========================================================== -->
    <div class="card"
         style="background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.02);
                margin-top: 20px;">

        <div style="margin-bottom: 18px;">

            <h2 style="font-size: 16px;
                       font-weight: 700;
                       color: #0f172a;
                       margin: 0 0 4px 0;">
                Important Notices
            </h2>

            <p style="font-size: 12.5px;
                      color: #64748b;
                      margin: 0;">
                Announcements that may require your attention.
            </p>

        </div>


        <!-- COMPLIANCE DEADLINE -->
        <div style="display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    gap: 15px;
                    padding: 16px;
                    background: #fffbe3;
                    border: 1px solid #fef08a;
                    border-radius: 8px;
                    margin-bottom: 12px;">

            <div>

                <strong style="font-size: 14px;
                               font-weight: 700;
                               color: #0f172a;
                               display: block;
                               margin-bottom: 4px;">
                    Compliance Deadline
                </strong>

                <p style="font-size: 12.5px;
                          color: #475569;
                          margin: 0;">
                    Review your organization's compliance status before the upcoming deadline.
                </p>

            </div>

            <span style="background: #fef3c7;
                         color: #b45309;
                         font-size: 12px;
                         font-weight: 600;
                         padding: 5px 12px;
                         border-radius: 12px;
                         flex-shrink: 0;">
                Review
            </span>

        </div>


        <!-- ACCOUNT VERIFICATION -->
        <div style="display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    gap: 15px;
                    padding: 16px;
                    background: #fff5f5;
                    border: 1px solid #fecaca;
                    border-radius: 8px;">

            <div>

                <strong style="font-size: 14px;
                               font-weight: 700;
                               color: #0f172a;
                               display: block;
                               margin-bottom: 4px;">
                    Account Verification
                </strong>

                <p style="font-size: 12.5px;
                          color: #475569;
                          margin: 0;">
                    Complete your organization verification to unlock additional portal features.
                </p>

            </div>

            <span style="background: #fee2e2;
                         color: #dc2626;
                         font-size: 12px;
                         font-weight: 600;
                         padding: 5px 12px;
                         border-radius: 12px;
                         flex-shrink: 0;">
                Action Required
            </span>

        </div>

    </div>


    <!-- =========================================================
         PROTOTYPE CONTROLS
    ========================================================== -->
    <div style="display: flex;
                justify-content: flex-end;
                margin-top: 12px;">

        <span style="background: #ffffff;
                     color: #64748b;
                     border: 1px solid #e2e8f0;
                     box-shadow: 0 2px 8px rgba(15,23,42,0.08);
                     font-size: 11px;
                     font-weight: 600;
                     padding: 8px 13px;
                     border-radius: 18px;">
            Prototype controls
        </span>

    </div>

</div>

@endsection
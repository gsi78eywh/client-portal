@extends('layouts.client')

@section('title', 'Engagements')

@section('header-title', 'Engagements')

@section('content')

<div class="engagements-container"
     style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}
    <div class="page-header"
         style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 26px;">

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
                Engagements
            </h1>

            <p class="page-description"
               style="font-size: 13.5px;
                      color: #64748b;
                      margin: 0;
                      line-height: 1.6;
                      max-width: 760px">
                Professional work you have engaged JK&amp;C to perform, from projects to recurring advisory services.
            </p>

        </div>


        {{-- TOP RIGHT ACTIONS --}}
        <div style="display: flex;
                    align-items: center;
                    gap: 10px;
                    margin-top: 2px;">

            <span class="status-badge"
                  style="background: #dcfce7;
                         color: #15803d;
                         font-size: 12px;
                         font-weight: 600;
                         padding: 7px 13px;
                         border-radius: 18px;
                         display: inline-flex;
                         align-items: center;
                         gap: 6px;">

                <span style="width: 6px;
                             height: 6px;
                             background: #22c55e;
                             border-radius: 50%;
                             display: inline-block;">
                </span>

                Completed
            </span>


            <button type="button"
                    style="background: #2563eb;
                           color: #ffffff;
                           border: none;
                           border-radius: 7px;
                           padding: 9px 16px;
                           font-size: 13px;
                           font-weight: 600;
                           cursor: pointer;
                           display: inline-flex;
                           align-items: center;
                           gap: 6px;
                           box-shadow: 0 1px 2px rgba(37, 99, 235, 0.18);">

                <span style="font-size: 16px;
                             line-height: 1;">
                    +
                </span>

                Request service

            </button>

        </div>

    </div>



    {{-- =========================================================
        ENGAGEMENT CARDS
    ========================================================== --}}
    <div style="display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 16px;
                margin-bottom: 24px;">


        {{-- =====================================================
            ENGAGEMENT 1
        ====================================================== --}}
        <div class="card"
             style="background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                    padding: 20px;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            {{-- Reference + Status --}}
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: flex-start;
                        gap: 10px;
                        margin-bottom: 14px;">

                <div style="font-size: 11px;
                            font-weight: 700;
                            color: #64748b;
                            letter-spacing: 0.04em;">
                    ENG-2026-0041
                </div>

                <span style="background: #eff6ff;
                             color: #2563eb;
                             font-size: 10.5px;
                             font-weight: 600;
                             padding: 4px 9px;
                             border-radius: 12px;
                             white-space: nowrap;">
                    In Progress
                </span>

            </div>


            {{-- Title --}}
            <h2 style="font-size: 15px;
                       font-weight: 700;
                       color: #0f172a;
                       line-height: 1.4;
                       margin: 0 0 14px 0;">
                SEC Amendment of Articles
            </h2>


            {{-- Current Stage --}}
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 7px;">

                <span style="font-size: 11px;
                             color: #64748b;
                             font-weight: 500;">
                    Current stage
                </span>

                <span style="font-size: 11px;
                             color: #334155;
                             font-weight: 600;">
                    Document Preparation
                </span>

            </div>


            {{-- Progress Bar --}}
            <div style="width: 100%;
                        height: 7px;
                        background: #e2e8f0;
                        border-radius: 10px;
                        overflow: hidden;
                        margin-bottom: 7px;">

                <div style="width: 65%;
                            height: 100%;
                            background: #2563eb;
                            border-radius: 10px;">
                </div>

            </div>


            {{-- Percentage --}}
            <div style="display: flex;
                        justify-content: flex-end;
                        margin-bottom: 17px;">

                <span style="font-size: 11px;
                             font-weight: 700;
                             color: #2563eb;">
                    65%
                </span>

            </div>


            {{-- Start Date --}}
            <div style="border-top: 1px solid #f1f5f9;
                        padding-top: 13px;
                        margin-bottom: 15px;">

                <div style="font-size: 10.5px;
                            color: #94a3b8;
                            margin-bottom: 3px;">
                    Started
                </div>

                <div style="font-size: 12px;
                            color: #475569;
                            font-weight: 600;">
                    July 15, 2026
                </div>

            </div>


            {{-- Button --}}
            <button type="button"
                    style="width: 100%;
                           background: #ffffff;
                           color: #2563eb;
                           border: 1px solid #bfdbfe;
                           border-radius: 7px;
                           padding: 8px 12px;
                           font-size: 12px;
                           font-weight: 600;
                           cursor: pointer;">
                Open engagement
            </button>

        </div>



        {{-- =====================================================
            ENGAGEMENT 2
        ====================================================== --}}
        <div class="card"
             style="background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                    padding: 20px;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            {{-- Reference + Status --}}
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: flex-start;
                        gap: 10px;
                        margin-bottom: 14px;">

                <div style="font-size: 11px;
                            font-weight: 700;
                            color: #64748b;
                            letter-spacing: 0.04em;">
                    ENG-2026-0032
                </div>

                <span style="background: #dcfce7;
                             color: #15803d;
                             font-size: 10.5px;
                             font-weight: 600;
                             padding: 4px 9px;
                             border-radius: 12px;
                             white-space: nowrap;">
                    Active
                </span>

            </div>


            {{-- Title --}}
            <h2 style="font-size: 15px;
                       font-weight: 700;
                       color: #0f172a;
                       line-height: 1.4;
                       margin: 0 0 14px 0;">
                Corporate Secretary Retainer
            </h2>


            {{-- Current Stage --}}
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 7px;">

                <span style="font-size: 11px;
                             color: #64748b;
                             font-weight: 500;">
                    Current stage
                </span>

                <span style="font-size: 11px;
                             color: #334155;
                             font-weight: 600;">
                    Ongoing Advisory
                </span>

            </div>


            {{-- Progress Bar --}}
            <div style="width: 100%;
                        height: 7px;
                        background: #e2e8f0;
                        border-radius: 10px;
                        overflow: hidden;
                        margin-bottom: 7px;">

                <div style="width: 80%;
                            height: 100%;
                            background: #2563eb;
                            border-radius: 10px;">
                </div>

            </div>


            {{-- Percentage --}}
            <div style="display: flex;
                        justify-content: flex-end;
                        margin-bottom: 17px;">

                <span style="font-size: 11px;
                             font-weight: 700;
                             color: #2563eb;">
                    80%
                </span>

            </div>


            {{-- Start Date --}}
            <div style="border-top: 1px solid #f1f5f9;
                        padding-top: 13px;
                        margin-bottom: 15px;">

                <div style="font-size: 10.5px;
                            color: #94a3b8;
                            margin-bottom: 3px;">
                    Started
                </div>

                <div style="font-size: 12px;
                            color: #475569;
                            font-weight: 600;">
                    June 01, 2026
                </div>

            </div>


            {{-- Button --}}
            <button type="button"
                    style="width: 100%;
                           background: #ffffff;
                           color: #2563eb;
                           border: 1px solid #bfdbfe;
                           border-radius: 7px;
                           padding: 8px 12px;
                           font-size: 12px;
                           font-weight: 600;
                           cursor: pointer;">
                Open engagement
            </button>

        </div>



        {{-- =====================================================
            ENGAGEMENT 3
        ====================================================== --}}
        <div class="card"
             style="background: #ffffff;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                    padding: 20px;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            {{-- Reference + Status --}}
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: flex-start;
                        gap: 10px;
                        margin-bottom: 14px;">

                <div style="font-size: 11px;
                            font-weight: 700;
                            color: #64748b;
                            letter-spacing: 0.04em;">
                    ENG-2026-0028
                </div>

                <span style="background: #dcfce7;
                             color: #15803d;
                             font-size: 10.5px;
                             font-weight: 600;
                             padding: 4px 9px;
                             border-radius: 12px;
                             white-space: nowrap;">
                    Completed
                </span>

            </div>


            {{-- Title --}}
            <h2 style="font-size: 15px;
                       font-weight: 700;
                       color: #0f172a;
                       line-height: 1.4;
                       margin: 0 0 14px 0;">
                BIR Registration Assistance
            </h2>


            {{-- Current Stage --}}
            <div style="display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 7px;">

                <span style="font-size: 11px;
                             color: #64748b;
                             font-weight: 500;">
                    Current stage
                </span>

                <span style="font-size: 11px;
                             color: #334155;
                             font-weight: 600;">
                    Completed
                </span>

            </div>


            {{-- Progress Bar --}}
            <div style="width: 100%;
                        height: 7px;
                        background: #e2e8f0;
                        border-radius: 10px;
                        overflow: hidden;
                        margin-bottom: 7px;">

                <div style="width: 100%;
                            height: 100%;
                            background: #2563eb;
                            border-radius: 10px;">
                </div>

            </div>


            {{-- Percentage --}}
            <div style="display: flex;
                        justify-content: flex-end;
                        margin-bottom: 17px;">

                <span style="font-size: 11px;
                             font-weight: 700;
                             color: #2563eb;">
                    100%
                </span>

            </div>


            {{-- Start Date --}}
            <div style="border-top: 1px solid #f1f5f9;
                        padding-top: 13px;
                        margin-bottom: 15px;">

                <div style="font-size: 10.5px;
                            color: #94a3b8;
                            margin-bottom: 3px;">
                    Started
                </div>

                <div style="font-size: 12px;
                            color: #475569;
                            font-weight: 600;">
                    May 20, 2026
                </div>

            </div>


            {{-- Button --}}
            <button type="button"
                    style="width: 100%;
                           background: #ffffff;
                           color: #2563eb;
                           border: 1px solid #bfdbfe;
                           border-radius: 7px;
                           padding: 8px 12px;
                           font-size: 12px;
                           font-weight: 600;
                           cursor: pointer;">
                Open engagement
            </button>

        </div>

    </div>



    {{-- =========================================================
        ENGAGEMENT ACTIVITY
    ========================================================== --}}
    <div class="card"
         style="background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 24px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.02);">


        {{-- Section Header --}}
        <div style="display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    margin-bottom: 20px;">

            <div>

                <h2 style="font-size: 16px;
                           font-weight: 700;
                           color: #0f172a;
                           margin: 0 0 5px 0;">
                    Engagement activity
                </h2>

                <p style="font-size: 13px;
                          color: #64748b;
                          margin: 0;
                          line-height: 1.45;">
                    Client-visible milestones only. JK&amp;C internal tasks stay private.
                </p>

            </div>


            <button type="button"
                    style="background: #ffffff;
                           color: #334155;
                           border: 1px solid #cbd5e1;
                           border-radius: 7px;
                           padding: 8px 14px;
                           font-size: 12px;
                           font-weight: 600;
                           cursor: pointer;
                           display: inline-flex;
                           align-items: center;
                           gap: 6px;">

                <svg width="14"
                     height="14"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="#2563eb"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                     aria-hidden="true">

                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>

                    <polyline points="14 2 14 8 20 8"></polyline>

                    <line x1="8" y1="13" x2="16" y2="13"></line>

                    <line x1="8" y1="17" x2="14" y2="17"></line>

                </svg>

                Activity &amp; Reports

            </button>

        </div>



        {{-- Activity Table --}}
        <div style="overflow-x: auto;">

            <table style="width: 100%;
                          border-collapse: separate;
                          border-spacing: 0;
                          text-align: left;">

                <thead>

                    <tr style="background: #f8fafc;">

                        <th style="padding: 12px 14px;
                                   font-size: 10.5px;
                                   font-weight: 700;
                                   color: #64748b;
                                   text-transform: uppercase;
                                   letter-spacing: 0.03em;
                                   border-top: 1px solid #e2e8f0;
                                   border-bottom: 1px solid #e2e8f0;
                                   border-radius: 6px 0 0 6px;">
                            Reference
                        </th>

                        <th style="padding: 12px 14px;
                                   font-size: 10.5px;
                                   font-weight: 700;
                                   color: #64748b;
                                   text-transform: uppercase;
                                   letter-spacing: 0.03em;
                                   border-top: 1px solid #e2e8f0;
                                   border-bottom: 1px solid #e2e8f0;">
                            Item
                        </th>

                        <th style="padding: 12px 14px;
                                   font-size: 10.5px;
                                   font-weight: 700;
                                   color: #64748b;
                                   text-transform: uppercase;
                                   letter-spacing: 0.03em;
                                   border-top: 1px solid #e2e8f0;
                                   border-bottom: 1px solid #e2e8f0;">
                            Category / Type
                        </th>

                        <th style="padding: 12px 14px;
                                   font-size: 10.5px;
                                   font-weight: 700;
                                   color: #64748b;
                                   text-transform: uppercase;
                                   letter-spacing: 0.03em;
                                   border-top: 1px solid #e2e8f0;
                                   border-bottom: 1px solid #e2e8f0;">
                            Status / Date
                        </th>

                        <th style="padding: 12px 14px;
                                   font-size: 10.5px;
                                   font-weight: 700;
                                   color: #64748b;
                                   text-transform: uppercase;
                                   letter-spacing: 0.03em;
                                   text-align: right;
                                   border-top: 1px solid #e2e8f0;
                                   border-bottom: 1px solid #e2e8f0;
                                   border-radius: 0 6px 6px 0;">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody style="font-size: 13px;
                              color: #334155;">


                    {{-- Activity 1 --}}
                    <tr>

                        <td style="padding: 15px 14px;
                                   font-weight: 600;
                                   color: #0f172a;
                                   border-bottom: 1px solid #f1f5f9;">
                            ACT-2026-014
                        </td>

                        <td style="padding: 15px 14px;
                                   border-bottom: 1px solid #f1f5f9;">

                            <div style="font-weight: 600;
                                        color: #1e293b;
                                        margin-bottom: 3px;">
                                Draft Articles Submitted
                            </div>

                            <div style="font-size: 11px;
                                        color: #94a3b8;">
                                SEC Amendment of Articles
                            </div>

                        </td>

                        <td style="padding: 15px 14px;
                                   color: #64748b;
                                   border-bottom: 1px solid #f1f5f9;">
                            Milestone
                        </td>

                        <td style="padding: 15px 14px;
                                   border-bottom: 1px solid #f1f5f9;">

                            <span style="display: inline-flex;
                                         background: #dcfce7;
                                         color: #15803d;
                                         padding: 4px 9px;
                                         border-radius: 11px;
                                         font-size: 10.5px;
                                         font-weight: 600;
                                         margin-bottom: 4px;">
                                Completed
                            </span>

                            <div style="font-size: 11px;
                                        color: #94a3b8;">
                                August 18, 2026
                            </div>

                        </td>

                        <td style="padding: 15px 14px;
                                   text-align: right;
                                   border-bottom: 1px solid #f1f5f9;">

                            <button type="button"
                                    style="background: #ffffff;
                                           color: #2563eb;
                                           border: 1px solid #bfdbfe;
                                           border-radius: 6px;
                                           padding: 6px 12px;
                                           font-size: 11.5px;
                                           font-weight: 600;
                                           cursor: pointer;">
                                View
                            </button>

                        </td>

                    </tr>



                    {{-- Activity 2 --}}
                    <tr>

                        <td style="padding: 15px 14px;
                                   font-weight: 600;
                                   color: #0f172a;
                                   border-bottom: 1px solid #f1f5f9;">
                            ACT-2026-011
                        </td>

                        <td style="padding: 15px 14px;
                                   border-bottom: 1px solid #f1f5f9;">

                            <div style="font-weight: 600;
                                        color: #1e293b;
                                        margin-bottom: 3px;">
                                Secretary Certificate Prepared
                            </div>

                            <div style="font-size: 11px;
                                        color: #94a3b8;">
                                Corporate Secretary Retainer
                            </div>

                        </td>

                        <td style="padding: 15px 14px;
                                   color: #64748b;
                                   border-bottom: 1px solid #f1f5f9;">
                            Deliverable
                        </td>

                        <td style="padding: 15px 14px;
                                   border-bottom: 1px solid #f1f5f9;">

                            <span style="display: inline-flex;
                                         background: #eff6ff;
                                         color: #1d4ed8;
                                         padding: 4px 9px;
                                         border-radius: 11px;
                                         font-size: 10.5px;
                                         font-weight: 600;
                                         margin-bottom: 4px;">
                                In Progress
                            </span>

                            <div style="font-size: 11px;
                                        color: #94a3b8;">
                                August 16, 2026
                            </div>

                        </td>

                        <td style="padding: 15px 14px;
                                   text-align: right;
                                   border-bottom: 1px solid #f1f5f9;">

                            <button type="button"
                                    style="background: #ffffff;
                                           color: #2563eb;
                                           border: 1px solid #bfdbfe;
                                           border-radius: 6px;
                                           padding: 6px 12px;
                                           font-size: 11.5px;
                                           font-weight: 600;
                                           cursor: pointer;">
                                View
                            </button>

                        </td>

                    </tr>



                    {{-- Activity 3 --}}
                    <tr>

                        <td style="padding: 15px 14px;
                                   font-weight: 600;
                                   color: #0f172a;
                                   border-bottom: 1px solid #f1f5f9;">
                            ACT-2026-009
                        </td>

                        <td style="padding: 15px 14px;
                                   border-bottom: 1px solid #f1f5f9;">

                            <div style="font-weight: 600;
                                        color: #1e293b;
                                        margin-bottom: 3px;">
                                BIR Registration Completed
                            </div>

                            <div style="font-size: 11px;
                                        color: #94a3b8;">
                                BIR Registration Assistance
                            </div>

                        </td>

                        <td style="padding: 15px 14px;
                                   color: #64748b;
                                   border-bottom: 1px solid #f1f5f9;">
                            Milestone
                        </td>

                        <td style="padding: 15px 14px;
                                   border-bottom: 1px solid #f1f5f9;">

                            <span style="display: inline-flex;
                                         background: #dcfce7;
                                         color: #15803d;
                                         padding: 4px 9px;
                                         border-radius: 11px;
                                         font-size: 10.5px;
                                         font-weight: 600;
                                         margin-bottom: 4px;">
                                Completed
                            </span>

                            <div style="font-size: 11px;
                                        color: #94a3b8;">
                                August 12, 2026
                            </div>

                        </td>

                        <td style="padding: 15px 14px;
                                   text-align: right;
                                   border-bottom: 1px solid #f1f5f9;">

                            <button type="button"
                                    style="background: #ffffff;
                                           color: #2563eb;
                                           border: 1px solid #bfdbfe;
                                           border-radius: 6px;
                                           padding: 6px 12px;
                                           font-size: 11.5px;
                                           font-weight: 600;
                                           cursor: pointer;">
                                View
                            </button>

                        </td>

                    </tr>



                    {{-- Activity 4 --}}
                    <tr>

                        <td style="padding: 15px 14px;
                                   font-weight: 600;
                                   color: #0f172a;">
                            ACT-2026-006
                        </td>

                        <td style="padding: 15px 14px;">

                            <div style="font-weight: 600;
                                        color: #1e293b;
                                        margin-bottom: 3px;">
                                Documents Under Review
                            </div>

                            <div style="font-size: 11px;
                                        color: #94a3b8;">
                                SEC Amendment of Articles
                            </div>

                        </td>

                        <td style="padding: 15px 14px;
                                   color: #64748b;">
                            Review
                        </td>

                        <td style="padding: 15px 14px;">

                            <span style="display: inline-flex;
                                         background: #fef3c7;
                                         color: #b45309;
                                         padding: 4px 9px;
                                         border-radius: 11px;
                                         font-size: 10.5px;
                                         font-weight: 600;
                                         margin-bottom: 4px;">
                                Review
                            </span>

                            <div style="font-size: 11px;
                                        color: #94a3b8;">
                                August 10, 2026
                            </div>

                        </td>

                        <td style="padding: 15px 14px;
                                   text-align: right;">

                            <button type="button"
                                    style="background: #ffffff;
                                           color: #2563eb;
                                           border: 1px solid #bfdbfe;
                                           border-radius: 6px;
                                           padding: 6px 12px;
                                           font-size: 11.5px;
                                           font-weight: 600;
                                           cursor: pointer;">
                                View
                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- =============================================================
    RESPONSIVE STYLES
============================================================= --}}
<style>

    @media (max-width: 1000px) {

        .engagements-container > div:nth-child(2) {
            grid-template-columns: 1fr !important;
        }

    }


    @media (max-width: 760px) {

        .page-header {
            flex-direction: column !important;
            gap: 16px;
        }

        .page-header > div:last-child {
            width: 100%;
        }

        .page-header > div:last-child button {
            flex: 1;
            justify-content: center;
        }

        .engagements-container > div:nth-child(2) {
            grid-template-columns: 1fr !important;
        }

    }


    @media (max-width: 560px) {

        .engagements-container {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .page-title {
            font-size: 23px !important;
        }

        .page-header > div:last-child {
            flex-direction: column;
            align-items: stretch !important;
        }

        .page-header > div:last-child button {
            width: 100%;
        }

    }

</style>

@endsection
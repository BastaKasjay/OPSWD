@extends('layouts.app')

@section('title', 'AICS Quarterly Reports')

@section('head')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'mint-green': {
                            50: '#F8FCFA',
                            100: '#EEF6F0',
                            200: '#DDEEE1',
                            300: '#CDE5D3',
                            400: '#BCE0C5',
                            500: '#aee0c1',
                            600: '#9CD1B5',
                            700: '#89C0A3',
                            800: '#76AE91',
                            900: '#639D7F',
                            DEFAULT: '#aee0c1',
                        },
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body, html {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden !important;
            height: 100vh;
            max-height: 100vh;
        }
        /* Override layout styles */
        .flex-1 {
            overflow: hidden !important;
        }
        /* Hide scrollbars completely */
        ::-webkit-scrollbar {
            display: none;
        }
        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .main-container {
            height: 100vh;
            max-height: 100vh;
            overflow: hidden !important;
            display: flex;
            flex-direction: column;
        }
        /* Ensure proper layout flow */
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .table-container {
            flex: 1;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .table-wrapper {
            flex: 1;
            overflow-y: auto;
        }
        .pagination-container {
            flex-shrink: 0;
            position: sticky;
            bottom: 0;
            background: #f3f4f6;
            z-index: 10;
        }
    </style>
@endsection

@section('content')
<div class="main-container w-full bg-gray-100">
    <!-- Main Content -->
    <main class="w-full p-3 content-wrapper">
        <div class="mb-6 mt-6">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">AICS Quarterly Reports</h1>
            
            <!-- Filter Section -->
            <form method="GET" action="{{ route('reports.index') }}" class="flex flex-col md:flex-row items-center justify-between space-y-2 md:space-y-0">
                <div class="flex w-full md:w-auto gap-2">
                    <select class="form-control border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-mint-green-500" name="quarter" onchange="this.form.submit()">
                        <option value="">All Quarters</option>
                        <option value="Q1" {{ request('quarter') == 'Q1' ? 'selected' : '' }}>Q1</option>
                        <option value="Q2" {{ request('quarter') == 'Q2' ? 'selected' : '' }}>Q2</option>
                        <option value="Q3" {{ request('quarter') == 'Q3' ? 'selected' : '' }}>Q3</option>
                        <option value="Q4" {{ request('quarter') == 'Q4' ? 'selected' : '' }}>Q4</option>
                    </select>
                    <select class="form-control border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-mint-green-500" name="year" onchange="this.form.submit()">
                        @for($year = date('Y'); $year >= 2022; $year--)
                            <option value="{{ $year }}" {{ request('year', date('Y')) == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </form>
        </div>

        <!-- Reports Table -->
        <div class="bg-white p-3 rounded-lg shadow-md w-full table-container">
            <div class="table-wrapper">
                <table class="w-full border-collapse bg-white rounded-lg overflow-hidden shadow-sm">
                    <thead class="bg-mint-green-200 sticky top-0">
                        <tr>
                            <th rowspan="2" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">No.</th>
                            <th rowspan="2" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Municipality</th>
                            <th colspan="2" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase"># of Served Clients</th>
                            <th colspan="5" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Case/s</th>
                            <th colspan="3" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Source of Funds</th>
                            <th rowspan="2" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Medical</th>
                            <th rowspan="2" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Burial</th>
                            <th rowspan="2" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Amount</th>
                            <th rowspan="2" class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase"># of Unreserved</th>
                        </tr>
                        <tr>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Male</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Female</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">CKD</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Cancer</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Heart Illness</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Diabetes & Hypertension</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Others</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Regular</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">Senior Citizen</th>
                            <th class="border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 uppercase">PDRRM</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse($reportData as $index => $data)
                            <tr class="hover:bg-mint-green-50 transition">
                                <td class="border border-gray-300 px-3 py-2 text-sm">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm">{{ $data['municipality'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['male_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['female_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['ckd_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['cancer_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['heart_illness_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['diabetes_hypertension_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['others_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-right">{{ number_format($data['regular_funds']) }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-right">{{ number_format($data['senior_citizen_funds']) }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-right">{{ number_format($data['pdrrm_funds']) }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['medical_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['burial_count'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-right">₱{{ number_format($data['total_amount'], 2) }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm text-center">{{ $data['unreserved_count'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="16" class="border border-gray-300 px-3 py-4 text-center text-gray-500">No data available for the selected period</td>
                            </tr>
                        @endforelse
                    </tbody>
                    @if(count($reportData) > 0)
                        <tfoot>
                            <tr class="bg-mint-green-100 font-semibold">
                                <td colspan="2" class="border border-gray-300 px-3 py-2 text-sm font-bold">TOTAL</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['male_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['female_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['ckd_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['cancer_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['heart_illness_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['diabetes_hypertension_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['others_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-right">{{ number_format($totals['regular_funds_total']) }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-right">{{ number_format($totals['senior_citizen_funds_total']) }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-right">{{ number_format($totals['pdrrm_funds_total']) }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['medical_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['burial_total'] }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-right">₱{{ number_format($totals['amount_total'], 2) }}</td>
                                <td class="border border-gray-300 px-3 py-2 text-sm font-bold text-center">{{ $totals['unreserved_total'] }}</td>
                            </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </main>
</div>
@endsection

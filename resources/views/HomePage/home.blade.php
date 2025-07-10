@extends('layouts.app')

@section('content')
<div class="p-8 w-full">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <button class="bg-white border border-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg shadow-sm hover:bg-gray-50 transition-colors duration-200 flex items-center">
            <i class="fas fa-eye mr-2 text-sm"></i>
            ALL
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
        </button>
    </div>

    <!-- Top Metric Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-purple-card text-white p-6 rounded-lg shadow-md flex flex-col justify-between">
            <p class="text-lg font-medium mb-2">Payouts</p>
            <p class="text-5xl font-bold">6</p>
        </div>
        <div class="bg-orange-card text-white p-6 rounded-lg shadow-md flex flex-col justify-between">
            <p class="text-lg font-medium mb-2">Total Clients</p>
            <p class="text-5xl font-bold">1,207</p>
        </div>
        <div class="bg-green-card text-white p-6 rounded-lg shadow-md flex flex-col justify-between">
            <p class="text-lg font-medium mb-2">Disbursed Amount</p>
            <p class="text-5xl font-bold">₱84,000</p>
        </div>
        <div class="bg-red-card text-white p-6 rounded-lg shadow-md flex flex-col justify-between">
            <p class="text-lg font-medium mb-2">Total Accomplishment Rate</p>
            <p class="text-5xl font-bold">3.64 %</p>
        </div>
    </div>

    <!-- Served Clients and Upcoming Payouts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
        <!-- Served Clients Card -->
        <div class="bg-white p-1 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-gray-800 mb-1">SERVED CLIENTS</h2>
            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start gap-2">
                <div style="width:80px;min-width:80px;flex-shrink:0;">
                    <div style="width:80px;height:80px;border-radius:50%;background:conic-gradient(#FF8C00 0% 40%,#FFD700 40% 60%,#00CED1 60% 75%,#FF6347 75% 85%,#6A5ACD 85% 95%,#3CB371 95% 100%);display:flex;align-items:center;justify-content:center;">
                        <div style="width:50px;height:50px;background:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.2rem;font-weight:600;color:#333;">
                            43
                        </div>
                    </div>
                </div>
                <div class="flex flex-col space-y-0.5 text-xs text-gray-700">
                    <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-orange-500 mr-1.5"></span>Medical Assistance</div>
                    <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-yellow-500 mr-1.5"></span>Funeral</div>
                    <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-teal-500 mr-1.5"></span>Educational Assistance</div>
                    <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-red-500 mr-1.5"></span>Transportation</div>
                </div>
            </div>
        </div>
        <!-- Upcoming Payouts Card -->
        <div class="bg-white p-1 rounded-lg shadow-md lg:col-span-3">
            <h2 class="text-lg font-semibold text-gray-800 mb-1">UPCOMING PAYOUTS</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-1.5 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">Schedule</th>
                        <th scope="col" class="px-1.5 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payout Code</th>
                        <th scope="col" class="px-1.5 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payout Name</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">Dec. 24, 2024 - Dec. 25, 2024</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">AKAP-12252024</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">CONGOS ANBELIBABOL PAYOUT</td>
                    </tr>
                    <tr>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">Dec. 24, 2024 - Dec. 26, 2024</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">SAMP</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">STEPH SAMPLE</td>
                    </tr>
                    <tr>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">Dec. 16, 2024 - Dec. 18, 2024</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">MIKETTETINGPAYOUT</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">MIKE TESTING PAYOUT</td>
                    </tr>
                    <tr>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">Dec. 16, 2024 - Dec. 19, 2024</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">AKAP-CL (ITOGON-FA)</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">ITOGON PAY-OUT</td>
                    </tr>
                    <tr>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">Dec. 24, 2024 - Dec. 26, 2024</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">KAPANGAN</td>
                        <td class="px-1.5 py-1 whitespace-nowrap text-xs text-gray-900">KAPANGAN PAYOUT</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

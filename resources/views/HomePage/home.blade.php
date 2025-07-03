<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'mint-green': {
                            50: '#F8FCFA',    /* Very light shade */
                            100: '#EEF6F0',    /* Lighter shade */
                            200: '#DDEEE1',    /* Lighter shade */
                            300: '#CDE5D3',    /* Slightly lighter shade */
                            400: '#BCE0C5',    /* Close to default, slightly lighter */
                            500: '#aee0c1',    /* The requested default color code */
                            600: '#9CD1B5',    /* Slightly darker shade */
                            700: '#89C0A3',    /* Darker shade */
                            800: '#76AE91',    /* Even darker shade */
                            900: '#639D7F',    /* Darkest shade */
                            DEFAULT: '#aee0c1', /* Ensure DEFAULT points to the main color */
                        },
                        'purple-card': '#6B46C1', /* Custom color for Payouts card */
                        'orange-card': '#ED8936', /* Custom color for Total Clients card */
                        'green-card': '#38A169',  /* Custom color for Disbursed Amount card */
                        'red-card': '#E53E3E',    /* Custom color for Total Accomplishment Rate card */
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            min-height: 100vh;
            overflow: hidden; /* Prevent body scrollbar */
        }
        main {
            flex-grow: 1; /* Allow main content to grow and take available space */
            overflow-y: auto; /* Enable scrolling within main if content overflows it */
        }
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Styles for the donut chart */
        .donut-chart-container {
            position: relative;
            width: 80px; /* Further reduced size */
            height: 80px; /* Further reduced size */
            border-radius: 50%;
            background: conic-gradient(
                #FF8C00 0% 40%, /* Orange */
                #FFD700 40% 60%, /* Gold */
                #00CED1 60% 75%, /* Dark Turquoise */
                #FF6347 75% 85%, /* Tomato */
                #6A5ACD 85% 95%, /* Slate Blue */
                #3CB371 95% 100% /* Medium Sea Green */
            );
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .donut-chart-inner {
            width: 50px; /* Further reduced inner circle size */
            height: 50px; /* Further reduced inner circle size */
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem; /* Further reduced font size */
            font-weight: 600;
            color: #333;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-mint-green-900 text-white flex flex-col p-4 shadow-lg rounded-r-lg">
        <div class="flex items-center justify-center mb-8">
            <div class="bg-mint-green-800 p-4 rounded-full">
                <!-- Placeholder for logo/icon -->
                <svg class="w-12 h-12 text-mint-green-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                </svg>
            </div>
        </div>

        <nav class="flex-grow">
            <ul>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg bg-mint-green-700 text-mint-green-100 font-semibold shadow-inner">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                </li>
                 <li class="mb-2">
                    <a href="{{ url('/clients') }}" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-users mr-3"></i>
                        Client Management
                    </a>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-hand-holding-usd mr-3"></i>
                        Sytsem Management
                    </a>
                </li>
               
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-user-cog mr-3"></i>
                        User Management
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-book-open mr-3"></i>
                        Libraries
                    </a>
                </li>
                
               
            </ul>
        </nav>

          <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-mint-green-400">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Log out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8 overflow-auto">
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

        <!-- Served Clients and Upcoming Payouts Section - Now horizontal again -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <!-- Served Clients Card -->
            <div class="bg-white p-1 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold text-gray-800 mb-1">SERVED CLIENTS</h2>
                <div class="flex flex-col md:flex-row items-center justify-center md:justify-start gap-2">
                    <div class="donut-chart-container flex-shrink-0">
                        <div class="donut-chart-inner">43</div>
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
            <div class="bg-white p-1 rounded-lg shadow-md lg:col-span-3"> <!-- Maximize width, remove overflow-x-auto -->
                <h2 class="text-lg font-semibold text-gray-800 mb-1">UPCOMING PAYOUTS</h2>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-1.5 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">Schedule</th>
                            <th scope="col" class="px-1.5 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payout Code</th>
                            <th scope="col" class="px-1.5 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payout Name</th>
                            <!-- Removed Venue column -->
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
    </main>

</body>
</html>
</html>

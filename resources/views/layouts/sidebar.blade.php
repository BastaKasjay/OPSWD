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
                <a href="{{ route('home') }}" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('clients.index') }}" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                    <i class="fas fa-users mr-3"></i>
                    Client Management
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('assistance.index') }}" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                    <i class="fas fa-hand-holding-usd mr-3"></i>
                   Assitance Management
                </a>
            </li>
            <li class="mb-2">
             <a href="{{ route('users.index') }}"class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                    <i class="fas fa-user-cog mr-3"></i>
                    User Management
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('reports.index') }}" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                    <i class="fas fa-chart-bar mr-3"></i>
                    Reports
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

  
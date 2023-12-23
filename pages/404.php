<?php include "./layout/header.php"; ?>
    <div class="dark:bg-slate-800 flex items-center justify-center min-h-screen">
        <div class="max-w-[50rem] flex flex-col mx-auto w-full h-full">
            <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
                <h1 class="block text-7xl font-bold text-gray-800 sm:text-9xl dark:text-white">404</h1>
                <h1 class="block text-2xl font-bold text-white"></h1>
                <p class="mt-3 text-gray-600 dark:text-gray-400">Oops, something went wrong.</p>
                <p class="text-gray-600 dark:text-gray-400">Sorry, we couldn't find your page.</p>
                <a class="w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/">
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                    Back to home
                </a>
            </div>
        </div>
    </div>
<?php include "./layout/footer.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Sidebar -->
<div class="flex flex-no-wrap">
    <div class="w-64 bg-blue-900 text-white min-h-screen p-4">
        <div class="text-2xl font-bold mb-6">
            My Dashboard
        </div>
        <nav>
            <ul class="space-y-4">
                <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">Overview</a></li>
                <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">Analytics</a></li>
                <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">Reports</a></li>
                <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">Student</a></li>
                <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">Staff</a></li>
                <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">Courses</a></li>
                <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">Departments</a></li>
                <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">Settings</a></li>

            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="w-full">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="container mx-auto flex justify-between items-center p-6">
                <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
                <div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Logout</button>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="container mx-auto mt-6 p-6">
            <!-- Table Section -->
            <section class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Data Table</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 bg-blue-900 text-white">ID</th>
                            <th class="py-2 px-4 bg-blue-900 text-white">Name</th>
                            <th class="py-2 px-4 bg-blue-900 text-white">Email</th>
                            <th class="py-2 px-4 bg-blue-900 text-white">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-b">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">Joseph Doe</td>
                            <td class="py-2 px-4">john@example.com</td>
                            <td class="py-2 px-4">Admin</td>
                        </tr>
                        <tr class="bg-gray-100 border-b">
                            <td class="py-2 px-4">2</td>
                            <td class="py-2 px-4">Jane Smith</td>
                            <td class="py-2 px-4">jane@example.com</td>
                            <td class="py-2 px-4">Editor</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4">3</td>
                            <td class="py-2 px-4">Sam Johnson</td>
                            <td class="py-2 px-4">sam@example.com</td>
                            <td class="py-2 px-4">Viewer</td>
                        </tr>
                        <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</div>

</body>
</html>

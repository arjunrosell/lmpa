@include('layouts.staff')
<x-page-title>Staff Report Dashboard</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    <div class="container m-10 mx-auto p-5">
        <form
            method="POST"
            action="{{ route('staff.reports.generate') }}"
            class="space-y-5"
        >
            @csrf
            <div>
                <label for="report_type" class="block font-bold text-gray-700">
                    Report Type
                </label>
                <select
                    id="report_type"
                    name="report_type"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                >
                    <option value="">Select a Report</option>
                    <option value="products">Products</option>
                    <option value="sales">Sales</option>
                    <option value="suppliers">Suppliers</option>
                    <option value="categories">Categories</option>
                    <option value="brands">Brands</option>
                    <option value="users">Users</option>
                </select>
            </div>
            <div>
                <label for="start_date" class="block font-bold text-gray-700">
                    Start Date
                </label>
                <input
                    type="date"
                    id="start_date"
                    name="start_date"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                />
            </div>
            <div>
                <label for="end_date" class="block font-bold text-gray-700">
                    End Date
                </label>
                <input
                    type="date"
                    id="end_date"
                    name="end_date"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                />
            </div>
            <button
                type="submit"
                class="rounded-md bg-blue-600 px-4 py-2 text-white shadow hover:bg-blue-700"
            >
                Generate Report
            </button>
        </form>
    </div>
</x-forms.container>

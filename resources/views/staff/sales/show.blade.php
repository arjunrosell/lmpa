@include('layouts.staff')
<x-page-title>Sale ID #{{ $sale->id }}</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    @if ($sale)
        <div>
            <div
                class="mx-auto bg-white px-2 py-2 antialiased dark:bg-gray-900 md:p-6 2xl:px-4"
            >
                <div>
                    <h2
                        class="text-xl font-semibold text-gray-900 dark:text-white"
                    >
                        Purchase Summary
                    </h2>

                    <div
                        class="my-4 space-y-4 border-b border-t border-gray-200 py-4 dark:border-gray-700 sm:mt-4"
                    >
                        <h4
                            class="text-lg font-semibold text-gray-900 dark:text-white"
                        >
                            Details
                        </h4>

                        <dl>
                            <dt
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                ID: {{ $sale->id }}
                            </dt>
                            <dt
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Date:
                                {{ \Carbon\Carbon::parse($sale->sale)->format('F j, Y') }}
                            </dt>
                            <dt
                                class="text-smfont-medium text-gray-900 dark:text-white"
                            >
                                Name: {{ $sale->user->name }}
                            </dt>
                            <dt
                                class="text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Email: {{ $sale->user->email }}
                            </dt>
                        </dl>
                    </div>

                    <div
                        class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800"
                    >
                        <table
                            class="w-full text-left text-sm font-medium text-gray-900 dark:text-white md:table-fixed"
                        >
                            <tbody
                                class="divide-y divide-gray-200 dark:divide-gray-800"
                            >
                                <tr>
                                    <td
                                        class="w-full whitespace-nowrap py-4 sm:w-1/2 lg:w-2/4"
                                    >
                                        <div class="flex items-center gap-4">
                                            <a
                                                href="{{ route('staff.products.show', $sale->product->id) }}"
                                                class="flex aspect-square h-10 w-10 shrink-0 items-center"
                                            >
                                                <img
                                                    class="h-auto max-h-full w-full dark:hidden"
                                                    src="{{ asset('storage/' . $sale->product->image) }}"
                                                    alt="product image"
                                                />
                                                <img
                                                    class="hidden h-auto max-h-full w-full dark:block"
                                                    src="{{ asset('storage/' . $sale->product->image) }}"
                                                    alt="product image"
                                                />
                                            </a>
                                            <a
                                                href="{{ route('staff.products.show', $sale->product->id) }}"
                                                class="max-w-[200px] truncate px-4 hover:underline sm:max-w-[150px] md:max-w-[300px] lg:max-w-[400px] xl:max-w-[750px]"
                                            >
                                                {{ $sale->product->name }}
                                            </a>
                                        </div>
                                    </td>
                                    <td
                                        class="max-w-[200px] truncate p-4 text-right text-sm font-normal text-gray-900 dark:text-white sm:max-w-[150px] md:max-w-[300px] lg:max-w-[300px] xl:w-1/4"
                                    >
                                        {{ $sale->quantity }}
                                    </td>
                                    <td
                                        class="max-w-[200px] truncate p-4 text-right text-sm font-bold text-gray-900 dark:text-white sm:max-w-[150px] md:max-w-[300px] lg:max-w-[400px] xl:w-1/4"
                                    >
                                        ₱{{ number_format($sale->quantity * $sale->price, 2, '.', ',') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 space-y-6">
                        <h4
                            class="text-xl font-semibold text-gray-900 dark:text-white"
                        >
                            Total summary
                        </h4>

                        <div class="space-y-4">
                            {{--
                                <div class="space-y-2">
                                <dl
                                class="flex items-center justify-between gap-4"
                                >
                                <dt
                                class="text-gray-500 dark:text-gray-400"
                                >
                                Original price
                                </dt>
                                <dd
                                class="text-base font-medium text-gray-900 dark:text-white"
                                >
                                $6,000
                                </dd>
                                </dl>
                                
                                <dl
                                class="flex items-center justify-between gap-4"
                                >
                                <dt
                                class="text-gray-500 dark:text-gray-400"
                                >
                                Discount
                                </dt>
                                <dd
                                class="text-base font-medium text-gray-900 dark:text-white"
                                >
                                $200
                                </dd>
                                </dl>
                                
                                <dl
                                class="flex items-center justify-between gap-4"
                                >
                                <dt
                                class="text-gray-500 dark:text-gray-400"
                                >
                                VAT
                                </dt>
                                <dd
                                class="text-base font-medium text-gray-900 dark:text-white"
                                >
                                $120
                                </dd>
                                </dl>
                                </div>
                            --}}

                            <div
                                class="border-t border-gray-200 pt-4 dark:border-gray-700"
                            >
                                <dl
                                    class="flex items-center justify-between gap-4"
                                >
                                    <dt
                                        class="text-lg font-semibold text-gray-900 dark:text-white"
                                    >
                                        Total Amount
                                    </dt>
                                    <dd
                                        class="text-lg font-bold text-gray-900 dark:text-white"
                                    >
                                        ₱{{ number_format($sale->quantity * $sale->price, 2, '.', ',') }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center text-gray-900 dark:text-white">
            No items found.
        </div>
    @endif
</x-forms.container>

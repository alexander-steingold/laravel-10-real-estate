<x-base-layout title="Landing Page">
    <x-app-partials.container>
        <div class="flex flex-wrap lg:ml-10 lg:mr-10 sm:ml-5 sm:mr-5 mx-auto">
            <div class="w-full md:w-1/3">
                <x-app-partials.card>
                    <h2 class="text-lg text-slate-500">Advanced Search</h2>
                </x-app-partials.card>
            </div>
            <div class="w-full md:w-2/3 lg:pl-8 sm:pl-5 ">
                @forelse($products as $product)
                    <a href="">
                        <x-product.product-card class="mb-8" :product="$product"/>
                    </a>
                @empty
                    No properties yet available
                @endforelse
            </div>
        </div>
    </x-app-partials.container>
</x-base-layout>

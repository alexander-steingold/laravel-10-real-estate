<x-app-partials.card {{ $attributes->merge(['class' => 'text-slate-600']) }}>
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/3">
            <div class="flex h-full items-center">
                <x-product.product-card-image :product="$product"/>
            </div>
        </div>
        <div class="w-full md:w-2/3 pl-4">
            <h3 class="font-medium text-lg ">
                {{ Str::limit($product->title, 25, '...')  }}
            </h3>
            <x-app-partials.divider/>
            <div class=" flex items-baseline ">
                <i class="uil uil-map-marker text-1xl me-1 text-green-600"></i>
                <div class="text-xs">
                    {{ $product->city }}, {{ $product->address }}
                </div>
            </div>
            {{--            <x-app-partials.divider/>--}}
            {{--            <p class="text-xs">--}}
            {{--                {{ Str::limit($product->description, 180, '...')  }}--}}
            {{--            </p>--}}
            <x-app-partials.divider/>
            <div class=" flex items-baseline ">
                <x-app-partials.icon class="uil-bed-double"/>
                <div>
                    {{$product->bedrooms}}  {{Str::plural('Bed',$product->bedrooms)}}
                </div>
                <x-app-partials.icon class="uil-bath ms-4"/>
                <div>
                    {{ $product->bathrooms }} {{Str::plural('Bath',$product->bathrooms)}}
                </div>
                <x-app-partials.icon class="uil-compress-arrows ms-4"/>
                <div>
                    {{ $product->area }} Sqm
                </div>
            </div>
            <x-app-partials.divider/>
            <div class=" flex justify-between items-center">
                <div class="text-xl">
                    ${{ number_format($product->price) }}
                </div>
                <div class="text-success">
                    {{ Str::upper($product->type) }}
                </div>
            </div>
        </div>
    </div>
</x-app-partials.card>



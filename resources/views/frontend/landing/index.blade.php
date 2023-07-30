<x-base-layout title="Landing Page">
    <x-app-partials.container>
        <div class="flex flex-wrap lg:ml-10 lg:mr-10 sm:ml-5 sm:mr-5 mx-auto">
            <div class="w-full md:w-1/3">
                <x-app-partials.card>
                    <h2 class="text-lg text-slate-500">Search Properties</h2>
                    <x-app-partials.divider/>
                    <form method="GET" action="{{ route('landing') }}">

                        <!-- Target -->
                        <div class="mt-4">
                            <x-forms.input-label for="status" value="Property Status"/>
                            <x-forms.select name="status">
                                <option value="">Any</option>
                                @foreach($targets as $target)
                                    <option
                                        value="{{ $target }}" @selected(request('status') === $target)>{{ Str::ucfirst($target)  }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>

                        <!-- Type -->
                        <div class="mt-4">
                            <x-forms.input-label for="status" value="Property Type"/>
                            <x-forms.select name="type">
                                <option value="">Any</option>
                                @foreach($types as $type)
                                    <option
                                        value="{{ $type }}" @selected(request('type') === $type)>{{ Str::ucfirst($type)  }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>

                        <!-- Bedrooms -->
                        <div class="mt-4">
                            <x-forms.input-label for="bedrooms" value="Bedrooms"/>
                            <x-forms.select name="bedrooms">
                                <option value="">Any</option>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" @selected(request('bedrooms') == $i)>{{ $i }}</option>
                                @endfor
                            </x-forms.select>
                        </div>

                        <!-- Baths -->
                        <div class="mt-4">
                            <x-forms.input-label for="bathrooms" value="Bathrooms"/>
                            <x-forms.select name="bathrooms">
                                <option value="">Any</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" @selected(request('bathrooms') == $i)>{{ $i }}</option>
                                @endfor
                            </x-forms.select>
                        </div>

                        <!-- Building Age -->
                        <div class="mt-4">
                            <x-forms.input-label for="building" value="Building Age"/>
                            <x-forms.select name="building">
                                <option value="">Any</option>
                                @for($i = 5; $i <= 50; $i+=5)
                                    <option value="{{ $i }}" @selected(request('building') == $i)>0-{{ $i }}</option>
                                @endfor
                            </x-forms.select>
                        </div>

                        <!-- Search Term -->
                        <div class="mt-4">
                            <x-forms.input-label for="search" value="Search Term"/>
                            <x-forms.text-input name="search" value="{{ request('search') }}"/>
                        </div>

                        <!-- Area -->
                        <div class="mt-4">
                            <x-forms.input-label for="area" value="Area"/>
                            <div x-data="{range:{{ request('area') ?? 0 }}}">
                                <div class="flex justify-between">
                                    <span>0</span>
                                    <span>1000 sqm</span>
                                </div>
                                <label class="block">
                                    <input
                                        x-model="range"
                                        class="form-range text-slate-500 dark:text-navy-300"
                                        type="range"
                                        name="area"
                                        max="1000"
                                        step="10"
                                        value="{{ request('area') }}"
                                    />
                                </label>
                                <div class="mt-2">
                                    <p class="text-xs">Minimum: <span x-text="range"></span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="mt-4">
                            <x-forms.input-label for="price" value="Price"/>
                            <div x-data="{range:{{ request('price') ?? 0 }}}">
                                <div class="flex justify-between">
                                    <span>0</span>
                                    <span>$10000000 </span>
                                </div>
                                <label class="block">
                                    <input
                                        x-model="range"
                                        class="form-range text-slate-500 dark:text-navy-300"
                                        type="range"
                                        name="price"
                                        max="10000000"
                                        step="10000"
                                        value="{{ request('price') }}"
                                    />
                                </label>
                                <div class="mt-2">
                                    <p class="text-xs">Maximum: <span x-text="range"></span></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-forms.button-success class="w-full mt-4 ">
                                Apply Filter
                            </x-forms.button-success>
                        </div>

                        <div class="flex justify-center items-center mt-2">
                            <a href="{{ route('landing') }}" class="text-indigo-500 hover:underline">Reset Filter</a>
                        </div>


                    </form>
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

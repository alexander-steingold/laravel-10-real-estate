<x-base-layout title="Business Registration" company="true">
    <x-app-partials.card class=" max-w-[30rem] mx-auto">
        <main class="grid  w-full grow grid-cols-1 place-items-center">
            <div class="w-full  p-4 sm:px-5">
                <div class="text-center">
                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                            Business Registration
                        </h2>
                        <p class="text-slate-400 dark:text-navy-300">
                            Please sign up to continue
                        </p>
                    </div>
                </div>

                <form class="mt-4" action="{{ route('company.store') }}" method="post">
                    @method('POST') @csrf
                    <div class="mb-2">
                        <x-forms.input-label for="name" value="Business Name"/>
                        <x-forms.text-input name="name" placeholder="" value="{{ old('name') }}"/>
                        <x-forms.input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <div class="mb-2">
                        <x-forms.input-label for="type" value="Business Type"/>
                        <x-forms.select name="type">
                            <option value=""></option>
                            @foreach($types as $type)
                                <option class=""
                                        value="{{ $type }}" @selected(old('type') === $type)>{{ Str::ucfirst($type)  }}</option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.input-error :messages="$errors->get('type')" class="mt-2"/>
                    </div>
                    {{--                    <div class="mb-1">--}}
                    {{--                        <x-forms.input-label for="description" value="Description"/>--}}
                    {{--                        <x-forms.textarea rows="3" name="description" placeholder="Enter company details"--}}
                    {{--                                          value="{{ old('description') }}"></x-forms.textarea>--}}
                    {{--                        <x-forms.input-error :messages=" $errors->get('description')" class="mt-2"/>--}}
                    {{--                    </div>--}}
                    <div class="mb-2">
                        <x-forms.input-label for="email" value="Business Email"/>
                        <x-forms.text-input name="email" type="text"
                                            value="{{ old('email') }}"/>
                        <x-forms.input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <div class="mb-2" x-data="{ selectedCountry: '{{ old('country_id') }}' }">
                        <x-forms.input-label for="country_id" value="Business Country"/>
                        <select name="country_id" class="mt-1.5 text-slate-20 w-full"
                                x-bind:value="selectedCountry"
                                x-init="
        $el._tom = new Tom($el, { create: true, sortField: { field: 'text', direction: 'asc' } });
        $watch('selectedCountry', value => $el._tom.setValue(value))"
                        >
                            <option value=""></option>
                            @foreach($countries as $country)
                                <option
                                    value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <x-forms.input-error :messages=" $errors->get('country_id')" class="mt-2"/>
                    </div>

                    {{--                    <div class="mb-2">--}}
                    {{--                        <x-forms.input-label for="city" value="City"/>--}}
                    {{--                        <x-forms.text-input name="city" placeholder="Enter company city" value="{{ old('city') }}"/>--}}
                    {{--                        <x-forms.input-error :messages="$errors->get('city')" class="mt-2"/>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="mb-2">--}}
                    {{--                        <x-forms.input-label for="address" value="Address"/>--}}
                    {{--                        <x-forms.text-input name="address" placeholder="Enter company address"--}}
                    {{--                                            value="{{ old('address') }}"/>--}}
                    {{--                        <x-forms.input-error :messages="$errors->get('address')" class="mt-2"/>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="mb-2">--}}
                    {{--                        <x-forms.input-label for="zip" value="Zip"/>--}}
                    {{--                        <x-forms.text-input name="zip" type="number" placeholder="Enter company zip code"--}}
                    {{--                                            value="{{ old('zip') }}"/>--}}
                    {{--                        <x-forms.input-error :messages="$errors->get('zip')" class="mt-2"/>--}}
                    {{--                    </div>--}}


                    <x-forms.button-success class="w-full mt-4">
                        Create Business Account
                    </x-forms.button-success>

                </form>
                <div class="mt-4 flex justify-center text-xs text-slate-400 dark:text-navy-300">
                    <a href="#">Privacy Notice</a>
                    <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                    <a href="#">Term of service</a>
                </div>
            </div>
        </main>
    </x-app-partials.card>
</x-base-layout>

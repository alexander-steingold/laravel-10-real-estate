<x-base-layout title="Submit Property" company="true">
    <x-app-partials.card>
        <div class="text-center mb-6">
            <div class="mt-4">
                <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                    Submit Property
                </h2>
            </div>
        </div>
        <form class="mt-4" action="{{ route('item.store') }}" method="post">
            @method('POST') @csrf
            <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-4">
                <div class="">
                    <x-forms.input-label for="name" value="Business Name"/>
                    <x-forms.text-input name="name" placeholder="" value="{{ old('name') }}"/>
                    <x-forms.input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>sfsf</div>
                <div>sfsf</div>
                <div>sfsf</div>
            </div>
        </form>
    </x-app-partials.card>
</x-base-layout>

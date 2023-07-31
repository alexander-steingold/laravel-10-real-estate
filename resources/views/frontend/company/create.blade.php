<x-base-layout title="Register Agency" company="true">
    <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
            <div class="text-center">

                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                        Agency Registration
                    </h2>
                    <p class="text-slate-400 dark:text-navy-300">
                        Please sign up to continue
                    </p>
                </div>
            </div>
            <form class="mt-4" action="{{ route('company.store') }}" method="post">
                @method('POST') @csrf
                <div>
                    <x-forms.input-label for="name" value="Company Name"/>
                    <x-forms.text-input name="name" value="{{ request('name') }}"/>
                    <x-forms.input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <x-forms.button-success class="w-full mt-4">
                    Create Agency
                </x-forms.button-success>

            </form>
            <div class="mt-4 flex justify-center text-xs text-slate-400 dark:text-navy-300">
                <a href="#">Privacy Notice</a>
                <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                <a href="#">Term of service</a>
            </div>
        </div>
    </main>
</x-base-layout>

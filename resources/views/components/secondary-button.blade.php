<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center p-2 border-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-800 hover:text-white active:bg-gray-200 hover:border-gray-700 active:border-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<div class="w-3/4 sm:w-2/3 col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 rounded">
    <div class="max-w-sm bg-white rounded shadow-md">
        <div class="px-4 py-4">
            <div>
                <a href="#" class="font-semibold leading-tight text-2xl text-gray-800 hover:text-gray-800">
                    {{ $coin['name'] }}
                </a>
            </div>
            <hr class="border-gray-200 my-1 border-bottom-none" style="border-top-width:0">
            <p class="text-sm text-gray-900 ">
                De {{ $coin['code'] }} para {{ $coin['codein'] }}<br>
                {{ MoneyFormatter::formatToBRL($coin['ask']) }}
            </p>
            <p class="text-sm text-gray-900">Alta: {{ MoneyFormatter::formatToBRL($coin['high']) }} </p>
            <p class="text-sm text-gray-900">Baixa: {{ MoneyFormatter::formatToBRL($coin['low']) }} </p>
            <hr class="my-3">
            <div class="flex text-gray-700 text-sm">
                <div>Ultima atualização <span class="text-blue-400"> {{ DateFormatter::formatFromTimestamp($coin['timestamp']) }} </span></div>
            </div>
        </div>
    </div>
</div>
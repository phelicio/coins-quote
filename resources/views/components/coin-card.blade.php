    <div 
    class="w-3/4 sm:w-2/3 col-span-12 sm:col-span-4 md:col-span-4 lg:col-span-4  xl:col-span-2 rounded transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110"  
    >
    <div class="max-w-sm bg-white rounded shadow-md">
        <div class="px-4 py-4">
            <div>
                <a href="{{  url("/{$coin['code']}-{$coin['codein']}")  }}" class="font-semibold leading-tight text-2xl text-gray-800 hover:text-gray-800">
                    {{ $coin['name'] }}
                </a>
            </div>
            <hr class="my-3">
            <p class="text-sm text-gray-900 ">
                De {{ $coin['code'] }} para {{ $coin['codein'] }}<br>
            </p>
            <p class="text-sm text-gray-900">Valor de compra: {{ MoneyFormatter::formatToBRL($coin['ask']) }} </p>
            <p class="text-sm text-gray-900">Valor de venda: {{ MoneyFormatter::formatToBRL($coin['bid']) }} </p>
            <p class="text-sm text-gray-900">Máximo: {{ MoneyFormatter::formatToBRL($coin['high']) }} </p>
            <p class="text-sm text-gray-900">Mínimo: {{ MoneyFormatter::formatToBRL($coin['low']) }} </p>
            <p class="text-sm {{ $coin['pctChange'] >= 0 ? "text-green-500" : "text-red-500"}}">Porcetagem de mudança: {{ $coin['pctChange'] }}%</p>
            <p class="text-sm {{ $coin['varBid'] >= 0 ? "text-green-500" : "text-red-500"}}">Variação: {{ $coin['varBid'] }}</p>
            <hr class="my-3">
            <div class="flex text-gray-700 text-sm">
                <div>Ultima atualização <p class="text-sm text-blue-400"> {{ DateFormatter::formatFromTimestamp($coin['timestamp']) }} </p></div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.main')
<div class="h-20 bg-gray-700 shadow-lg">
    <p class="text-gray-100 text-xl p-4">Moedas</p>
</div>
<div class="justify-items-center grid grid-cols-12 gap-4 p-4">
    @foreach ($coins as $coin)
    <x-coin-card :coin="$coin" />
    @endforeach
</div>
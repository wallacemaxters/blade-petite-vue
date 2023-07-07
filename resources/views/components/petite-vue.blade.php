@php
$fn = sprintf('LaravelComponent%s', isset($script) ? $id : '');
@endphp

<div v-cloak v-scope="{{ $fn }}(@js((object)$props))" {{ $attributes }}>
    {{ $slot }}
@if(isset($script) && $validateScriptSlot($script))
<template class='blade-petite-template-script' id="template-{{$id}}">{{ $script }}</template>
@endif
</div>
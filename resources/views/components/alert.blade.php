<div class="bg-green-400" style="width:200px;margin-bottom:20px"
    {{ $attributes->merge(['class' => 'abc', 'id' => 'heello']) }}>
    <h2>{{ $name }}</h2>
    <h2>{{ $age }}</h2>
    {{ $slot }}

</div>

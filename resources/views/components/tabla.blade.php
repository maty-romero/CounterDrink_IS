<table id="elementsTable" class="text-center">
    <thead>
        <tr>
            @php
                $columnArray = is_array($columna) ? $columna : explode(',', $columna);
            @endphp
            @foreach ($columnArray as $col)
                <th class="text-center">{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
    <table id="datatablesSimple">
        <thead>
            <tr>
                @php
                    $columnArray = is_array($columna) ? $columna : explode(',', $columna);
                @endphp
                @foreach($columnArray as $col)
                    <th>{{ $col }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
           {{$slot}}
        </tbody>
    </table>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

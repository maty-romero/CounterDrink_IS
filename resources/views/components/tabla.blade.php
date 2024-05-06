@props(['type'])
<body>
    <table id="datatablesSimple">
        <thead>
            <tr>
                @switch($type)
                    @case('stock')
                    <th>{{$titulo4}}</th>
                    <th>{{$titulo1}}</th>
                    <th>{{$titulo2}}</th>
                    <th>{{$titulo3}}</th>
                    <th>{{$titulo6}}</th>
                    <th>Accion</th>
                        @break
                    @case('venta')
                    <th>{{$titulo1}}</th>
                    <th>{{$titulo2}}</th>
                    <th>{{$titulo3}}</th>
                    <th>.....</th>
                    <th>.....</th>
                    <th>Accion</th>
                        @break
                    @case('usuario')
                    <th>{{$titulo1}}</th>
                    <th>{{$titulo2}}</th>
                    <th>{{$titulo3}}</th>
                    <th>.....</th>
                    <th>.....</th>
                    <th>Accion</th>
                        @break
                    @case('producto')
                    <th>{{$titulo1}}</th>
                    <th>{{$titulo2}}</th>
                    <th>{{$titulo3}}</th>
                    <th>{{$titulo4}}</th>
                    <th>{{$titulo6}}</th>
                    <th>{{$titulo7}}</th>
                    <th>Accion</th>
                        @break
                    @case('proveedor')
                    <th>{{$titulo5}}</th>
                    <th>{{$titulo1}}</th>
                    <th>{{$titulo2}}</th>
                    <th>{{$titulo3}}</th>
                    <th>{{$titulo4}}</th>
                    <th>Accion</th>
                        @break
                    @default
                @endswitch 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td class="action-buttons">
                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td class="action-buttons">
                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td class="action-buttons">
                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td class="action-buttons">
                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td class="action-buttons">
                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td class="action-buttons">
                    <button class="edit-btn" style="background-color: yellow;"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn" style="background-color: red;"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td class="action-buttons">
                    <button class="edit-btn" style="background-color: yellow;"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn" style="background-color: red;"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td class="action-buttons">
                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr><tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td class="action-buttons">
                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

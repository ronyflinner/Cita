       @can('ver consultar citas')
                   <li class="{{active_class(if_uri_pattern(['admin/historialCitaP'],'active','other'))}}"><a href="{{ route('historialCitaP.index') }}">Consultar Citas</a></li>
                @endcan
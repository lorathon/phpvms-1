<div id="airports_table_wrapper">
    <table class="table table-hover table-responsive" id="airports-table">
        <thead>
            <th>ICAO</th>
            <th>Name</th>
            <th>Location</th>
            <th>Timezone</th>
            <th style="text-align: center;">100LL</th>
            <th style="text-align: center;">JetA</th>
            <th style="text-align: center;">MOGAS</th>
            <th></th>
        </thead>
        <tbody>
        @foreach($airports as $airport)
            <tr>
                <td>{!! $airport->icao !!}</td>
                <td>{!! $airport->name !!}</td>
                <td>{!! $airport->location !!}</td>
                <td>{!! $airport->timezone !!}</td>
                <td style="text-align: center;">
                    <a class="inline" href="#" data-pk="{!! $airport->id !!}" data-name="fuel_100ll_cost">{!! $airport->fuel_100ll_cost !!}</a>
                </td>
                <td style="text-align: center;">
                    <a class="inline" href="#" data-pk="{!! $airport->id !!}" data-name="fuel_jeta_cost">{!! $airport->fuel_jeta_cost !!}</a>
                </td>
                <td style="text-align: center;">
                    <a class="inline" href="#" data-pk="{!! $airport->id !!}" data-name="fuel_mogas_cost">{!! $airport->fuel_mogas_cost !!}</a>
                </td>
                <td style="text-align: right;">
                    {!! Form::open(['route' => ['admin.airports.destroy', $airport->id], 'method' => 'delete']) !!}
                    <a href="{!! route('admin.airports.edit', [$airport->id]) !!}" class='btn btn-sm btn-success btn-icon'><i class="fa fa-pencil-square-o"></i></a>
                    {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger btn-icon', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

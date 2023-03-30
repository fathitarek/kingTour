<!-- Name En Field -->
<div class="col-sm-6">
    <p><span style="font-weight:bold"> Name En:</span> {{ $airways->name_en }}</p>
</div>

<!-- Name Hu Field -->
<div class="col-sm-6">
    <p><span style="font-weight:bold">Name Hu: </span>{{ $airways->name_hu }}</p>
</div>

<!-- Name Sk Field -->
<div class="col-sm-6">
    <p><span style="font-weight:bold">Name Sk: </span>{{ $airways->name_sk }}</p>
</div>

<!-- Name De Field -->
<div class="col-sm-6">
    <p><span style="font-weight:bold">Name De:</span> {{ $airways->name_de }}</p>
</div>
{!! Form::label('age groups', 'Age gruops:') !!}
@if(count($airways->airway_age_groups))
<table class="table table-hover">
<th>Name EN</th>
<th>Name HU</th>
<th>Name SK</th>
<th>Name DE</th>
<th>Min</th>
<th>Max</th>
<th>Price</th>
@foreach($airways->airway_age_groups as $age_group)

<tr>
    <td>{{$age_group->name_en}}</td>
    <td>{{$age_group->name_hu}}</td>
    <td>{{$age_group->name_sk}}</td>
    <td>{{$age_group->name_de}}</td>
    <td>{{$age_group->min}}</td>
    <td>{{$age_group->max}}</td>
    <td>{{$age_group->price}}</td>

</tr>
@endforeach

</table>
@else
<div style="text-align:center;font-size:20px;color:red;width:100%">No age group Data found</div>
@endif

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $airways->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $airways->updated_at }}</p>
</div>


<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $currency->name }}</p>
</div>

<!-- Rate Field -->
<div class="col-sm-12">
    {!! Form::label('rate', 'Rate:') !!}
    <p>{{ $currency->rate }}</p>
</div>

<!-- Profit Field -->
<div class="col-sm-12">
    {!! Form::label('profit', 'Profit (%):') !!}
    <p>{{ $currency->profit }}</p>
</div>

<!-- Final Rate Field -->
<div class="col-sm-12">
    {!! Form::label('final_rate', 'Final Rate:') !!}
    <p>{{ $currency->final_rate }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $currency->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $currency->updated_at }}</p>
</div>

